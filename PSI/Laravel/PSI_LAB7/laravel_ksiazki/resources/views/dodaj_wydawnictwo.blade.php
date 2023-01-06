<!DOCTYPE html> 
<html> 
@include('partials.head') 
<body> 
  @include('partials.navi') 
  <form class="form-inline" action ="./dodaj_wydawnictwo" method = "post" > 
   @csrf 
    <p> 
      <label for="nazwa">Nazwa wydawnictwa</label>  
      <input id="nazwa" name="nazwa" size="20"> 
    </p>
    <p> 
      <label for="miasto">Miasto</label>  
      <input id="miasto" name="miasto" size="20"> 
    </p> 
    <p> 
      <label for="panstwo">Państwo</label>  
      <input id="panstwo" name="panstwo" size="20"> 
    </p> 
    <p><button type="submit" class="btn btn-primary mb-2">Dodaj</button></p> 
  </form> 
</body> 
</html><!DOCTYPE html> 
<html> 