<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Http\Requests\QuestionRequest;
use Session;
use Auth;
use App\QuestionHasSkills;
class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct() {
       return $this->middleware('auth');
     }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {
        $question = new Question;
        $question->user_id = Auth::user()->id;
        $question->question = $request->question;
        $question->description = $request->description;
        $question->save();
        foreach($request->skills as $s) {
          $skill = new QuestionHasSkills;
          $skill->question_id = $question->id;
          $skill->skill = $s;
          $skill->save();
        }
        if ($question) {
          Session::flash('created', 'Your Question posted Successfully!');
          return redirect('/home');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $q = Question::where('id', $id)->first();
        return view('questions.edit', compact('q'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $q = Question::find($id);
        foreach($q->skills as $d) {
          $d->delete();
        }
        $q->question = $request->question;
        $q->description = $request->description;
        $q->save();
        foreach($request->skills as $s) {
          $skill = new QuestionHasSkills;
          $skill->question_id = $q->id;
          $skill->skill = $s;
          $skill->save();
        }
        if ($q) {
          Session::flash('updated', 'Your Question updated Successfully!');
          return redirect('/home');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $q = Question::find($id);
        $q->delete();
        if ($q) {
          Session::flash('deleted', 'Question Deleted Successfully');
          return redirect('/home');
        }
    }
}
