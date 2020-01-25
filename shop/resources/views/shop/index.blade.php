@extends("layouts/master")
@section("title")
Tintapatronok
@endsection
@section("content")

<div class="termekek mt-5 mx-auto">

<div class="row" style="border-bottom:solid black 1px">
<image class="icon" src="src/svg/ink-cartridge.svg"></image>
  <div class="col col-lg mt-2 px-1" name="tnev">
  <h6>Lorem ipsum dolor sit amet </h6>
</div>

<div class="col col-sm-2 px-4 mt-2" name="ar"><h6>XYZ Ft</h6></div>

<div class="col col-md">
  <input class="form-control db float-right" type="number" name="db" placeholder="db" min="0">
  <button class="btn btn-info mb-1 mr-1 float-right" type="button" name="button"> <i class="fa fa-shopping-cart"></i></button>

</div>

</div>
</div>

@endsection
