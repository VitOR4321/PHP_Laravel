<?php
require_once("fibonacciArray.inc");

function sumFib($min,$max){
    $sum = 0;
   for($i=$min;$i<$max;$i++){
        $sum += fibonacciArray($i)[1];
   }
   return $sum;
}
 ?>