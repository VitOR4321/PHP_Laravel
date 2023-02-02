<!DOCTYPE html> 
<html lang="pl"> 
  @include('components.head') 
  <body> 
    @include('components.nav') 
  <div class="container">
  <div class="row">
    <div class="col-md-12 text-center">
    <h1>Edycja Historii Rozgrywki</h1> 
    </div>
  </div>
<form action="<?=config('app.url');?>/public/history/update/{{$his->id}}" method="post">
@csrf
<div class="row justify-content-center align-items-center">
  <div class="col-10 col-md-8 col-lg-6">

<div class="form-group">
  <label for="winner" class="form-label">Wygrał</label>
  <input type="text" class="form-control" value="{{$his->winner}}" name="winner" id="winner" required>
</div>
<div class="form-group">
  <label for="winnerPoints" class="form-label">Punkty</label>
  <input type="number" class="form-control" value="{{$his->winnerPoints}}" name="winnerPoints" id="winnerPoints" required>
</div>
<div class="form-group">
  <label for="loser" class="form-label">Przegrał</label>
  <input type="text" class="form-control" value="{{$his->loser}}" name="loser" id="loser" required>
</div>
<div class="form-group">
  <label for="loserPoints" class="form-label">Punkty</label>
  <input type="number" class="form-control" value="{{$his->loserPoints}}" name="loserPoints" id="loserPoints" required>
</div>
<button type="submit" class="btn btn-primary" style="margin-bottom:15px;margin-top:15px">Zaktualizuj</button>
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