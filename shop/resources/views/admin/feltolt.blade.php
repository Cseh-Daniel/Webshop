@extends("layouts.master")
@section("content")
<h1>Termék feltöltés</h1>
{!! Form::open(["url"=>"feltolt/submit"]) !!}
<div class="form-group">
  {{Form::label("csop","Csoport")}}
  {{Form::select("csop",array("t"=>"Toner","p"=>"Patron"),null,["class"=>"form-control"] ) }}
  <br>
  {{Form::label("nev","Termék")}}
  {{Form::text("nev","",["class"=>"form-control","placeholder"=>"Adja meg a termék nevét!"])}}
  <br>
  {{Form::label("db","Darab")}}
  {{Form::number("db","",["class"=>"form-control","placeholder"=>"Adja meg a termék darabszámát!"])}}
  <br>
  {{Form::label("ar","Ár")}}
  {{Form::number("ar","",["class"=>"form-control","placeholder"=>"Adja meg a termék árát!"])}}
</div>


{{Form::submit("Feltöltés",["class"=>"btn btn-primary"])}}

{!! Form::close() !!}

@endsection
