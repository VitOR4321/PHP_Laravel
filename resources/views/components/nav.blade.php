
  <nav class="navbar active  navbar-dark navbar-expand-xl bg-dark text-light" style=" color: white !important; font-size: 1.4em !important;">
    <a href='<?=config('app.url'); ?>/public/'>
      <img src="{{ asset('images/logo.png') }}" alt="logo img" width="60px" heigth="60px" style="margin-left:20px">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#toggleMobileMenu" data-bs-controls="toggleMobileMenu" aria-expanded="false" aria-lable="Toggle navigation" style="margin:15px">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="toggleMobileMenu">
      <ul class="navbar-nav ms-auto text-center">
        <li class="nav-item active">
          <a class="nav-link" href='<?=config('app.url'); ?>/public/registration/add'>Rejestracja</a>
        </li>
        <li>
          <a class="nav-link"  href='<?=config('app.url'); ?>/public/matches/list'>Mecze</a>
        </li>
        <li>
          <a class="nav-link"  href='<?=config('app.url'); ?>/public/history/list'>Historia</a>
        </li>
        <li>
          <a class="nav-link"  href='<?=config('app.url'); ?>/public/ranking/list'>Ranking</a>
        </li>
        <li>
        @if(Auth::check())
            <a class="nav-link" href='<?=config('app.url'); ?>/public/panel'>Panel</a>
            <a class="nav-link" href='<?=config('app.url'); ?>/public/logout'>Wyloguj</a>
            @else
            <a class="nav-link" href='<?=config('app.url'); ?>/public/login'>Admin</a>
            @endif
        </li>
      </ul>
    <div>
  </nav>