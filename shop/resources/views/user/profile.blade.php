@extends("layouts.master")
@section("content")

<h1>Felhasználói fiók</h1>
  {!! Form::open(["url"=>"addressupdate"]) !!}
  {{csrf_field()}}
  <div class="form-group">

  <div class="col-sm">
    <div class="row my-2">
    <div class="col-2 px-1 my-auto text-right"><label for="varos">Város</label></div>
    <div class="col-2 px-0"><input class="form-control" type="text" name="varos" value="{{$address['varos']}}"></div>
    </div>

    <div class="row my-2">
    <div class="col-2 px-1 my-auto text-right"><label for="irszam">Irányítószám</label></div>
    <div class="col-2 px-0"><input type="text" name="irszam" class="form-control" value="{{$address['irszam']}}"></div>
    </div>

    <div class="row my-2">
    <div class="col-2 px-1 my-auto text-right"><label for="utca">Utca</label></div>
    <div class="col-2 px-0"><input type="text" name="utca" class="form-control" value="{{$address['utca']}}"></div>
    </div>

    <div class="row my-2">
    <div class="col-2 px-1 my-auto text-right"><label for="hsz">Házszám</label></div>
    <div class="col-2 px-0"><input type="text" name="hsz" class="form-control" value="{{$address['hsz']}}"></div>
    </div>

    <div class="row my-2">
    <div class="col-2 px-1 my-auto text-right"><label for="easz">Emelet / ajtószám</label></div>
    <div class="col-2 px-0"><input type="text" name="easz" class="form-control" value="{{$address['easz']}}"></div>
    </div>

    <div class="row">
      <div class="col-5 text-right">
        <button class="btn btn-primary" type="submit" name="button">Adatok frissítése</button>
      </div>
    </div>
  </div>

    </div>
  {{ Form::close()}}




  <!--{!! Form::open(["url"=>"pwupdate"]) !!}
  {{csrf_field()}}
  <div class="form-group">

  <div class="col-sm">
    <div class="row my-2">
    <div class="col-2 px-1 my-auto text-right"><label for="password">Jelenlegi jelszó</label></div>
    <div class="col-2 px-0"><input class="form-control" type="password" name="password" value=""></div>
    </div>

    <div class="row my-2">
    <div class="col-2 px-1 my-auto text-right"><label for="newpassword">Új jelszó</label></div>
    <div class="col-2 px-0"><input type="password" name="newpassword" class="form-control"></div>
    </div>

    <div class="row my-2">
    <div class="col-2 px-1 my-auto text-right"><label for="newpassword_confirmation">Új jelszó még egyszer</label></div>
    <div class="col-2 px-0"><input type="password" name="newpassword_confirmation" class="form-control"></div>
    </div>

    <div class="row">
      <div class="col-5 text-right">
        <button class="btn btn-primary" type="submit" name="button">Jelszó csere</button>
      </div>
    </div>

  </div>

    </div>

  {{ Form::close()}}
-->
@endsection
