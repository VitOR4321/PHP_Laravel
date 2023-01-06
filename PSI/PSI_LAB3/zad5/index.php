<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <form method="get" action="<?php echo $_SERVER["PHP_SELF"];?>">
        <h1>Contact Us Form</h1>
            <p><b>1.</b>Full Name</p>
        <input type="text" name="firstName" required>
        <input type="text" name="lastName" required>
            <p><b>2.</b>E-mail*</p>
        <input type="text" name="mail" required>
            <p><b>3.</b>Adress IP: (example: 10.11.23.170)</p>
        <input type="text" name="adress" required>
            <p><b>4.</b>Contact Number*</p>
        <input type="text" name="contactNumber" required>
            <p><b>5.</b>Note Suggestions or Questions*</p>
        <input type="text" name="note" required>
        <br>
        <input type="submit" name="submit">
    </form>


    <?php
    // dokonczyć dodac ostatnią funkcje
    function nameCheck(){
        $pass = true;
        if(isset($_GET["firstName"])){
            $first = $_GET["firstName"];
            $reg = "/[A-Z a-z]/";
            if(preg_match($reg, $first)!=1 ){
                $pass = false;
            }
        }
        return $pass;
    }

    function lastNameCheck(){
        $pass = true;
        if(isset($_GET["lastName"])){
            $last = $_GET["lastName"];
            $reg = "/[A-Z a-z]/";
            if(preg_match($reg, $last)!=1){
                $pass = false;
            }
        }
        return $pass;
    }

    function mailCheck(){
        if(isset($_GET["mail"])){
            $first = $_GET["mail"];
            $pass = true;
                if(!filter_var($first, FILTER_VALIDATE_EMAIL)){
                $pass = false;
            }
            return $pass;
        }
    }

    function adressCheck(){
        if(isset($_GET["adress"])){
            $first = $_GET["adress"];
            $reg="/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\z/";
            $pass = true;
            if(preg_match($reg, $first)!= 1){
                $pass = false;
            }
            return $pass;
        }
    }

    function numberCheck(){
        if(isset($_GET["contactNumber"])){
            $first = $_GET["contactNumber"];
            $reg="/[0-9]{9}/";
            $pass = true;
            if(preg_match($reg, $first)!= 1){
                $pass = false;
            }
            return $pass;
        }
    }

    function noteCheck(){
        if(isset($_GET["note"])){
            $first = $_GET["note"];
            $reg="/[A-Z a-z 0-9]/";
            $pass = true;
            if(preg_match($reg, $first)!= 1){
                $pass = false;
            }
            return $pass;
        }
    }

    $name = nameCheck();
    $last = lastNameCheck();
    $email = mailCheck();
    $adres = adressCheck();
    $number = numberCheck();
    $note = noteCheck();
    if(isset($_GET["submit"])){
        if($name==false){
            echo "Prosze poprawnie wprowadzić dane imienia ";
        }
        elseif($last == false){
            echo "Prosze poprawnie wprowadzić dane nazwiska";
        }
        elseif($email == false){
            echo "Prosze poprawnie wprowadzić dane e-mail";
        }
        elseif($adres == false){
            echo "Prosze poprawnie wprowadzić dane adresu IP";
        }
        elseif($number == false){
            echo "Prosze poprawnie wprowadzić dane numeru telefonu";
        }
        elseif($note == false){
            echo "Prosze poprawnie wprowadzić dane notatek";
        }
        else{
            echo "Poprawnie wysłany fomrularz";
        }
    }
    
    ?>
</body>
</html>