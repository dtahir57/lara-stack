@extends('layouts.app')

@section('title', 'Stack Overflow Application')
<style media="screen" scoped="true">

</style>
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <a href="{{ url('/question') }}" role="button" class="btn btn-outline-primary float-right">Ask A Question</a>
        <br>
        <br>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <h4>Top Questions</h4>
      </div>
      <div class="col-md-6">
        <form class="form-inline" action="{{ url('/') }}" method="get" style="float: right;">
          <div class="form-group">
            <input type="text" class="form-control" name="search" placeholder="Search A Question" value="{{ isset($q) ? $q : '' }}" />
          </div>
          <input type="submit" class="btn btn-success" value="Search">
        </form>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-md-12">
        @foreach($questions as $q)
        <div class="card" style="width: 100%;">
          <div class="card-body">
            <a href="{{ url('/questions/'.$q->id) }}"><h5 class="card-title">{{ $q->question }}</h5></a>
            @foreach($q->skills as $s)
              <span class="badge badge-success">{{$s->skill}}</span>
            @endforeach
            <p class="card-text text text-info">{{ $q->created_at->diffForHumans() }}</p>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection
