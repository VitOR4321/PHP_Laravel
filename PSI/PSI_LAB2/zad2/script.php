<?php
$dod = 0;
$uje = 0;
$count = 0;
echo"<ul>";
while(true)
{
$a = rand(-10,10);

$R= rand(0,256);
$G= rand(0,256);
$B= rand(0,256);


if($a%2==0 && $a!=0)
{
    $dod++;
    echo "<li><span style='color:red'>$a</span></li>";
}
else if($a%2!=0)
{
    $uje++;
    echo "<li><span style='color:green'>$a</span></li>";
}
else{
    echo "<li><span style='color:blue'>$a</span></li>";
}
$count++;
if($a == 10 || $a == -10)
{
    break;
}
}
echo"</ul>";

echo "<p>Liczba powtorzeń: $count</p>";
echo "<p>Ilość liczb dodatnich: $dod</p>";
echo "<p>Ilość liczb ujemny: $uje</p>"
?>