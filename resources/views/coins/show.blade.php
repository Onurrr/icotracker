@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
          <div class="col-12 col-md-12">
            <div class="thumbnail">
      <img src="http://www.canbike.org/public/images/030114/Bitcoin_Logo_Vertical.png" style="max-height:120px;">
      <div class="caption">
        <h1>{{$ico->name}}</h1>
        <p>Ticker: <span class="label label-default">{{$ico->symbol}}</span></p>
        <span class="label label-primary">Mineable</span>
        <span class="label label-primary">Coin</span>
        <span class="label label-primary">Token</span>


<p><span class="label label-success">Likes: {{$ico->likes()->count()}}</span></p>
        <p>{{$ico->body}}</p>
        <p><a href="//{{$ico->website}}" target="_blank" class="btn btn-primary" role="button">Website</a></p>
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

        <form method="POST" action="/coins/{{$ico->id}}/likes">
          {{csrf_field()}}

          <button type="submit" class="btn btn-default" {{$ico->isLiked() ? 'disabled' : ''}}>Like</button>
        </form>

        @can ('update',$ico)
        <form method="POST" action="/coins/{{$ico->id}}/disable">
          {{csrf_field()}}

          <button type="submit" class="btn btn-default">Disable</button>
        </form>
        @endcan

      </div>
    </div>
    <hr>
@foreach ($ico->comments as $comment)
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">By: <b>{{ $comment->user->name }}</b> - {{$comment->created_at->diffForHumans()}}</h3>
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
