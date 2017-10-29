@extends('layouts.app')

@section('content')
<div class="container">

@include ('layouts.errors')

    <form method="POST" action="/profile/edit/{{$user->id}}">
      {{ csrf_field() }}
      {{ method_field('PATCH') }}
<h1>Update your profile</h1>

  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
  </div>

  <div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}">
  </div>


  
  <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>
@endsection
