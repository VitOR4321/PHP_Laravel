<!DOCTYPE html> 
<html lang="pl"> 
  @include('components.head') 
  <body> 
    @include('components.nav') 
  <div class="container">
  <div class="row">
    <div class="col-md-12 text-center">
    <h1>Usunięcie Meczu {{$match->id}} z Listy</h1> 
    </div>
  </div>
<form action="<?=config('app.url');?>/public/matches/delete/{{$match->id}} " method="post">
@csrf
<div class="row justify-content-center align-items-center">
  <div class="col-10 col-md-8 col-lg-6">
<div class="form-group">
  <label for="round" class="form-label">Runda</label>
  <input type="number" class="form-control" value="{{$match->round}}" name="round" id="round" readonly>
</div>
<div class="form-group">
  <label for="firstNick" class="form-label">Pierwszy Gracz</label>
  <input type="text" class="form-control" value="{{$match->firstNick}}" name="firstNick" id="firstNick" readonly>
</div>
<div class="form-group">
  <label for="secoundNick" class="form-label">Drugi Gracz</label>
  <input type="text" class="form-control" value="{{$match->secoundNick}}" name="secoundNick" id="secoundNick" readonly>
</div>
<div class="form-group">
  <label for="result" class="form-label">Wynik Gry</label>
  <input type="text" class="form-control" value="{{$match->result}}" name="result" id="result" readonly>
</div>
<div class="form-group">
<label for="endGame" class="form-label">Koniec Gry</label>
  <input type="text" class="form-control" value="{{$match->endGame}}" name="endGame" id="endGame" readonly>
</div>
  <button type="submit" class="btn btn-primary" style="margin-bottom:15px;margin-top:15px">Usuń</button>
</form>
</div>
</div>
</div>
    @include('components.footer')
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body> 
</html>