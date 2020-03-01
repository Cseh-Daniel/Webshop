<div class="bg-light mb-5 shadow-sm">
<div class="container">
<nav class="navbar navbar-expand-lg navbar-light rounded-bottom">
  <a class="navbar-brand" href="/">Tintapatronok</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

<ul class="navbar-nav ml-auto">
  <form class="form-inline ml-5 my-lg-0">
    <input class="form-control mr-1" type="search" placeholder="Mit keres?" aria-label="Search" style="width: 70%" >
    <button class="btn btn-outline-info mr-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
  </form>

<li class="nav-item">

  <a class="nav-link" href="#"><i class="fa fa-shopping-cart"></i>  Kosár</a>
</li>

@if(auth()->check())
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-user" ></i> {{auth()->user()->name}} </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
         
        <a class="dropdown-item" href="/profil">Profil</a>
        <a class="dropdown-item" href="/orders">Rendelések</a>

        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="logout">Kijelentkezés</a>
      </div>
    </li>
  </ul>
  @else
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fa fa-user" ></i> Saját fiók </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
      <a class="dropdown-item" href="login">Bejelentkezés</a>
      <a class="dropdown-item" href="/signup">Regisztráció</a>
    </div>
  </li>
  </ul>
@endif

  </div>
</nav>
</div>
</div>
