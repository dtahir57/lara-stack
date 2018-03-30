<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Rate;
use Session;
class RateController extends Controller
{
    public function __construct() {
      return $this->middleware('auth');
    }
    public function post(Request $request) {
      $rate = new Rate;
      $rate->user_id = Auth::user()->id;
      $rate->answer_id = $request->a_id;
      $rate->question_id = $request->q_id;
      $rate->rate = 1;
      $rate->save();
      if ($rate) {
        Session::flash('rated', 'You have rated an Answer as answer to your question');
        return redirect()->back();
      }
    }
}
