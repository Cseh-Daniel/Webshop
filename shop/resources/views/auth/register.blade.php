@extends("layouts.master")
@section("content")
<div class="row">

  <div class="mx-auto">
    <h1>Regisztráció</h1>

    <form class="form-group" action="signup" method="post">
      <label class="mb-0 mt-3" for="name">Név:</label>
      <input class="form-control" type="text" name="name" value="">
      <label class="mb-0 mt-3" for="email">E-mail:</label>
      <input class="form-control" type="text" name="email" value="">
      <label class="mb-0 mt-3" for="password">Jelszó:</label>
      <input class="form-control" type="password" name="password" value="">
      <label class="mb-0 mt-3" for="password_confirmation">Jelszó újra:</label>
      <input class="form-control" type="password" name="password_confirmation" value="">
      <label class="mb-0 mt-3" for="phone">Telefon:</label>
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

      <input class="form-control" type="number" name="role_id" value="2" hidden>

      <button class="btn btn-primary mt-3" type="submit" name="send">Regisztrálás</button>
      {{csrf_field()}}
    </form>
  </div>

</div>
@endsection
