@if(count($errors)>0)

@foreach($errors->all() as $error)

    <div class="alert alert-danger text-center col-md-5 mx-auto">

    {{$error}}


    </div>
  @endforeach

@endif

@if(session()->has('message'))


  <div class="alert alert-success col-md-4 mx-auto text-center">
  {{ session()->get('message') }}
  </div>

@endif
