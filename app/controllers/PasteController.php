<?php

class PasteController extends BaseController {

  public function __construct() {
    $this->beforeFilter('auth', ['on' => ['put', 'post', 'delete']]);
    $this->beforeFilter('csrf', ['on' => ['put', 'post']]);
  }

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $public_pastes = Paste::where('public', '=', True)->get();
    if (Auth::check()) {
      $my_pastes = Auth::user()->pastes;
      $public_pastes = $public_pastes->filter(function ($paste) {
        return $paste->user_id != Auth::user()->id;});
    }
    else {
      $my_pastes = [];
    }
    return View::make('paste_index', ['my_pastes' => $my_pastes,
      'public_pastes' => $public_pastes]);
  }


  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return View::make('paste_create');
  }


  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store()
  {
    $rules = array(
      'name' => 'required|max:255',
      'paste' => 'required|max:65535',
      'public' => 'sometimes|required|accepted',
    );

    $validator = Validator::make(Input::all(), $rules);

    if ($validator->fails()) {
      return Redirect::to('/pastes/create')
        ->with('flash_message', 'Paste create failed; please fix the errors listed below.')
        ->withInput()
        ->withErrors($validator);
    }

    $paste = new Paste;
    $paste->name = Input::get('name');
    $paste->paste = Input::get('paste');
    $paste->public = Input::get('public', False);
    $paste->user()->associate(Auth::user());

    try {
      $paste->save();
    } catch (Exception $e) {
      Log::error("Exception attempting to store paste '$paste->name' :\n$e\n");
      return Redirect::to('/pastes')->with('flash_message',
        'Paste create failed; please try again.')
        ->withInput();
    }

    return Redirect::to('/pastes/' . $paste->id);
  }


  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    $paste = Paste::findOrFail($id);

    if ($paste->public || 
          (Auth::check() && Auth::user() == $paste->user)) {
      return View::make('paste_show')->with('paste', $paste);
    }
    else {
      return Redirect::to('/pastes')
        ->with('flash_message',
               'That is a private paste that doesn\'t belong to you');
    }
  }


  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    $paste = Paste::findOrFail($id);
    if (!Auth::check() || $paste->user != Auth::user()) {
      return Redirect::to('/pastes')->with('flash_message',
        'That paste isn\'t yours.');
    }
    return View::make('paste_edit')->with('paste', $paste);
  }


  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
    $rules = array(
      'name' => 'required|max:255',
      'paste' => 'required|max:65535',
      'public' => 'sometimes|required|accepted',
    );

    $validator = Validator::make(Input::all(), $rules);

    if ($validator->fails()) {
      return Redirect::to('/pastes/create')
        ->with('flash_message', 'Paste update failed; please fix the errors listed below.')
        ->withInput()
        ->withErrors($validator);
    }

    $paste = Paste::findOrFail($id);
    if ($paste->user != Auth::user()) {
      return Redirect::to('/pastes')->with('flash_message',
        'That paste isn\'t yours.');
    }
    $paste->name = Input::get('name');
    $paste->paste = Input::get('paste');
    $paste->public = Input::get('public', False);
    try {
      $paste->save();
    } catch (Exception $e) {
      Log::error("Exception attempting to update paste '$paste->name' :\n$e\n");
      return Redirect::to('/pastes')->with('flash_message',
        'Paste edit failed; please try again.')
        ->withInput();
    }

    return Redirect::to('/pastes/' . $paste->id);
  }


  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
    $paste = Paste::findOrFail($id);
    if ($paste->user != Auth::user()) {
      return Redirect::to('/pastes')->with('flash_message',
        'That paste isn\'t yours.');
    }
    try {
      $paste->delete();
    } catch (Exception $e) {
      Log::error("Exception attempting to destroy paste '$paste->name' :\n$e\n");
      return Redirect::to('/pastes/' . $paste->id)
        ->with('flash_message', 'Paste delete failed; please try again.');
    }

    return Redirect::to('/pastes')->with('flash_message',
      'Paste "' . $paste->name . '" deleted');
  }
}
