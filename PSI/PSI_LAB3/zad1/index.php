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
Wprowadź potęge 2 <input type="number" name="fpotega">
<input type="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // isset potrzebe aby nie wyświetłało komunikatu błedu przed wprowadzeniem zmiany
  if (isset($_GET["fpotega"]))
{    
$n = $_GET["fpotega"];
if(empty($n)){
echo "Proszę podać potęge 2.";
}
elseif($n>=1024){
echo "Za wysoka potęga!!!";
}

else{
    for($i=1;$i<=$n;$i++){
        $wynik=pow(2,$i);
        echo "2<sup>$i</sup> = $wynik <br>";
    }
}
}
}
?>

</body>
</html>