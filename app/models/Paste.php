<?php

class Paste extends Eloquent {

  public function user() {
    return $this->belongsTo('User');
  }


  public function short_paste($max_length = 50) {
    if (strlen($this->paste) > $max_length) {
      return substr($this->paste, 0, $max_length-3) . '...';
    }
    else {
      return $this->paste;
    }
  }
}
