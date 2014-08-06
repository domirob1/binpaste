<?php

class Paste extends Eloquent {

  public function user() {
    return $this->belongsTo('User');
  }
}
