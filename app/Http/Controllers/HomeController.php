<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Question;
use Auth;
use Session;
use App\Skill;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('allQuestions');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::where('user_id', Auth::user()->id)->get();
        return view('home', compact('questions'));
    }
    public function profile($slug) {
      $user = User::where('slug', $slug)->first();
      $skill = Skill::where('id', $user->id)->first();
      return view('profile/index', compact('user', 'skill'));
    }

    public function askQuestion() {
      return view('/question');
    }
    public function allQuestions(Request $request) {
      $q = $request->search;
      $questions = Question::latest()->search($q)->get();
      return view('welcome', compact('questions', 'q'));
    }
}
