<? include '../hidden/connection.php' ?>


<?php

if (!isset($_SESSION['login']))
{
    header("Location: loginPage.php");

}

?>

<?php
//Update
if (isset($_POST['akualisieren']))
{

    $emailAdresse = strtolower(trim($_POST['Email']));
    $name = ucwords(trim($_POST['Name']));
    $plz = ($_POST['Plz']);
    $ort = ucwords(trim($_POST['Ort']));
    $telephon = trim($_POST['Telephon']);
    $password = trim($_POST['Password']);

    $emailAdresse = mysqli_real_escape_string(OpenCon() , $emailAdresse);
    $name = mysqli_real_escape_string(OpenCon() , $name);
    $plz = mysqli_real_escape_string(OpenCon() , $plz);
    $ort = mysqli_real_escape_string(OpenCon() , $ort);
    $telephon = mysqli_real_escape_string(OpenCon() , $telephon);
    $password = mysqli_real_escape_string(OpenCon() , $password);

    $hashFormat = "$2y$10$"; //10 mal
    $salt = "iusesomecrazystrings22"; //muss min.22 char
    $hashF_and_salt = $hashFormat . $salt;

    $password = crypt($password, $hashF_and_salt);

    $fields = array(
        'Email',
        'Name',
        'PLZ',
        'Ort',
        'Telephon'
    );
    $conditions = array();

    foreach ($fields as $field)
    {
        if (isset($_POST[$field]) && $_POST[$field] != '')
        {
            $conditions[] = "`$field` = " .  $_POST[$field];

        }
    }
    $query = "UPDATE `persons` ";
    if (count($conditions) > 0)
    {
        //$query = "UPDATE `persons` SET `Name` = 'Mohamad Alschammari' WHERE `ID` ='".$_SESSION['ID']."'" ;
        $query .= " SET " . implode(' AND ', $conditions) . "WHERE `ID` = '" . $_SESSION['ID'] . "'";

    }
    $result = mysqli_query(OpenCon() , $query);
    if (!$result)
    {
        echo 'FEHLER !!!';
    }
    else
    {
        echo 'alles klar';
        /*$count_result = mysqli_num_rows($result);
        if($count_result > 0){
            while($row = $result->fetch_assoc()){
                echo '<br>';
                echo $row['Name'];
            }
        }else{
            echo 'Kein Ergebnis';
        }*/
    }

}
?>

<div id="myDataDiv" class="rightDiv">
   <form class="form" action="updatingData.php" method="POST" id="myDataUpdate">
      <div class="myDataInput">
         <label class="myDataSectionLabel" for="Email">Email</label>
         <!--  <input type="email" name="email" id="email" class="myDataInputFelder">-->
         <div class="inputFieldMyDataDiv">
            <?php echo '<input type="email" name="Email" id="email" class="myDataInputFelder" value ="'.$_SESSION['Email'].'" .>';?><br>
            <span class="updateInputeError" id="emailUpdateError" ></span>
         </div>
      </div>
      <div class="myDataInput">
         <label class="myDataSectionLabel" for="Name">
         Name 
         </label>
         <div class="inputFieldMyDataDiv">
            <?php echo '<input type = "text" name ="Name" id = "name" class ="myDataInputFelder" value ="'.$_SESSION['Name'].'"> ' ;?><br />
            <span class="updateInputeError" id="nameUpdateError" ></span>
         </div>
         <!--<input type="text" name="name" id="name" class="myDataInputFelder">-->
      </div>
      <div class="myDataInput">
         <label class="myDataSectionLabel" for="PLZ">
         PLZ 
         </label>
         <div class="inputFieldMyDataDiv">
            <?php echo '<input type="text" name="PLZ" id="plz" class="myDataInputFelder" value ="'.$_SESSION['Plz'].'">  '; ?><br />
            <span class="updateInputeError" id="plzUpdateError" ></span>
         </div>
         <!--  <input type="text" name="plz" id="plz" class="myDataInputFelder">-->
      </div>
      <div class="myDataInput">
         <label class="myDataSectionLabel" for="Ort">
         Ort 
         </label>
         <div class="inputFieldMyDataDiv">
            <?php echo '<input type="text" name="Ort" id="ort" class="myDataInputFelder" value ="'.$_SESSION['Ort'].'">  '; ?><br>
            <span class="updateInputeError" id="ortUpdateError" ></span>
         </div>
         <!--  <input type="text" name="ort" id="ort" class="myDataInputFelder">-->
      </div>
      <div class="myDataInput">
         <label class="myDataSectionLabel" for="Telephon">
         Telephone 
         </label>
         <div class="inputFieldMyDataDiv">
            <?php echo '<input type="text" name="Telephon" id="telephon" class="myDataInputFelder" value ="'.$_SESSION['Telephon'].'">  '; ?><br>
            <span class="updateInputeError" id="telephonUpdateError" ></span>
         </div>
         <!--   <input type="text" name="telephon" id="telephon" class="myDataInputFelder">-->
      </div>
      <div class="myDataInput">
         <label class="myDataSectionLabel" for="Passwort">
         Passwort 
         </label>
         <div class="inputFieldMyDataDiv">
            <?php echo '<input type="password" name="Passwort" id="passwort" class="myDataInputFelder">  ' ;?>
         </div>
         <!--   <input type="password" name="Passwort" id="passwort" class="myDataInputFelder">-->
      </div>
      <div class="myDataInput">
         <label class="myDataSectionLabel" for="wiederholung">
         Widerholung 
         </label>
         <div class="inputFieldMyDataDiv">
            <?php echo '<input type="password" name="wiederholung" id="wiederholung" class="myDataInputFelder" >  '; ?><br>
            <span class="updateInputeError" id="passwordUpdateError" ></span>
         </div>
         <!--  <input type="password" name="wiederholung" id="wiederholung" class="myDataInputFelder">-->
      </div>
      <div class="myDataInput">
         <label class="myDataSectionLabel">
         </label>
         <div class="inputFieldMyDataDiv">
            <input type="submit" name="aktualisieren" id="akualisierenButton" class="myDataInputFelder" value="Aktualisieren">
         </div>
      </div>
      <div id="checkBoxReg">
      </div>
   </form>
</div>