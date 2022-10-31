@extends('layouts.main')

@section('title', 'Dashboard | LIBRARYAPP')

@section('body')
<h1>USER {{ auth()->user()->name }}</h1>

<form action="/logout" method="post">
      @csrf

      <button type="submit" class="btn btn-danger">Logout</button>
</form>
@endsection