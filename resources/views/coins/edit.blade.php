@extends('layouts.app')

@section('content')
<div class="container">

@include ('layouts.errors')
    <form method="POST" action="/coins/{{$ico->id}}/edit">
      {{ csrf_field() }}
      {{ method_field('PATCH') }}
<h1>Update coin</h1>
  <div class="form-group">
    <label for="website">Website</label>
    <input type="text" class="form-control" id="website" name="website" value="{{$ico->website}}">
  </div>

  <div class="form-group">
    <label for="ticker">Ticker / symbol</label>
    <input type="text" class="form-control" id="symbol" name="symbol" value="{{$ico->symbol}}">
  </div>

  <div class="form-group">
    <label for="releasedate">Release Date</label>
    <input type="date" class="form-control" id="start" name="start" value="{{$ico->start}}">
  </div>

  <div class="form-group">
    <label for="supply">Total Supply</label>
    <input type="number" class="form-control" id="total_supply" name="total_supply" value="{{$ico->total_supply}}">
  </div>

  <div class="form-group">
    <label for="summary">Summary</label>
    <textarea class="form-control" rows="5" id="body" name="body">{{$ico->body}}</textarea>
  </div>

  <button type="submit" class="btn btn-default">Submit</button>
</form>

</div>
@endsection
