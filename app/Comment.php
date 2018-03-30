<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Question;
use App\Answer;
class Comment extends Model
{
    public function user() {
      return $this->belongsTo('App\User');
    }
    public function question() {
      return $this->belongsTo('App\Question');
    }
    public function answer() {
      return $this->belongsTo('App\Answer');
    }
}
