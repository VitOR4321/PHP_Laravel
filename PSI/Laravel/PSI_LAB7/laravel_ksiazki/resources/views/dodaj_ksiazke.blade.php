<!DOCTYPE html> 
<html> 
@include('partials.head') 
<body> 
  @include('partials.navi') 
  <form class="form-inline" action ="./dodaj_ksiazke" method = "post" > 
   @csrf 
    <p> 
      <label for="tytul">Tytuł książki</label>  
      <input id="tytul" name="tytul" size="20"> 
    </p> 
    <p> 
      @foreach($kategorie as $el) 
      <input type="radio" name="idkat" id="idkat" 
      value={{$el->id}} checked> 
      <label for="idkat">{{$el->opis}}</label> 
      @endforeach 
    </p> 
    <p>
    @foreach($wydawnictwa as $el) 
      <input type="radio" name="idwyd" id="idwyd" 
      value={{$el->id}} checked> 
      <label for="idwyd">{{$el->nazwa}}</label> 
      @endforeach 
    </p>
    <p><button type="submit" class="btn btn-primary mb-2">Dodaj</button></p> 
  </form> 
</body> 
</html>