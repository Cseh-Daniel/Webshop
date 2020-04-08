@extends("layouts/master")
@section("title")
Tintapatronok
@endsection
@section("content")
  <table class="table text-center">
      <tr>
        <th>Rendelés id</th>
        <th>Dátum</th>
        <th>Termék</th>
        <th>DB</th>
        <th>ár/DB</th>
        <th>összár</th>
      </tr>


      @foreach($orders as $order)
      <tr>
        <td> {{$order->id}} </td>
        <td> {{$order->created_at}} </td>
        <td> {{$order->tnev}} </td>
        <td> {{$order->tdb}} </td>
        <td> {{$order->dbar}} </td>
        <td> {{$order->osszar}} </td>
      </tr>
      @endforeach
  </table>

@endsection
