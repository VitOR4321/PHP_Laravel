<!DOCTYPE html> 
<html lang="pl"> 
  @include('components.head') 
  <body> 
    @include('components.nav') 
  <div class="container">
  <div class="row">
    <div class="col-md-12 text-center">
    <h1>Dodaj Mecz</h1> 
    </div>
  </div>
<form action="<?=config('app.url');?>/public/matches/save " method="POST">
@csrf
<div class="row justify-content-center align-items-center">
  <div class="col-10 col-md-8 col-lg-6">

<div class="form-group">
  <label for="round" class="form-label">Runda</label>
  <input type="number" class="form-control" name="round" id="round" required>
</div>
<div class="form-group">
  <label for="firstNick" class="form-label">Pierwszy Gracz</label>
  <input type="text" class="form-control" name="firstNick" id="firstNick" required>
</div>
<div class="form-group">
  <label for="secoundNick" class="form-label">Drugi Gracz</label>
  <input type="text" class="form-control" name="secoundNick" id="secoundNick" required>
</div>
<div class="form-group">
  <label for="result" class="form-label">Wynik gry</label>
  <input type="text" class="form-control" name="result" id="result" aria-describedby="resultHelp">
  <small id="resultHelp" class="form-text text-muted">Jeśli mecz się nie skończył to wprowadź "brak", jeśli się skończyła to wporadź nick wygranego, jeśli jest remis to wpisz remis.</small>
</div>
<div class="form-group">
    <label for="endGame" class="form-label">Koniec Gry</label>
    <select id="endGame" name="endGame" class="form-select" required>
      <option>false</option>
      <option>true</option>
    </select>
</div>
  <button type="submit" class="btn btn-primary" style="margin-bottom:15px;margin-top:15px">Zapisz</button>
</form>
      <p>
          @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
          @endif
      </p>
</div>
</div>
</div>
    @include('components.footer')
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body> 
</html>
