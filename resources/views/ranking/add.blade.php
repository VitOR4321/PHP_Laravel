<!DOCTYPE html> 
<html lang="pl"> 
  @include('components.head') 
  <body> 
    @include('components.nav') 
  <div class="container">
  <div class="row">
    <div class="col-md-12 text-center">
    <h1>Dodaj Ranking Gracza</h1> 
    </div>
  </div>
<form action="<?=config('app.url');?>/public/ranking/save " method="POST">
@csrf
<div class="row justify-content-center align-items-center">
  <div class="col-10 col-md-8 col-lg-6">

<div class="form-group">
  <label for="nick" class="form-label">Nick</label>
  <input type="text" class="form-control" name="nick" id="nick" required>
</div>
<div class="form-group">
  <label for="lastName" class="form-label">Punkty</label>
  <input type="number" class="form-control" name="points" id="points" required>
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
