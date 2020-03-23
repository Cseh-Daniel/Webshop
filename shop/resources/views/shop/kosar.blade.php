@extends("layouts/master")

@section("title")
Tintapatronok
@endsection

@section("content")

@if(\Cart::isEmpty())
<div class="text-center">
  <h1 class="mx-auto">Üres a kosár :( </h1>
</div>
@else
  @foreach($kosar as $k)
  {{ Form::open(['route' => ['kosarupdate',""],  'method' => 'POST']) }}
  {{csrf_field()}}

  <div class="termekek mt-0 mx-auto">

  <div class="row">
  <image class="icon" src="{{URL::to('src/svg/ink-cartridge.svg')}}"></image>
    <div class="col col-lg mt-2 px-1" name="tnev">
  <h4 class="mt-2">{{$k["name"]}}</h4>
  </div>
  <div class="col col-sm-2 px-1 mt-2" name="ar"><h6>{{$k["price"]}} Ft</h6><span>{{$k["quantity"]}} DB</span></div>
<button type="submit" name="-1" value="{{$k['id']}}" class="btn btn-primary px-2 mx-1">-1 DB</button>
    <button type="submit" name="remove" value="{{$k['id']}}" class="btn btn-primary px-2 mx-1">Törlés</button>
  </div>
  <hr class="thr">

</div>
  {{Form::close()}}
  @endforeach
  <div class="text-center">
<a href="/rendel" class="text-center"><button type="button" class="btn btn-success"><h4>Rendelés</h4></button></a>
</div>
@endif

@endsection
