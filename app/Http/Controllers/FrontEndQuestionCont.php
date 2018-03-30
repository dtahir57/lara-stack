<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
class FrontEndQuestionCont extends Controller
{
    public function show($id) {
      $q = Question::where('id', $id)->first();
      return view('questions/index', compact('q'));
    }
}
