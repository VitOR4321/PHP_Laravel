<!DOCTYPE html> 
<html lang="pl"> 
  @include('partials.head') 
  <body> 
    @include('partials.navi') 
    <div id="zawartosc"> 
      <h2>Lista kategorii</h2> 
      <table> 
        <thead> 
          <tr> <th>ID kategorii</th> <th>Opis</th> </tr> 
        </thead> 
        <tbody> 
          @foreach($ksiazka as $el) 
            <tr> <td>{{$el->id}}</td> <td>{{$el->opis}}</td> </tr> 
          @endforeach 
        </tbody> 
      </table> 
    </div> 
  </body> 
</html>