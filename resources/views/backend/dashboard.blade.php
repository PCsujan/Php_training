@extends('backend.master')
@section('content')
<div class="hero">
      <h1>Welcome, {{ auth()->user()->name }}</h1>
      <p>Your full student portal in one place.</p>
    </div>
@endsection

