<?php
function szyfruj($algorytm_szyfrowania, $tekst_do_zaszyfrowania){
echo "
<table>
<tr>
<th>Tekst niezaszyfrowany</th>
<th>Md5</th>
<th>Sha1</th>
<th>Sha256</th>
</tr>
";
for($i=0;$i<sizeof($algorytm_szyfrowania);$i++)
{
    echo"<tr>
    <th>$tekst_do_zaszyfrowania[$i]</th>";
    for($j=0;$j<sizeof($tekst_do_zaszyfrowania);$j++)
    {
        $codeType = match($algorytm_szyfrowania[$j]){
            'md5' => md5($tekst_do_zaszyfrowania[$i]),
            'sha1' => sha1($tekst_do_zaszyfrowania[$i]),
            'sha256' => hash('sha256', $tekst_do_zaszyfrowania[$i]),
        };
        echo "<th>$codeType</th>";
    }
    echo"</tr>";
}

echo "</table>";
}
?>