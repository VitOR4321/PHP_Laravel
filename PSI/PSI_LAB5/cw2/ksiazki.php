<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Książki</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>

    <?php
        $host = 'localhost';
        $port = '5432';
        $database = 's47624';
        $user = 's47624';
        $password = '5Ro2Ku2Nk3Va';

        $conn_string = "host=$host port=$port dbname=$database user=$user password=$password";
        $conn = pg_connect($conn_string) or die ("Nie można połączyć sie do Bazy\n");

        $query = 'SELECT * FROM ksiazki.ksiazka';
        $result = pg_query($conn,$query) or die ("Bład zapytania: " . preg_last_error());
        echo "<table>\n";
        while($line = pg_fetch_array($result, null, PGSQL_ASSOC)){
            echo "\t<tr>\n";
            foreach($line as $col_value){
                echo "\t\t<td>$col_value</td>\n";
            }
            echo"\t</tr>\n";
        }
        echo "</table>\n";

        pg_free_result($result);

        pg_close();
    ?>
    
</body>
</html>