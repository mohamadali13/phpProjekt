<?php
   include '../hidden/connection.php';
   ?>
<?php
   session_start();
   
   if (!isset($_SESSION['login']))
   {
       header("Location: loginPage.php");
   
   }
   ?>
<?php
   $_SESSION['userIDUpdate'] = $_GET['ID'];
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title></title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="../css/dataDisplayAdmin.css">
   </head>
   <body>
      <main>
         <form  method="POST" id="dataUpdate" action="adminUpdate.php">
            <div class="divsClass">
               <label  class="labelsClass" for="Email">Email
               </label>
               <div class="inputFieldAdminUpdate">
                  <?php echo '<input type = "email" name ="Email" id = "email" class ="DataInputFelder" value ="' . $_GET['Email'] . '">  '; ?>
                  <span class="updateInputeError" id="emailUpdateError" ></span>
               </div>
            </div>
            <div class="divsClass">
               <label  class="labelsClass" for="Name">Name
               </label>
               <div class="inputFieldAdminUpdate">
                  <?php echo '<input type = "text" name ="Name" id = "name" class ="DataInputFelder" value ="' . $_GET['Name'] . '">  '; ?>
                  <span class="updateInputeError" id="nameUpdateError" ></span>
               </div>
            </div>
            <div class="divsClass">
               <label  class="labelsClass" for="PLZ">PLZ
               </label>
               <div class="inputFieldAdminUpdate">
                  <?php echo '<input type = "text" name ="PLZ" id = "plz" class ="DataInputFelder" value ="' . $_GET['PLZ'] . '">  '; ?>
                  <span class="updateInputeError" id="plzUpdateError" ></span>
               </div>
            </div>
            <div class="divsClass">
               <label  class="labelsClass" for="Ort">Ort
               </label>
               <div class="inputFieldAdminUpdate">
                  <?php echo '<input type = "text" name ="Ort" id = "ort" class ="DataInputFelder" value ="' . $_GET['Ort'] . '">  '; ?>
                  <span class="updateInputeError" id="ortUpdateError" ></span>
               </div>
            </div>
            <div class="divsClass">
               <label  class="labelsClass" for="Telephon">Telephon
               </label>
               <div class="inputFieldAdminUpdate">
                  <?php echo '<input type = "text" name ="Telephon" id = "telephon" class ="DataInputFelder" value ="' . $_GET['Telephon'] . '">  '; ?>
                  <span class="updateInputeError" id="telephonUpdateError" ></span>
               </div>
            </div>
            <div class="divsClass">
               <label  class="labelsClass" for="Passwort">Passwort
               </label>
               <div class="inputFieldAdminUpdate">
                  <?php echo '<input type = "password" name ="Passwort" id = "passwrot" class ="DataInputFelder" >  ' ;?>
               </div>
            </div>
            <div class="divsClass">
               <label  class="labelsClass" for="wiederPass">wiederholung Passwort
               </label>
               <div class="inputFieldAdminUpdate">
                  <?php echo '<input type = "password" name ="wiederPass" id = "wiederPass" class ="DataInputFelder">  '; ?>
                  <span class="updateInputeError" id="passwordUpdateError" ></span>
               </div>
            </div>
            <div class="divsClass">
               <label  class="labelsClass" for="aktualisieren">
               </label>
               <div class="inputFieldAdminUpdate">
                  <?php echo ' <input id="updateButton" type="submit" name="aktualisieren" value="Aktualisieren" class ="DataInputFelder">  '; ?>
               </div>
            </div>
            <div class="divsClass">
               <label  class="labelsClass" for="loeschen">
               </label>
               <div class="inputFieldAdminUpdate">
                  <?php echo ' <input id="deleteButton" type="submit" name="loeschen" value="Löschen" class ="DataInputFelder"> ' ;?>
               </div>
            </div>
         </form>
         <input id="backButton" type="button" onclick="window.location.href='home.php'" value="Zurück">
      </main>
      <script src="../javascript/dataDisplayAdmin.js" async defer></script>
   </body>
</html>