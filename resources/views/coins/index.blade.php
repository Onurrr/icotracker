@extends('layouts.app')

@section('content')

<form method="GET" action="/coins" role="search">
            {{ csrf_field() }}
            <div class="form-group col-md-10 col-md-offset-1 input-group">
                <input type="text" name="search" placeholder="Search Ico" class="form-control"></input>
                <span class="input-group-btn search_btn">
                    <button class="btn btn-primary" type="submit">
                      Search
                    </button>
                </span>
            </div>
        </form>

<div class="container">
  <ol class="breadcrumb">
    Categories:
    @foreach ($categories as $category)
  <li><a href="/coins/categories/{{$category->id}}">{{$category->name}}</a></li>
    @endforeach
</ol>
    <div class="row">
        @foreach ($icos as $ico)
          <div class="col-6 col-md-4">
            <div class="thumbnail">
              <p><span class="label label-success">Likes: {{$ico->likes()->count()}}</span></p>
      <div class="caption">
        <h3 class="text-center">{{$ico->name}}</h3>
        <p>{{$ico->body}}</p>
        By:<a href="/profile/{{$ico->user->id}}"><p>{{ $ico->user->name }}</p></a>

        @foreach ($ico->categories as $category)
        <span class="label label-danger"><a style="color:white;" href="/coins/categories/{{$category->id}}">{{$category->name}}</a></span>
        @endforeach

        <p><a href="/coins/{{$ico->id}}" class="btn btn-primary" role="button">View</a></p>
      </div>
    </div>
          </div>
        @endforeach
    </div>
</div>
@endsection
