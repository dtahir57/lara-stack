@extends('layouts.app')

@section('title', "$q->question")
<style media="screen" scoped="true">
  .answer {
    padding: 20px;
    background: #333;
    color: #fff;
  }
  .comments{
    background: #fff;
    padding: 15px;
  }
  .buttons {
    float: right;
    padding: 10px;
  }
</style>
@section('content')
  <div class="container">
    <div class="row">
      @if (session('updated-comment'))
        <li class="alert alert-success">{{ session('updated-comment') }}</li>
      @endif
      @if (session('removed'))
        <li class="alert alert-success">{{ session('removed') }}</li>
      @endif
      @if (session('answer-updated'))
        <li class="alert alert-success">{{ session('answer-updated') }}</li>
      @endif
      @if (session('answer-deleted'))
        <li class="alert alert-success">{{ session('answer-deleted') }}</li>
      @endif
      @if (session('rated'))
        <li class="alert alert-success">{{ session('rated') }}</li>
      @endif
      <div class="col-md-10">
        <h2>{{$q->question}} ?</h2>
      </div>
      <div class="col-md-2">
        <a href="{{ url('/question') }}" type="button" class="btn btn-outline-primary" style="float: right;">Ask A Question</a>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-md-12">
        <h5>{{ $q->description }}</h5>
      </div>
    </div>
    <hr>
    @foreach($q->comments as $c)
      <div class="comments">
        @if (Auth::check())
          @if (Auth::user()->id == $c->user->id)
          <a href="{{ url('/comments/destroy/'.$c->id) }}" role="button" class="btn btn-danger btn-sm" style="float: right;">Delete</a>
          <a href="{{ url('comments/'.$c->id.'/edit') }}" role="button" class="btn btn-primary btn-sm" style="float: right;">Edit</a>
          @endif
        @endif
        <a href="{{ url('/home/'.$c->user->slug) }}">{{$c->user->name}}</a>
        <p>{{ $c->comments }}</p>
        <p class="text text-success">{{ $c->created_at->diffForHumans() }}</p>
      </div>
      <hr>
    @endforeach
    @if (session('created'))
      <li class="alert alert-success">{{ session('created') }}</li>
    @endif
    @if (Auth::check())
      @include('comments')
      <hr>
    @endif
    <div class="row">
      <div class="col-lg-12">
        <h3>Answers Provided By The Community</h3>
        <br>
        <br>

        @foreach($q->answers as $a)
          @if (isset($a->rates->rate))
            <h5 class="text text-success">This answer is marked as Answered by its Author - <a href="{{ url('/home/'.$q->user->slug) }}" style="text-transform: capitalize;">{{ $q->user->name }}</a></h5>
            <img src="{{ asset('images/stars.png') }}" class="img-responsive" style="width: 100px; height: 20px;" />
            <br>
            <br>
          @else
            @if (isset($q->rates->rate))
              <p class="alert alert-info">This question has already an answer</p>
              @else
              @if(Auth::check() AND Auth::user()->id == $q->user->id)
                @include('rate')
              @endif
            @endif
          <br>
          @endif
        @if (Auth::check() AND Auth::user()->id == $a->user->id)
          <div class="buttons">
            <a href="{{ route('answer.edit', $a->id) }}" role="button" class="btn btn-primary btn-sm">Edit</a>
            <a href="{{ url('questions/destroy/'.$a->id) }}" role="button" class="btn btn-danger btn-sm">Delete</a>
          </div>
        @endif
        <div class="answer">
          <h3>{{ $a->answer }}</h3>
        </div>
        <br>
        <h6><a href="{{ url('/home/'.$a->user->slug) }}" style="text-transform: capitalize;">{{ $a->user->name }}</a> answered this <span class="text text-info">( {{ $a->created_at->diffForHumans() }} )</span></h6>
        <hr>
        @foreach($a->comments as $c)
        <div class="comments">
          @if (Auth::check())
            @if (Auth::user()->id == $c->user->id)
            <a href="{{ url('/comments/destroy/'.$c->id) }}" role="button" class="btn btn-danger btn-sm" style="float: right;">Delete</a>
            <a href="{{ url('comments/'.$c->id.'/edit') }}" role="button" class="btn btn-primary btn-sm" style="float: right;">Edit</a>
            @endif
          @endif
          <a href="{{ url('/home/'.$c->user->slug) }}">{{$c->user->name}}</a>
          <p>{{ $c->comments }}</p>
          <p class="text text-success">{{ $c->created_at->diffForHumans() }}</p>
        </div>
        @endforeach
          @if (Auth::check())
            <hr>
            @include('a_comments')
          @endif
          <hr>
        @endforeach
      </div>
    </div>
    @if (Auth::check())
    <div class="row">
      <div class="col-md-10">
        <form action="{{ route('postAnswer', $q->id) }}" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <label>Answer this Question</label>
            <textarea name="answer" class="form-control" rows="8" cols="80"></textarea>
          </div>
          <input type="submit" class="btn btn-success btn-block" value="Submit Your Answer" />
        </form>
      </div>
    </div>
      @else
      <p>Please <a href="{{ route('login') }}">login</a> to answer this question</p>
    @endif
  </div>
@endsection
