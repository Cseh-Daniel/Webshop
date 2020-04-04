@extends("layouts.master")
@section("content")
<div class="row">

  <div class="mx-auto">
    <h1>Bejelentkezés</h1>


    <form class="form-group" action="login" method="post">
      <label class="mb-0 mt-3" for="email">E-mail:</label>
      <input class="form-control" type="text" name="email" value="">
      <label class="mb-0 mt-3" for="password">Jelszó:</label>
      <input class="form-control" type="password" name="password" value="">
      <button class="btn btn-primary mt-3" type="submit" name="send">Bejelentkezés</button>
      <a class="btn btn-link" href="{{ route('password.request') }}">
          Elfelejtettem a jelszavam!
      </a>
      {{csrf_field()}}
    </form>
  </div>

</div>
@endsection
