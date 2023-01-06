<!DOCTYPE html> 
<html lang="pl"> 
  @include('partials.head') 
  <body> 
    @include('partials.navi') 
    <div id="zawartosc"> 
      <h2>Lista wydawnictw</h2> 
      <table> 
        <thead> 
          <tr> <th>ID wydawnictwa</th> <th>Nazwa</th> <th>Adres</th> </tr> 
        </thead> 
        <tbody> 
          @foreach($wydawnictwa as $el) 
            <tr><td>{{$el->id}}</td> <td>{{$el->nazwa}}</td> <td>{{$el->adres}}</td> </tr> 
          @endforeach 
        </tbody> 
      </table> 
    </div> 
  </body> 
</html>