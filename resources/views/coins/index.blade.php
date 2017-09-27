@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($icos as $ico)
          <div class="col-6 col-md-4">
            <div class="thumbnail">
      <img src="http://www.canbike.org/public/images/030114/Bitcoin_Logo_Vertical.png" style="max-height:120px;">
      <div class="caption">
        <h3>{{$ico->name}}</h3>
        <p>{{$ico->body}}</p>
        <p><a href="/coins/{{$ico->id}}" class="btn btn-primary" role="button">More</a>
      </div>
    </div>
          </div>
        @endforeach
    </div>
</div>
@endsection
