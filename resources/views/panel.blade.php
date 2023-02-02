<!DOCTYPE html> 
<html lang="pl"> 
  <head>
  @include('components.head') 
</head>
  <body> 
    @include('components.nav') 
  <div class="container">
    <div class="row text-center">
        <h1>Panel Administratora</h1>
    </div>
    <div class="row text-center">
      <div class="d-grid gap-2 col-6 mx-auto">
        <a href='<?=config('app.url'); ?>/public/registration/list' class="btn btn-primary" role="button" style="margin: 10px;">Lista Rejestrowanych Graczy</a>
      </div>
      <div class="d-grid gap-2 col-6 mx-auto">
        <a href='<?=config('app.url'); ?>/public/registration/add' class="btn  btn-primary" role="button" style="margin: 10px;">Dodaj Gracza do Rejestracji</a>
      </div>
    </div>
    
    <div class="row text-center">
    <div class="d-grid gap-2 col-6 mx-auto">
        <a href='<?=config('app.url'); ?>/public/matches/list' class="btn  btn-primary" role="button" style="margin: 10px;">Lista Meczy</a>
      </div>
      <div class="d-grid gap-2 col-6 mx-auto">
        <a href='<?=config('app.url'); ?>/public/matches/add' class="btn  btn-primary" role="button" style="margin: 10px;">Dodaj Mecz</a>
      </div>
    </div>

    <div class="row text-center">
    <div class="d-grid gap-2 col-6 mx-auto">
        <a href='<?=config('app.url'); ?>/public/ranking/list' class="btn btn-primary" role="button" style="margin: 10px;">Lista Rankingu</a>
      </div>
      <div class="d-grid gap-2 col-6 mx-auto">
        <a href='<?=config('app.url'); ?>/public/ranking/add' class="btn btn-primary" role="button" style="margin: 10px;">Dodaj Gracza do Rankingu</a>
      </div>
    </div>

    <div class="row text-center">
    <div class="d-grid gap-2 col-6 mx-auto">
        <a href='<?=config('app.url'); ?>/public/history/list' class="btn btn-primary" role="button" style="margin: 10px;">Lista Historii Meczy</a>
      </div>
      <div class="d-grid gap-2 col-6 mx-auto">
        <a href='<?=config('app.url'); ?>/public/history/add' class="btn btn-primary" role="button" style="margin: 10px;">Dodaj Mecz do Historii</a>
      </div>
    </div>

    <div class="row text-center">
    <h2>Opcje organizacyjne</h2>
    <div class="d-grid gap-2 col-6 mx-auto">
        <a href='<?=config('app.url'); ?>/public/register' class="btn btn-primary" role="button" style="margin: 10px;">Tworzenie konta administratora</a>
    </div>
    </div>
    

  </div>
    @include('components.footer')
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body> 
</html>