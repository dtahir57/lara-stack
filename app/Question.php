<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\QuestionHasSkills;
use App\Answer;
use App\Comment;
use App\Rate;
class Question extends Model
{
    public function scopeSearch($query, $s) {
      return $query->where('question', 'like', '%'.$s.'%')
            ->orWhere('description', 'like', '%'.$s.'%');
    }
    public function user() {
      return $this->belongsTo('App\User');
    }
    public function skills() {
      return $this->hasMany('App\QuestionHasSkills');
    }
    public function answers() {
      return $this->hasMany('App\Answer');
    }
    public function comments() {
      return $this->hasMany('App\Comment');
    }
    public function rates() {
      return $this->hasOne('App\Rate');
    }
}
