<?php

class PasteController extends BaseController {

  public function __construct() {
    $this->beforeFilter('auth');
    $this->beforeFilter('csrf', array('on' => 'post'));
  }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
    return View::make('paste_index')->with('pastes', Auth::user()->pastes);
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
    $paste = new Paste;
    $paste->name = Input::get('name');
    $paste->paste = Input::get('paste');
    $paste->user()->associate(Auth::user());

    try {
      $paste->save();
    } catch (Exception $e) {
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
    $paste = Paste::find($id);
    if ($paste->user != Auth::user()) {
      return Redirect::to('/pastes')->with('flash_message',
                                           'That flash isn\'t yours.');
    }
    return View::make('paste_show')->with('paste', $paste);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$paste = Paste::find($id);
    if ($paste->user != Auth::user()) {
      return Redirect::to('/pastes')->with('flash_message',
                                           'That flash isn\'t yours.');
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
		$paste = Paste::find($id);
    if ($paste->user != Auth::user()) {
      return Redirect::to('/pastes')->with('flash_message',
                                           'That flash isn\'t yours.');
    }
    $paste->name = Input::get('name');
    $paste->paste = Input::get('paste');
    try {
      $paste->save();
    } catch (Exception $e) {
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
		$paste = Paste::find($id);
    if ($paste->user != Auth::user()) {
      return Redirect::to('/pastes')->with('flash_message',
                                           'That flash isn\'t yours.');
    }
    try {
      $paste->delete();
    } catch (Exception $e) {
      return Redirect::to('/pastes/' . $paste->id)
               ->with('flash_message', 'Paste delete failed; please try again.');
    }

    return Redirect::to('/pastes')->with('flash_message',
                                         'Paste "' . $paste->name . '" deleted');
	}


}
