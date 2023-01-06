<?php
for($i = 0;$i<12;$i++)
{
$a = rand(-100,100);
if($a%2==0)
{
    echo "<li><span style='color:green'>$a</span></li>";
}
else
{
    echo "<li><span style='color:red'>$a</span></li>";
}
}
?>