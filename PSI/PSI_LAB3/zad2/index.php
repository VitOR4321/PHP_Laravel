<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="get" action="<?php echo $_SERVER["PHP_SELF"];?>">
    Tekst do sprawdzenia <input type="text" name="tekst">
    <input type="submit">
</form>


<?php
function validacja($a){
    if ($_SERVER["REQUEST_METHOD"] == "GET") {  
      $n = $_GET["tekst"];
      $pattern = '/[A-Z]{3}[0-9]{4}/i';
      if(empty($n)){
          echo "Proszę podać tekst.";
      }
      elseif(strlen($n)!=7){
          echo "Zła długość tekstu, prosze poprawic.";
      }
      elseif(preg_match($pattern, $n)){
      $suma=0;
          for($i=3;$i<=6;$i++){
              $suma = $suma+$n[$i];
          }
          if($suma>20){
              echo "suma 4 cyfr przekracza 20.";
          }
          else{
              echo $n;
          }
      }
      else{
          echo "zła forma.";
      }
      }
}

if (isset($_GET["tekst"]))
{   
validacja($_GET["tekst"]);
}
?>
</body>
</html>