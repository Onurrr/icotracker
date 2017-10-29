@extends('layouts.app')

@section('content')
<div class="container">
  <h1 class="text-center">{{$user->name}}'s Profile</h1>
    <div class="row">

                  @can ('update',$user)
        <form action="/profile/edit/{{$user->id}}">
          {{csrf_field()}}

          <button type="submit" class="btn btn-default center-block">Edit my profile</button>
        </form>
        @endcan
        <h1 class="text-center">{{$user->name}}'s Ico's</h1>
        @foreach ($user->icos as $ico)
          <div class="col-8 col-md-8 col-md-offset-2">
            <div class="thumbnail">
              <p><span class="label label-success">Likes: {{$ico->likes()->count()}}</span></p>
      <div class="caption">
        <h3>{{$ico->name}}</h3>
        <p>{{$ico->body}}</p>

        @foreach ($ico->categories as $category)
        <span class="label label-danger"><a style="color:white;" href="/coins/categories/{{$category->id}}">{{$category->name}}</a></span>
        @endforeach
@if ($ico->active == '1')
        <p><a href="/coins/{{$ico->id}}" class="btn btn-primary" role="button">View</a></p>
        @endif
        @can ('update',$ico)
        <form action="/coins/{{$ico->id}}" method="POST">
          {{csrf_field()}}
          {{ method_field('DELETE') }}
          <button type="submit" class="btn btn-default">Delete</button>
        </form>
        @endcan

        @can ('update',$ico)
        <form action="/coins/{{$ico->id}}/edit">
          {{csrf_field()}}
          <button type="submit" class="btn btn-default">Edit</button>
        </form>
        @endcan

        @can ('update',$ico)
         @if ($ico->active == '0')
        <form method="POST" action="/coins/{{$ico->id}}/enable">
          {{csrf_field()}}

          <button type="submit" class="btn btn-default">Enable</button>

          
        </form>
        @endif
        @endcan


        @can ('update',$ico)
        @if ($ico->active == '1')
        <form method="POST" action="/coins/{{$ico->id}}/disable">
          {{csrf_field()}}
    <button type="submit" class="btn btn-default">Disable</button>
        </form>
        @endif
        @endcan


      </div>
    </div>
          </div>
        @endforeach
    </div>
                    <h1 class="text-center">Ico's liked by {{$user->name}}'s</h1>
                @foreach ($likes as $liked)
          <div class="col-8 col-md-8 col-md-offset-2">
            <div class="thumbnail">
              <p><span class="label label-success">Likes: {{$liked->liked->likes->count()}}</span></p>
      <div class="caption">
        <h3>{{$liked->liked->name}}</h3>
        <p>{{$liked->liked->body}}</p>

@if ($liked->liked->active == '1')
        <p><a href="/coins/{{$ico->id}}" class="btn btn-primary" role="button">View</a></p>
        @endif

      </div>
    </div>
          </div>
        @endforeach
</div>
@endsection
