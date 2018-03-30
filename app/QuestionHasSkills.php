<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;
class QuestionHasSkills extends Model
{
    public function question() {
      return $this->belongsTo('App\Question');
    }
}
