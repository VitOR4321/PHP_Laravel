<?php
$solution = array();
function fibonacciArray($i)
{
   if(isset($i)){
      $FibonaccDigit = array();
      $FibonaccDigit[0] = 0;
      $FibonaccDigit[1] = 1;
      $digitAdd = 0;
      for($j=2;$j<$i;$j++){
         $FibonaccDigit[$j] = $FibonaccDigit[$j-2] + $FibonaccDigit[$j-1];
         $digitAdd++;
      }
      if($i >= 2){
         $solution[0] = $FibonaccDigit[$j-1];
         $solution[1] = $digitAdd;
      }
      else {
         $solution[0] = $i;
         $solution[1] = 0;
      }
      return $solution;
   }
}
 ?>
