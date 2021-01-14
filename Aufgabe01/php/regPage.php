<?php
include '../hidden/connection.php';

session_start();
if (isset($_SESSION['login']))
{
    header("Location: home.php");

}

$email_error_already_exist = '';

$uniqId = uniqid('id', true);
$userID = $uniqId;
$message = "<p></p>Bitte klicken Sie auf der Link um Ihren Konto zu aktiveren.
<a href= 'http://localhost/Praktikum-Aufgaben/Aufgabe01/hidden/activation.php?id=$userID'>Hier cklick zum Aktiveren</a>";

if (isset($_POST['regButton']))
{

    $emailAdresse = strtolower(trim($_POST['email']));
    $name = ucwords(trim($_POST['name']));
    $plz = ($_POST['plz']);
    $ort = ucwords(trim($_POST['ort']));
    $telephon = trim($_POST['telephon']);
    $password = trim($_POST['password']);
    $passordWiederholung = trim($_POST['passwordWiederholung']);

    $emailAdresse = mysqli_real_escape_string(OpenCon() , $emailAdresse);
    $name = mysqli_real_escape_string(OpenCon() , $name);
    $plz = mysqli_real_escape_string(OpenCon() , $plz);
    $ort = mysqli_real_escape_string(OpenCon() , $ort);
    $telephon = mysqli_real_escape_string(OpenCon() , $telephon);
    $password = mysqli_real_escape_string(OpenCon() , $password);
    $passordWiederholung = mysqli_real_escape_string(OpenCon() , $passordWiederholung);
    if ($emailAdresse == 'mohamadali.bc@gmail.com')
    {
        $userGruppe = 'admin';
    }
    else
    {
        $userGruppe = 'user';
    }

    $activeStatus = 0;

    $hashFormat = "$2y$10$"; //10 mal
    $salt = "iusesomecrazystrings22"; //muss min.22 char
    $hashF_and_salt = $hashFormat . $salt;

    $password = crypt($password, $hashF_and_salt);

    if ($emailAdresse && $name && $plz && $ort && $telephon && $password && $passordWiederholung)
    {

        $checkEmail = "SELECT * FROM `persons` WHERE Email = '$emailAdresse'";
        $checkResult = mysqli_query(OpenCon() , $checkEmail);
        if (mysqli_num_rows($checkResult) > 0)
        {
            $email_error_already_exist = 'Die Email ist schon registiert!';
        }
        else
        {

            $query = "INSERT INTO `persons` ( `ID`,`Email`, `Name`, `PLZ`, `Ort`, `Telephon`,`Gruppe`,`Passwort`,`ActiveStatus`) VALUES ('$userID', '$emailAdresse', '$name', '$plz','$ort','$telephon','$userGruppe','$password','$activeStatus');";
            $result = mysqli_query(OpenCon() , $query);
            if (!$result)
            {
                die('Fehler !!!! ');
            }
            else
            {

                //Email senden
                include '../hidden/email.php';
            }

        }

    }

}

?>



<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>RegestierungsPage</title>
      <link rel="stylesheet" href="../css/regePage.css">
   </head>
   <body>
      <main>
         <div id="registierungsDiv">
            Registierung
         </div>
         <div id="regDiv">
            <div id="fehelMeldung">
               <p id="fehlerText"> Bitte prüfen und korrigieren Sie die markierten Felder </p>
            </div>
            <form id="form" action="regPage.php" method="post">
               <div id="emailDiv" class="inputFelder">
                  <input id="email" name="email" type="email" placeholder="E-Mail"><span>*</span><br>
                  <span id="email_already_exsist"><?php 
                     if($email_error_already_exist != ''){
                         echo $email_error_already_exist;
                     }
                     ?></span>
               </div>
               <div id="nameDiv" class="inputFelder">
                  <input id="name" name="name" type="text" placeholder="name"><span id="nameSpan">*</span>
               </div>
               <div id="plzDiv" class="inputFelder">
                  <input id="plz" name="plz" type="text" placeholder="PLZ"><span id="plzSpan">*</span>
               </div>
               <div id="ortDiv" class="inputFelder">
                  <input id="ort" name="ort" type="text" placeholder="ort"><span id="ortSpan">*</span>
               </div>
               <div id="telephonDiv" class="inputFelder">
                  <input id="telephon" name="telephon" type="text" placeholder="Telephon"><span id="telephonSpan">*</span>
               </div>
               <div id="passwordDiv" class="inputFelder">
                  <input id="password" name="password" type="password" placeholder="Passwort"><span id="passwordSpan">*</span>
               </div>
               <div id="passwordWiederholungDiv" class="inputFelder">
                  <input id="passwordWiederholung" name="passwordWiederholung" type="password" placeholder="passwordWiederholung"><span id="passwordWiederholungSpan">*</span>
               </div>
               <div id="checkboxDiv">
                  <p><input type="checkbox" id="checkbox" class="inputFelder" style="width: auto; height: auto;" checked> <span id="ckeckBoxSpan"></span>&nbsp;Ich stimme den Nutzungsbedingungen zu und <br>habe die Datenschutzerklärung gelesen.</p>
               </div>
               <div>
                  <input id="regButton" name="regButton" type="submit" value="Regestieren">
               </div>
               <div id="loginDiv">
                  schon registiert?&nbsp;&nbsp;<a href="loginPage.php">Anmelden</a>
               </div>
            </form>
         </div>
      </main>
      <script src="../javascript/regScript.js" defer></script>
   </body>
</html>
<!--he double arrow operator, =>, is used as an access mechanism for arrays. This means that what is on the left side of it will have a corresponding value of what is on the right side of it in array context. This can be used to set values of any acceptable type into a corresponding index of an array. The index can be associative (string based) or numeric.

$myArray = array(
    0 => 'Big',
    1 => 'Small',
    2 => 'Up',
    3 => 'Down'
);
The object operator, ->, is used in object scope to access methods and properties of an object. It’s meaning is to say that what is on the right of the operator is a member of the object instantiated into the variable on the left side of the operator. Instantiated is the key term here.

// Create a new instance of MyObject into $obj
$obj = new MyObject();
// Set a property in the $obj object called thisProperty
$obj->thisProperty = 'Fred';
// Call a method of the $obj object named getProperty
$obj->getProperty();-->