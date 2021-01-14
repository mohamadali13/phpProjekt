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

<!DOCTYPE html>
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>dataDisplayUser</title>
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="../css/dataDisplayUser0.css">
</head>
<body>
   <main>
      <div>
         <label>Email</label>
         <p><?php echo  $_GET['Email'];?></p>
      </div>
      <div>
         <label>Name</label>
         <p><?php echo  $_GET['Name'];?></p>
      </div>
      <div>
         <label>Ort</label>
         <p><?php echo  $_GET['Ort'];?></p>
      </div>
      <div>
         <label>PLZ</label>
         <p><?php echo  $_GET['PLZ'];?></p>
      </div>
      <div>
         <label>Telephon</label>
         <p><?php echo  $_GET['Telephon'];?></p>
      </div>
      <input id="backButton" type="button" onclick="window.location.href='home.php'" value="Zurück">
   </main>
</body>
</html>