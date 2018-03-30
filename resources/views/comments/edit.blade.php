@extends('layouts.app')

@section('title', 'Edit Comment')
<style media="screen">
  input[type="text"]{
    width: 100%;
  }
</style>
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <form class="form-horizontal" action="{{ route('updateComment', $comment->id) }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PATCH">
        <div class="form-group row">
          <div class="col-md-9">
            <input type="text" class="form-control" name="comment" value="{{$comment->comments}}">
          </div>
          <div class="col-md-3">
            <input type="submit" class="btn btn-success" value="Update" />
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
