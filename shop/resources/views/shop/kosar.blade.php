@extends("layouts/master")

@section("title")
Tintapatronok
@endsection

@section("content")
  @if(Session::has("kosar"))
  <?php

  //dd($termekek);

   ?>

  @foreach($termekek as $termek)
  
  <div class="termekek mt-0 mx-auto">

  <div class="row">
  <image class="icon" src="{{URL::to("src/svg/ink-cartridge.svg")}}"></image>
    <div class="col col-lg mt-2 px-1" name="tnev">
  <h4 class="mt-2">{{$termek["aru"]["nev"]}}</h4>
  </div>
  <div class="col col-sm-2 px-1 mt-2" name="ar"><h6>{{$termek["ar"]}} Ft</h6><span>{{$termek["db"]}} DB</span></div>
  <button class="btn btn-primary px-2 mx-1">-1 DB</button><button class="btn btn-primary px-2 mx-1">Törlés</button>
  </div>
  <hr class="thr">
  </div>
  
  @endforeach
  @else

  @endif
@endsection
