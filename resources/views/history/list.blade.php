<!DOCTYPE html> 
<html lang="pl"> 
  @include('components.head') 
  <body> 
    @include('components.nav') 
<div class="container">
  <div class="row">
    <div class="col-md-12 text-center">
    <h1>Historia meczy</h1> 
    </div>
  </div>
  <div class="row">
  @if(Auth::check())
    <div class="col text-start">
          <a href="<?=config('app.url');?>/public/history/deleteAll" class="btn btn-danger" role="button">Wyczyść historie</a>
      </div>
    @endif 
  </div>
  <table class="table table-striped table-hover">
<thead>
    <tr>
      <th scope="col">Wygrany</th>
      <th scope="col">Punkty</th>
      <th scope="col">Przegrany</th>
      <th scope="col">Punkty</th>
    </tr>
  </thead>
  <tbody> 
          @foreach($history as $el) 
            <tr> 
              <td>{{$el->winner}}</td> 
              <td>{{$el->winnerPoints}}</td>
              <td>{{$el->loser}}</td>
              <td>{{$el->loserPoints}}</td>
              @if(Auth::check())
              <td><a href="<?=config('app.url');?>/public/history/edit/{{$el->id}}">Edit</a></td> 
              <td><a href="<?=config('app.url');?>/public/history/show/{{$el->id}}">Del</a></td> 
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