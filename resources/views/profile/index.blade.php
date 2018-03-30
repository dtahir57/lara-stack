@extends('layouts.app')

@section('title', "Profile | $user->name")

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ $user->name }}'s Information</div>
        <div class="card-body">
          <h5 class="card-title">Email: {{ $user->email }}</h5>
          @if ($skill->html)
            <span class="badge badge-success">HTML</span>
          @endif
          @if ($skill->css)
            <span class="badge badge-success">CSS</span>
          @endif
          @if ($skill->php)
            <span class="badge badge-success">PHP</span>
          @endif
          @if ($skill->javascript)
            <span class="badge badge-success">JAVASCRIPT</span>
          @endif
          @if ($skill->laravel)
            <span class="badge badge-success">LARAVEL</span>
          @endif
          @if ($skill->bootstrap)
            <span class="badge badge-success">BOOTSTRAP</span>
          @endif
          @if ($skill->vuejs)
            <span class="badge badge-success">VUEJS</span>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
