<!DOCTYPE html> 
<html lang="pl"> 
  @include('components.head') 
  <body> 
    @include('components.nav') 
<div class="container">
  <div class="row">
    <div class="col-md-12 text-center">
    <h1>Mecze Turnieju</h1> 
    </div>
  </div>
  <div class="row">
    @if(Auth::check())
    <div class="col text-start">
          <a href="<?=config('app.url');?>/public/matches/deleteAll" class="btn btn-danger" role="button">Wyczyść mecze</a>
      </div>
      <div class="col text-center">
          <a href="<?=config('app.url');?>/public/matches/setToHistory" class="btn btn-success" role="button">Prześli zakończone mecze</a>
      </div>
    <div class="col text-end">
          <a href='<?=config('app.url'); ?>/public/matches/matchesMaker' class="btn btn-primary" role="button">Losuj mecze</a>
      </div>
    @endif 
    </div>
  
<table class="table table-striped table-hover">
<thead>
    <tr>
      <th scope="col">Tura Rozgrywki</th>
      <th scope="col">Gracz Pierwszy</th>
      <th scope="col">Gracz Drugi</th>
      <th scope="col">Wynik Gry</th>
    </tr>
  </thead>
  <tbody> 
          @foreach($matches as $el) 
            <tr> 
              <td>{{$el->round}}</td> 
              <td>{{$el->firstNick}}</td>
              <td>{{$el->secoundNick}}</td>
              <td>{{$el->result}}</td>
              @if(Auth::check())
              <td><a href="<?=config('app.url');?>/public/matches/edit/{{$el->id}}">Edit</a></td> 
              <td><a href="<?=config('app.url');?>/public/matches/show/{{$el->id}}">Del</a></td>
            @endif  
            </tr> 
          @endforeach 
  </tbody>
</table>

</div>
    @include('components.footer')
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body> 
</html>