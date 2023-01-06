<?php
function silnia()
{
    $list = array();
    for($i = 0;$i<6;$i++){
        $a = rand(0,20);

        $s = 1;
       for ($j=1; $j<=$a; $j++) {
         $s *= $j;
       }
       $list[$i] = $s;

       if($i%2!=0){
       echo "<p style='background-color:grey'>silnia z liczby $a wynosi: $list[$i]</p>";
       }
       else{
        echo "<p>silnia z liczby $a wynosi: $list[$i]</p>";
       }
    }
}
?>