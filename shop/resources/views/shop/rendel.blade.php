@extends("layouts/master")

@section("title")
Tintapatronok
@endsection

@section("content")

<div class="">
  <div class="text-center">
  <h1>Rendelés leadás</h1>
  <h4 class="mt-3">Teljes összeg: <strong><u>{{$osszertek}}</u></strong> Ft</h4>
  </div>

 <h3>Oldalunkon jelenleg csak utánvéttel, készpénzzel, a futárnál kiszállításkor lehet fizetni</h3>

{{ Form::open(['route' => ['prendel',""],  'method' => 'POST']) }}
{{csrf_field()}}


<div class="text-center">
@if(!auth()->check())
<label for="nev">Név</label>
<input class="form-control" type="text" name="nev" value="">

<label for="email">E-mail:</label>
<input class="form-control" type="text" name="email" value="">

<label for="phone">Telefon:</label>
<input class="form-control" type="text" name="phone" value="">

<label class="mb-0 mt-3" for="irszam">Irányítószám:</label>
<input class="form-control" type="text" name="irszam" value="">

<label class="mb-0 mt-3" for="varos">Város:</label>
<input class="form-control" type="text" name="varos" value="">

<label class="mb-0 mt-3" for="utca">Utca:</label>
<input class="form-control" type="text" name="utca" value="">

<label class="mb-0 mt-3" for="hsz">Házszám:</label>
<input class="form-control" type="text" name="hsz" value="">

<label class="mb-0 mt-3" for="easz">(opcionális) Emelet és ajtószám:</label>
<input class="form-control" type="text" name="easz" value="" placeholder="pl: 1/12">
@endif

<button type="submit" class="btn btn-success mt-3" name="button">Rendelés</button>
</div>
{{Form::close()}}
</div>
@endsection
