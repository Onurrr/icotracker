@extends('layouts.app')

@section('content')
<div class="container">
   <table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Role</th>
        <th>Name</th>
        <th>Email</th>
        <th>Created at</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->role}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->created_at->diffForHumans()}}</td>
        <td>
          <form action="/admin/edit/{{$user->id}}">
          {{csrf_field()}}
          <button type="submit" class="btn btn-info">Edit</button>
           </form>
        </td>
      </tr>
     @endforeach
    </tbody>
  </table>
</div>
@endsection
