<!DOCTYPE html>
<html lang='pl'>
    <head>       
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>zadanie2</title>
		<link rel="stylesheet" href="fp.css">
    </head>
    <body>
		<h1>Lista pracowników</h1>
		<table><tr>
		<th>ID</th><th>Nazwisko</th><th>Imie</th><th>Wiek</th><th>Doświadczenie</th><th>Zainteresowania</th><th>Edytuj/usuń</th>
        <?php
		
			session_start();
			require_once("db_pgsql.php");
            require_once("pracownik.php");
			$db = new Db_Pgsql();
			$idp = -1;
				
				$db->connect();
				$sql = "SELECT * FROM rekrutacja.pracownicy";
				$db->query($sql);
				$db->disconnect();
				
				while($line=pg_fetch_array($db->get_result(),null,PGSQL_ASSOC)) {
					echo "</tr><tr>";
					foreach($line as $col_value) {
						echo "<td>$col_value</td>";
					}
					echo "<td><a href=\"lista_pracownikow.php?pracownik=".$line["idp"]."\">Edytuj/usuń</a></td>";
					
					if(isset($_GET["pracownik"])) {
						if($line["idp"]==$_GET["pracownik"]) {
							$idp = intval($_GET["pracownik"]);
							$nazwisko = $line["nazwisko"];
							$imie = $line["imie"];
							$wiek = $line["wiek"];
							$doswiadczenie = $line["doswiadczenie"];
							$zainteresowania = $line["zainteresowania"];
						}
					}
				}
				
				echo "</tr></table>";
			
			if(isset($_GET["pracownik"])) {
				
				if($idp > 0) {
					echo
<<<END
					<h2>Edytuj pracownika $nazwisko $imie</h2>
					<form action='edytuj_pracownika.php' method='POST'>
						<label>Nazwisko<sup>*</sup></label>
                        <br>
						<input id='nazwisko' name='nazwisko' placeholder='Podaj nazwisko' value='$nazwisko' required>
                        <br>
						<label>Imię<sup>*</sup></label>
                        <br>
						<input id='imie' name='imie' placeholder='Podaj imię' value='$imie' required>
                        <br>
						<label>Wiek<sup>*</sup></label>
                        <br>
						<input id='wiek' name='wiek' placeholder='Podaj wiek' value='$wiek' required>
                        <br>
						<label>Doświadczenie zawodowe<sup>*</sup></label>
                        <br>
						<textarea id='doswiadczenie' name='doswiadczenie' placeholder='Opisz swoje doświadzenie' rows='8' cols='36' required>$doswiadczenie</textarea>
                        <br>
						<label>Zainteresowania<sup>*</sup></label>
                        <br>
						<textarea id='zainteresowania' name='zainteresowania' placeholder='Opisz swoje zainteresowania' rows='8' cols='36' required>$zainteresowania</textarea>
						<br>
                        <input type='submit' value='Zapisz'>
					</form>
					<br>
                    <h2>Usuń pracownika</h2>
					<button onclick="window.location = 'usun_pracownika.php?pracownik=$idp';">Usuń pracownika $nazwisko $imie?</button>
END;
				}
				else {
					echo "<p class='error'>Pracownik nie istnieje</p>";
				}
			}
			else {
				echo "<p class='error'>Musisz wybrać pracownika</p>";
			}
			
		?>
    </body>
</html>