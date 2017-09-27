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
        <p>{{$ico->body}}</p>
        <p><a href="//{{$ico->website}}" target="_blank" class="btn btn-primary" role="button">Website</a></p>
      </div>
    </div>
          </div>
    </div>
</div>
@endsection
