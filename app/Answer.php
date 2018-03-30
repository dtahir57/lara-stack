<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;
use App\User;
use App\Comment;
use App\Rate;
class Answer extends Model
{
  public function question() {
    return $this->belongsTo('App\Question');
  }
  public function user() {
    return $this->belongsTo('App\User');
  }
  public function comments() {
    return $this->hasMany('App\Comment');
  }
  public function rates() {
    return $this->hasOne('App\Rate');
  }
}
