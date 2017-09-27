@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
          <div class="col-12 col-md-12">
            <div class="thumbnail">
      <img src="http://www.canbike.org/public/images/030114/Bitcoin_Logo_Vertical.png" style="max-height:120px;">
      <div class="caption">
        <h3>{{$ico->name}}</h3>
        <p>{{$ico->body}}</p>
      </div>
    </div>
          </div>
    </div>
</div>
@endsection
