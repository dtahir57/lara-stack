<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Skill;
use App\Question;
use App\Answer;
use App\Comment;
use App\Rate;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function skills() {
      return $this->hasOne('App\Skill');
    }

    public function question() {
      return $this->hasMany('App\Question');
    }

    public function answers() {
      return $this->hasMany('App\Answer');
    }
    public function commnets() {
      return $this->hasMany('App\Comments');
    }
    public function rates() {
      return $this->hasMany('App\Rate');
    }
}
