@extends('layouts.app')

@section('content')
<div class="container">

@include ('layouts.errors')
@cannot ('create')
<div class="alert alert-info alert-important">
  <strong>Info!</strong> You will need to vote <b>5</b> times in order to be able to create an Ico.
</div>
 @endcannot
  @can ('create')
    <form method="POST" action="/coins">
      {{ csrf_field() }}

  <div class="form-group">
    <label for="coinname">Coin Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Ex. Bitcoin">
  </div>

  <div class="form-group">
    <label for="website">Website</label>
    <i>Don't add any prefixes: (www. http:// https://)</i>
    <input type="text" class="form-control" id="website" name="website" placeholder="Ex. Bitcoin.com">
  </div>

  <div class="form-group">
    <label for="ticker">Ticker / symbol</label>
    <input type="text" class="form-control" id="symbol" name="symbol" placeholder="Ex. BTC">
  </div>

  <div class="form-group">
    <label for="releasedate">Release Date</label>
    <input type="date" class="form-control" id="start" name="start">
  </div>

  <div class="form-group">
    <label for="supply">Total Supply</label>
    <input type="number" class="form-control" id="total_supply" name="total_supply" placeholder="Ex. 21000000">
  </div>

  <div class="form-group">
    <label for="summary">Summary</label>
    <textarea class="form-control" rows="5" id="body" name="body" placeholder="More information about the coin / ico."></textarea>
  </div>
   <div class="radio">
@foreach($categories as $category)
  <label><input type="radio" value="{{$category->id}}" name="categoryradio">{{$category->name}}</label>
@endforeach
</div>

  <button type="submit" class="btn btn-default">Submit</button>
</form>
@endcan
</div>
@endsection
