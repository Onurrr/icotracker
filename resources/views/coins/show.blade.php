@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
          <div class="col-12 col-md-12">
            <div class="thumbnail">
      <div class="caption">
        <h1 class="text-center">{{$ico->name}}</h1>
        <p>Ticker: <span class="label label-default">{{$ico->symbol}}</span></p>

@foreach ($ico->categories as $category)
        <span class="label label-danger"><a style="color:white;" href="/coins/categories/{{$category->id}}">{{$category->name}}</a></span>
        @endforeach

<p><span class="label label-success">Likes: {{$ico->likes()->count()}}</span></p>
        <p>{{$ico->body}}</p>
        <p><a href="//{{$ico->website}}"target="_blank" class="btn btn-primary" role="button">Website</a></p>
@can ('update',$ico)
        <form action="/coins/{{$ico->id}}" method="POST">
          {{csrf_field()}}
          {{ method_field('DELETE') }}
          <button type="submit" class="btn btn-default deletebutton">Delete</button>
        </form>
        @endcan

        @can ('update',$ico)
        <form action="/coins/{{$ico->id}}/edit">
          {{csrf_field()}}
          <button type="submit" class="btn btn-default editbutton">Edit</button>
        </form>
        @endcan

        <form method="POST" action="/coins/{{$ico->id}}/likes">
          {{csrf_field()}}

          <button type="submit" class="btn btn-default likebutton" {{$ico->isLiked() ? 'disabled' : ''}}>Like</button>
        </form>

        @can ('update',$ico)
        <form method="POST" action="/coins/{{$ico->id}}/disable">
          {{csrf_field()}}

          <button type="submit" class="btn btn-default disablebutton">Disable</button>
        </form>
        @endcan

      </div>
    </div>
    <hr>
@foreach ($ico->comments as $comment)
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">By: <a href="/profile/{{$comment->user->id}}"><b>{{ $comment->user->name }}</b></a> - {{$comment->created_at->diffForHumans()}}</h3>
  </div>
  <div class="panel-body">
    {{ $comment -> body }}
  </div>
</div>
@endforeach

<div class="well well-sm">

  <form method="POST" action="/coins/{{$ico->id}}/comments">
    @include ('layouts.errors')
    {{ csrf_field() }}
  <div class="form-group">
    <label for="Comment">Comment</label>
    <textarea rows="5" class="form-control" id="body" name="body" placeholder="Type your comment here"></textarea>
  </div>

  <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>

          </div>
    </div>
</div>
@endsection
