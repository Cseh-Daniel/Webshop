@if(count($errors)>0)
@foreach($errors->all() as $error)
<div class="alert alert-danger text-center">

{{$error}}


</div>
@endforeach
@endif
@if(session("siker"))


<div class="alert alert-success text-justify">
  {{session('siker')}}
</div>
@endif
