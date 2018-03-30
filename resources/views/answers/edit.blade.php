@extends('layouts.app')

@section('title', 'Edit Your Answer')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10">
      <form action="{{ route('answer.update', $a->id) }}" method="post">
        <input type="hidden" name="_method" value="PATCH">
        {{ csrf_field() }}
        <div class="form-group">
          <label>Update Your Answer</label>
          <textarea name="answer" class="form-control" rows="8" cols="80">{{ $a->answer }}</textarea>
        </div>
        <input type="submit" class="btn btn-success btn-block" value="Update Your Answer" />
      </form>
    </div>
  </div>
</div>
@endsection
