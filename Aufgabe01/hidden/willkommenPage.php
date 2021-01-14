<?php 
/*
use  PHPMailer\PHPMailer\PHPMailer;
   function OpenCon()
    {
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "skygate-aufgaben";
    $connection = new mysqli($dbhost, $dbuser, $dbpass,$db);
    
    return $connection;
    }
    function CloseCon($connection)
    {
    $connection -> close();
    }

    if (!OpenCon()) {
       echo "Fehler mit der Verbindung mit der Datenbank";
      
    }

   
    if(isset($_POST['regButton'])){
        
        $emailAdresse = strtolower(trim($_POST['email']));
        $name =ucwords(trim($_POST['name']));
        $plz =($_POST['plz']);
        $ort = ucwords(trim($_POST['ort']));
        $telephon = trim($_POST['telephon']);
        $password = trim($_POST['password']);
        $passorWiederholung = trim($_POST['passwordWiederholung']);
        $userGruppe ='user';    

        $emailAdresse = mysqli_real_escape_string(OpenCon(), $emailAdresse) ;
        $name = mysqli_real_escape_string(OpenCon(),$name);
        $plz = mysqli_real_escape_string(OpenCon(),$plz);
        $ort = mysqli_real_escape_string(OpenCon(),$ort);
        $telephon = mysqli_real_escape_string(OpenCon(),$telephon);
        $password = mysqli_real_escape_string(OpenCon(),$password);
        $passorWiederholung =mysqli_real_escape_string(OpenCon(),$passorWiederholung) ;
        $userGruppe ='user';
        $activeStatus = 0;    

        $hashFormat = "$2y$10$";//10 mal 
        $salt = "iusesomecrazystrings22";//muss min 22 char
        $hashF_and_salt = $hashFormat . $salt;

        $password = crypt($password, $hashF_and_salt);

        $uniqId = uniqid('id', true);
        
        if($emailAdresse && $name && $plz && $ort && $telephon && $password && $passorWiederholung ){
        //    $query = "INSERT INTO persons('Email','Name',' PLZ', 'Ort', 'Telephon') VALUES ('$emailAdresser', '$name', '$plz','$ort','$telephon','$password') ";
            $query = "INSERT INTO `persons` ( `ID`,`Email`, `Name`, `PLZ`, `Ort`, `Telephon`,`Gruppe`,`Passwort`,`ActiveStatus`) VALUES ('$uniqId', '$emailAdresse', '$name', '$plz','$ort','$telephon','$userGruppe','$password','$activeStatus');";
            $result = mysqli_query(OpenCon(), $query);
            if(!$result){
                die('Fehler !!!! ');
            }/*else {
                //Email senden
                $to = $emailAdresse;
                $subject = "Konto Aktivieren";
                $message = "Bitte klicken Sie auf der Link um Ihren Konto zu aktiveren.
                <a href= 'http://localhost/Praktikum-Aufgaben/Aufgabe01/activation.php?id=$uniqId'>Hier cklick zum Aktiveren</a>";
                $headers ="From: mohamadali.bc@gmail.com \r\n";
                $headers.= "MIME-Version: 1.0" . "\r\n";//if html inside the email
                $headers.= "Content-type:text/html:charset=UTF-8" . "\r\n";

                mail($to,$subject,$message,$headers);
            }*/
        

     /*   }
        
      /*  echo "your Email is " . " " .$emailAdresser . "<br>";
        echo "and your pass is " . " ". $password;*/
 /*   }
*/
    
?>



<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>willkomen</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/willkommenPage.css">
</head>

<body>
    <main>
        <p>
            Vielen Dank für Ihre Anmeldung.<br><br> Bitte Klicken Sie auf der Link in der Email, um Ihre Regestierung abzuschließen.
        </p>

    </main>

   
</body>

</html>