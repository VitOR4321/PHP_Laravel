<!DOCTYPE html> 
<html lang="pl"> 
  <head>
  @include('components.head') 
</head>
  <body> 
    @include('components.nav') 
  <div class="container">
  <div class="row text-center">
    <div class="col-md-6">
      <img src="{{ asset('images/investor.png') }}" alt="investor img" width="250px" heigth="250px" style="margin-top:60px;margin-bottom:65px">
      <h1>Koło Naukowe Investor</h1> 
    </div>
    <div class="col-md-6">
    <img src="{{ asset('images/kneb.png') }}" alt="kneb img" width="250px" heigth="250px" style="margin-top:60px;margin-bottom:58px">
      <h1>Koło Naukowe e-Biznesu</h1> 
    </div>
  </div>
  <div class="row text-center">
    <div class="col-md-12">
    <br>
      <h1>Zapraszają na 5 stycznia w głównej auli Uniwerstytetu Morskiego w Gdyni od godziny 17:00.</h1>
    <br>
    </div>
  </div>
  <div class="row">
    <div class="col-6">
    
<div class="card text-bg-primary">
  <div class="card-header text-center">
    <h1>Turniej Szachowy</h1> 
  </div>
  <div class="card-body">
  <p>Event dla studentów naszej uczelni, którzy chcą sprawdzić swoje umiejętności w grze królów na zasadach turniejowych.</p>
      <h3>Formuła rozgrywek</h3>
      <ul>
        <li>Mecz trwa 15 minut, po 7 minut na gracza,</li>
        <li>Gracze będą grać z użyciem fizycznych szachów,</li>
        <li>Czas będzie odmierzany za pomocą zegarów (old schoolowo),</li>
        <li>Graczę będą grali w formule <b>"Każdy z Każdym"</b> a na koniec będą sumowane punkty, za wygrane mecze.</li>
      </ul>
      <p>Aby przystąpić do turnieju studenci muszą się <b>Zarejestrować</b> na stronie internetowej w zakładce "Rejestracja"</p>
      <h3>Liczba miejsc ograniczona do 27 graczy.</h3>
      <p>Dla 3 pierwszych miejsc przewidziana jest nagroda.</p>
  </div>
</div>
    </div>
    <div class="col-6">
    <div class="card text-bg-primary">
  <div class="card-header text-center">
    <h1>Dzień Planszówek</h1> 
  </div>
  <div class="card-body">
  <p>Event dla wszystkich chętnych, którzy chcą zagrać ze znajomymi w planszówki, gry RPG, gry tabletop i nie tylko.</p>
      <p>Na wydarzenie trzeba przynieść własne gry, lecz w razie potrzeby możemy udostępnić kilka gier na przykład:</p>
      <ul>
        <li>Cytadela</li>
        <li>Tajniacy</li>
        <li>Wilkołaki</li>
        <li>Eksplodujące kotki 18+ z dodatkami</li>
        <li>Wirus z dodatkiem</li>
        <li>Double</li>
        <li>Colt Express</li>
        <li>Splendor</li>
      </ul>
      <h3>Wydarzenie będzie trwać do godziny 24.00</h3>
      <p>Uczestniczy wydarzenia będą mogli wyłącznie przebywać na terenie budynku B po godzinie 22:00. Toaleta będzie dostępna na parterze budnyku B.</p>
  </div>
</div>   
    </div>
  </div>
</div>
    @include('components.footer')
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body> 
</html>