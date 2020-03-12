@extends("layouts/master")
@section("title")
Tintapatronok
@endsection
@section("content")

@foreach($termekek as $termek)

<div class="termekek mt-0 mx-auto">

<div class="row">
<image class="icon" src="{{URL::to("src/svg/ink-cartridge.svg")}}"></image>
  <div class="col col-lg mt-2 px-1" name="tnev">

<h4>{{$termek->nev}}</h4>

</div>

<div class="col col-sm-2 px-1 mt-2" name="ar"><h6 class="mt-2">{{$termek->ar}} Ft</h6></div>

<div class="col col-md">
  {{ Form::open(['route' => ['kosarhozad',""],  'method' => 'POST']) }}
  {{csrf_field()}}
  <input class="form-control db float-right" type="text" id="db" name="db" placeholder="db" min="0" max="{{$termek->db}}" required>
  <input hidden type="text" id="id" name="id" placeholder="id" value="{{$termek->id}}">
  <button class="btn btn-info mb-1 mr-1 float-right" type="submit" name="button"> <i class="fa fa-shopping-cart"></i></button>

{{ Form::close()}}
</div>

</div>
<hr class="thr">
</div>
@endforeach

@endsection
