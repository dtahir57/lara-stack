@extends('layouts.app')

@section('title', 'Ask A Question')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">Ask A Question</div>
          <div class="card-body">
            @foreach($errors->all() as $error)
              <li class="alert alert-danger">{{$error}}</li>
            @endforeach
            <form action="{{ route('postQuestion') }}" method="post">
              {{ csrf_field() }}
              <div class="form-group">
                <label>Question</label>
                <input type="text" name="question" class="form-control" value="{{ old('question') }}">
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="8" cols="80">{{ old('description') }}</textarea>
              </div>
              <div class="form-group">
                <label>Tags</label>
                <select multiple class="form-control" name="skills[]">
                  <option value="html">HTML</option>
                  <option value="css">CSS</option>
                  <option value="javascript">JavaScript</option>
                  <option value="php">PHP</option>
                  <option value="laravel">Laravel</option>
                  <option value="bootstrap">Bootstrap</option>
                  <option value="vuejs">VueJs</option>
                </select>
                <p>Hold down the Ctrl (windows) / Command (Mac) button to select multiple options.</p>
              </div>
              <input type="submit" class="btn btn-outline-success btn-block" value="Post Your Question" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
