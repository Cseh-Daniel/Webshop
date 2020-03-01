@extends("layouts.master")
@section("content")
<div class="row">

  <div class="mx-auto">
    <h1>Regisztráció</h1>
    @if(count($errors)>0)
    <div class="alert alert-danger">
@foreach($errors->all() as $error)

<p>{{$error}}</p>

@endforeach
    </div>
    @endif
    <form class="form-group" action="signup" method="post">
      <label class="mb-0 mt-3" for="name">Név:</label>
      <input class="form-control" type="text" name="name" value="">
      <label class="mb-0 mt-3" for="email">E-mail:</label>
      <input class="form-control" type="text" name="email" value="">
      <label class="mb-0 mt-3" for="password">Jelszó:</label>
      <input class="form-control" type="password" name="password" value="">
      <label class="mb-0 mt-3" for="password_confirmation">Jelszó újra:</label>
      <input class="form-control" type="password" name="password_confirmation" value="">
      <button class="btn btn-primary mt-3" type="submit" name="send">Regisztrálás</button>
      {{csrf_field()}}
    </form>
  </div>

</div>
@endsection
