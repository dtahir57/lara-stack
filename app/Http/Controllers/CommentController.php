<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Comment;
use Session;
class CommentController extends Controller
{
    public function __construct() {
      return $this->middleware('auth');
    }

    public function postComment(Request $request) {
      $comment = new Comment;
      $comment->user_id = Auth::user()->id;
      $comment->question_id = $request->question_id;
      $comment->comments = $request->q_comment;
      $comment->save();
      if ($comment) {
        Session::flash('created', 'Your Comment was added!!!');
        return redirect('/questions/'.$request->question_id);
      }
    }
    public function postCommentsOnAnswer(Request $request) {
      $comment = new Comment;
      $comment->user_id = Auth::user()->id;
      $comment->answer_id = $request->answer_id;
      $comment->comments = $request->a_comment;
      $comment->save();
      if ($comment) {
        return redirect('/questions/'.$request->question_id);
      }
    }
    public function edit($id) {
      $comment = Comment::find($id);
      return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, $id) {
      $c = Comment::find($id);
      $c->comments = $request->comment;
      $c->update();
      if ($c) {
        if (isset($c->question->id)) {
            Session::flash('updated-comment', 'Comment Updated Successfully!');
            return redirect('/questions/'.$c->question->id);
        } else {
          Session::flash('updated-comment', 'Comment Updated Successfully!');
          return redirect('/questions/'.$c->answer->question->id);
        }
      }
    }
    public function destroy($id) {
      $c = Comment::find($id);
      $c->delete();
      if ($c) {
        Session::flash('removed', 'Comment Removed Successfully!!');
        return redirect()->back();
      }
    }
}
