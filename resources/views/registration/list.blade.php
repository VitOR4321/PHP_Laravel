<!DOCTYPE html> 
<html lang="pl"> 
  @include('components.head') 
  <body> 
    @include('components.nav') 
<div class="container">
  <div class="row text-center">
    <div class="col">
    <h1>Lista Graczy</h1> 
    </div>
    
    <div class="row">
    @if(Auth::check())
    <div class="col text-start">
          <a href="<?=config('app.url');?>/public/registration/deleteAll" class="btn btn-danger" role="button">Wyczyść rejestracje</a>
      </div>
    <div class="col text-end">
          <a href="<?=config('app.url');?>/public/registration/autorizeGamers" class="btn btn-primary" role="button">Przenieś do listy rankingowej</a>
      </div>
    @endif 
    </div>
  </div>
  

<table class="table table-striped table-hover">
<thead>
    <tr>
      <th scope="col">Nick</th>
      <th scope="col">Indeks</th>
      <th scope="col">Wydział</th>
    </tr>
  </thead>
  <tbody> 
          @foreach($registration as $el) 
            <tr> 
              <td>{{$el->nick}}</td>
              <td>{{$el->index}}</td>
              <td>{{$el->department}}</td>
              <td><a href="<?=config('app.url');?>/public/registration/edit/{{$el->id}}">Edit</a></td> 
              <td><a href="<?=config('app.url');?>/public/registration/show/{{$el->id}}">Del</a></td> 
            </tr> 
          @endforeach 
  </tbody>
</table>

</div>
    @include('components.footer')
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body> 
</html>