@component('mail::message')
# Köszönjük rendelését!

  Rendelés azonsítója {{$oid}}

  fizetés módja: utánvét

@foreach($kosar as $k)
<div class="termekek mt-0 mx-auto">

<div class="row">

{{$k["name"]}} {{$k["price"]}} Ft {{$k["quantity"]}} DB összesen: {{$k["price"]*$k["quantity"]}} Ft
</div>


</div>
<br>
@endforeach
<hr class="thr">
<h2 class="text-center">Végösszeg: {{$osszeg}}</h2>

@endcomponent
