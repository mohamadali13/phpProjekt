<?php
session_start();
if (!isset($_SESSION['login']))
{
    header("Location: loginPage.php");

}
else
{
    unset($_SESSION["login"]);
    unset($_SESSION['Email']);
    unset($_SESSION['Name']);
    unset($_SESSION['Gruppe']);
    unset($_SESSION['Plz']);
    unset($_SESSION['Telephon']);
    unset($_SESSION['Ort']);
    unset($_SESSION['Passwort']);

    session_destroy();

}

?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="../css/auslogenAlert.css">
      <title>Logout</title>
   </head>
   <body>
      <main>
         <p>Sie haben sich erfolgreich ausgeloggt</p>
         <p>Bitt <a href="loginPage.php">klicken Sie hier</a> um sich wieder anzumelden </p>
      </main>
   </body>
</html>