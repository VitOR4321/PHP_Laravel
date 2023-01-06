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
    <h1>Trzy funkcje</h1>
    <table>
        <tr>
        <th><p>x<p></th>
        <th><p>-3<p></th>
        <th><p>-2.5<p></th>
        <th><p>-2<p></th>
        <th><p>-1.5<p></th>
        <th><p>-1<p></th>
        <th><p>-0.5<p></th>
        <th><p>0<p></th>
        <th><p>0.5<p></th>
        <th><p>1<p></th>
        <th><p>1.5<p></th>
        <th><p>2<p></th>
        <th><p>2.5<p></th>
        <th><p>3<p></th>
        </tr>
    <?php
    include("script.inc");
    $xTab = array(-3,-2.5,-2,-1.5,-1,-0.5,0,0.5,1,1.5,2,2.5,3);
    firstFunction($xTab);
    secoundFunction($xTab);
    thirtFunction($xTab);
    ?>
    </table>
</body>
</html>