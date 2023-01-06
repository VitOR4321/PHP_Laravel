<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>zadanie 1</title>
    <link rel="stylesheet" href="fp.css">
</head>
<body>
    <?php
    session_start();
    require_once("db_pgsql.php");
    require_once('pracownik.php');
    $p = new Pracownik();

    if(!isset($_GET['ST']))
				$page = 1;
			else
				$page = $_GET['ST'];
			$form = ".f".$page.".html";
			require_once($form);
			//aktualizacja statusu sesji
			foreach ($_POST as $key => $value)
				$_SESSION[$key] = $value;
			
    // zabezpieczenie przed wyjściem po za 4 strony formularza     
    if(intval($page)==4) {
        $p->insert_to_pgsql();
        session_destroy();
    }
    ?>

<p>
Zawartość $_SESSION
<br>
<br>	
	<?php	
		if(session_status()!=2) {
			echo 'Brak sesji do wyświetlenia';
		}
		else {
			var_dump($_SESSION);
			echo '<br><br>Session ID:'.session_id();
		}
			
	?>
</p>
</body>
</html>