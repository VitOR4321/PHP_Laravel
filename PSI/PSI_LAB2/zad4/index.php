<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <?php

include("fibonacci.inc");
include("fibonacciArray.inc");
include("sumFib.inc");

do {
   $min = rand(0,20);
   $max = rand(0,20);
} while ($min >= $max);

echo "
<table>
<thead>
<tr>
<td>n</td>
<td>Fn (wersja rekurencyjna)</td>
<td>Fn (wersja tablicowa)</td>
<td>Fa+...+Fb</td>
<td>Ilość dodawań (wersja rekurencyjna)</td>
<td>Ilość dodawań (wersja tablicowa)</td>
</tr>
</thead>
<tbody>
";
for($i = $min;$i<=$max;$i++){
   $fibonacci = fibonacci($i);
   $fibonacci20 = fibonacciArray($i);
   $sum = sumFib($min,$i);
   if($i >= 2){
       $digitSumRecursion = 2*$i-1;
   }
   else {
        $digitSumRecursion = 0;
   }
   echo"
   <tr>
      <td>$i</td>
      <td>$fibonacci</td>
      <td>$fibonacci20[0]</td>
      <td>$sum</td>
      <td>$digitSumRecursion</td>
      <td>$fibonacci20[1]</td>
   </tr>
 ";
}
echo"
</tbody>
</table>
";
?>
</body>
</html>