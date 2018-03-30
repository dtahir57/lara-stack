<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Answer;
use Session;
class AnswerController extends Controller
{
    public function __construct() {
      return $this->middleware('auth');
    }
    public function postAnswer(Request $request, $q_id) {
        $answer = new Answer;
        $answer->question_id = $q_id;
        $answer->user_id = Auth::user()->id;
        $answer->answer = $request->answer;
        $answer->save();
        if ($answer) {
          Session::flash('answer', 'You have given the answer for this question! You can give as many as you want!!!');
          return redirect('/questions/'.$q_id);
        }
    }
    public function edit($id) {
      $a = Answer::find($id);
      return view('answers.edit', compact('a'));
    }
    public function update(Request $request, $id) {
      $a = Answer::find($id);
      $a->answer = $request->answer;
      $a->update();
      if ($a) {
        Session::flash('answer-updated', 'Answer Updated Successfully!!!');
        return redirect('/questions/'.$a->question->id);
      }
    }
    public function destroy($id) {
      $a = Answer::find($id);
      $a->delete();
      if ($a) {
        Session::flash('answer-deleted', 'Your Answer Removed Successfully!!!');
        return redirect()->back();
      }
    }
}
