@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session('updated'))
              <li class="alert alert-success">{{ session('updated') }}</li>
            @endif
            @if (session('deleted'))
              <li class="alert alert-success">{{ session('deleted') }}</li>
            @endif
            <a href="{{ url('/question') }}" type="button" class="btn btn-outline-primary pull-right">Ask A Question</a>
            <br>
            <br>
            <div class="card">
                <div class="card-header">{{ Auth::user()->name }}'s Dashboard</div>

                <div class="card-body">
                  <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Your asked Questions</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($questions as $q)
                      <tr>
                        <th scope="row">{{ $loop->index + 1 }}</th>
                        <td><a href="{{ url('/questions/'.$q->id) }}">{{ $q->question }}</a></td>
                        <td>
                          <a href="{{ route('question.edit', $q->id) }}" role="button" class="btn btn-primary">Edit</a>
                          <a href="{{ route('destroyQuestion', $q->id) }}" role="button" class="btn btn-danger">Delete</a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
