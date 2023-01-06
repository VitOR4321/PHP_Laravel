<?php
function firstFunction($xTab){
$function1=0;
echo "<tr>";
echo "<th>f(x)</th>";
for ($i=0;$i<sizeof($xTab);$i++)
{
        $function1 = pow($xTab[$i],2)-5;
        echo "<th>$function1</th>";
}
echo "</tr>";
}

function secoundFunction($xTab){
    $function2=0;
    echo "<tr>";
    echo "<th>g(x)</th>";
    for ($i=0;$i<sizeof($xTab);$i++)
    {
        $function2 = round((3*sin($xTab[$i]) + cos($xTab[$i])),2);
        echo "<th>$function2</th>";
    }
    echo "</tr>";
}

function thirtFunction($xTab){
    $function3=0;
    echo "<tr>";
    echo "<th>h(x)</th>";
    for ($i=0;$i<sizeof($xTab);$i++)
    {
        $function3 = 0.5*$xTab[$i]+1;
        echo "<th>$function3</th>";
    }
    echo "</tr>";
}

?>