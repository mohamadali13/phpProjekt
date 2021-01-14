<?php 
  include '../hidden/connection.php';
?>
<?php 
    session_start();
    
    if(!isset($_SESSION['login'])){
        header("Location: loginPage.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Home</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="  https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
      <link rel="stylesheet" href="../css/home0.css">
   </head>
   <body>
      <main>
         <div id="naviHome">
            <input type="button" id="myDatabutton" value="My Data" class="naviButtons" formtarget="#myDataDiv">
            <input type="button" id="listPersonsButton" value="List Persons" class="naviButtons" formtarget="#personstable">
            <input type="button" id="SearchButton" value="Search" class="naviButtons" formtarget="#searchingBox">
            <input type="button" id="LogoutButton" value="Logout" class="naviButtons" formtarget="#auslogenAlert">
         </div>
         <div id="willkommenDiv" class="rightDiv">
            <p id="willkommenHome">Willkommen <?php echo $_SESSION['Name'];?></p>
         </div>
         <?php include 'myDataDiv.php'; ?>
         <?php include 'personalTable.php'; ?>
         <?php include 'userInformation.php'; ?>
         <?php include 'AktualisierenAlert.php' ; ?>
         <div id="searchingBox" class="rightDiv">
            <div id="searchError">
               <p id="fehlerText"> <?php echo '$error_message;' ?> </p>
            </div>
            <form class="form" action ="searchingResult.php" method ="POST" id="searchForm">
               <div class="myDataInput">
                  <label class="myDataSectionLabel" for="email">Email</label>
                  <input type="email" name="Email" id="searchEmail" class="myDataInputFelder">
               </div>
               <div class="myDataInput">
                  <label class="myDataSectionLabel" for="name">
                  Name 
                  </label>
                  <input type="text" name="Name" id="searchName" class="myDataInputFelder">
               </div>
               <div class="myDataInput">
                  <label class="myDataSectionLabel" for="plz">
                  PLZ 
                  </label>
                  <input type="text" name="Plz" id="searchPlz" class="myDataInputFelder">
               </div>
               <div class="myDataInput">
                  <label class="myDataSectionLabel" for="ort">
                  Ort 
                  </label>
                  <input type="text" name="Ort" id="searchOrt" class="myDataInputFelder">
               </div>
               <div class="myDataInput">
                  <label class="myDataSectionLabel" for="telephon">
                  Telephone 
                  </label>
                  <input type="text" name="Telephon" id="searchTelephon" class="myDataInputFelder">
               </div>
               <div class="myDataInput">
                  <label class="myDataSectionLabel">
                  </label>
                  <input type="submit" name="suchen" id="suchenButton" class="myDataInputFelder" value="Suchen">
               </div>
            </form>
         </div>
      </main>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
      <script>
         $('#mydatatable').DataTable({
             searching: false,
             pageLength: 10,
             "lengthChange": false
         });
         
         jQuery(function() {
             jQuery('#myDatabutton').click(function() {
                 jQuery('.rightDiv').hide();
                 jQuery('#myDataDiv').show();
             });
             jQuery('#listPersonsButton').click(function() {
                 jQuery('.rightDiv').hide();
                 jQuery('#personstable').show();
             });
             jQuery('#SearchButton').click(function() {
                 jQuery('.rightDiv').hide();
                 jQuery('#searchingBox').show();
             });
             jQuery('#LogoutButton').click(function() {
                 window.location.href='auslogenAlert.php';
                  });
         
         })
      </script>
   </body>
   <script type="text/javascript" src="../javascript/suchen.js" defer></script>
   <script type="text/javascript" src="../javascript/myDataDiv.js" defer></script>
</html>