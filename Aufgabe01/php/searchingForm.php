<?php
/* include 'connection.php';*/
?>
<?php

if (!isset($_SESSION['login']))
{
    header("Location: loginPage.php");

}

?>
<?php
if (isset($_POST['suchen']))
{

    $emailAdresse = strtolower(trim($_POST['Email']));
    $name = ucwords(trim($_POST['Name']));
    $plz = ($_POST['Plz']);
    $ort = ucwords(trim($_POST['Ort']));
    $telephon = trim($_POST['Telephon']);

    $emailAdresse = mysqli_real_escape_string(OpenCon() , $emailAdresse);
    $name = mysqli_real_escape_string(OpenCon() , $name);
    $plz = mysqli_real_escape_string(OpenCon() , $plz);
    $ort = mysqli_real_escape_string(OpenCon() , $ort);
    $telephon = mysqli_real_escape_string(OpenCon() , $telephon);

    $fields = array(
        'Email',
        'Name',
        'Plz',
        'Ort',
        'Telephon'
    );
    $conditions = array();

    foreach ($fields as $field)
    {
        if (isset($_POST[$field]) && $_POST[$field] != '')
        {
            $conditions[] = "`$field` LIKE '%" . ($_POST[$field]) . "%'";

        }
    }
    $query = "SELECT * FROM `persons`  ";
    if (count($conditions) > 0)
    {
        $query .= "WHERE " . implode(' AND ', $conditions);
    }
    $result = mysqli_query(OpenCon() , $query);
    if (!$result)
    {
        echo 'FEHLER !!!';
    }
    else
    {
        $count_result = mysqli_num_rows($result);
        if ($count_result > 0)
        {
            while ($row = $result->fetch_assoc())
            {
                echo '<br>';
                echo $row['Name'];
            }
        }
        else
        {
            echo 'Kein Ergebnis';
        }
    }

}

?>

<div id="searchingBox" class="rightDiv">
   <div id="searchError">
      <p id="fehlerText"> <?php echo '$error_message;' ?> </p>
   </div>
   <form class="form" action ="" method ="POST" id="searchForm">
      <div class="myDataInput">
         <label class="myDataSectionLabel" for="email">Email</label>
         <input type="email" name="Email" id="email" class="myDataInputFelder">
      </div>
      <div class="myDataInput">
         <label class="myDataSectionLabel" for="name">
         Name 
         </label>
         <input type="text" name="Name" id="name" class="myDataInputFelder">
      </div>
      <div class="myDataInput">
         <label class="myDataSectionLabel" for="plz">
         PLZ 
         </label>
         <input type="text" name="Plz" id="plz" class="myDataInputFelder">
      </div>
      <div class="myDataInput">
         <label class="myDataSectionLabel" for="ort">
         Ort 
         </label>
         <input type="text" name="Ort" id="ort" class="myDataInputFelder">
      </div>
      <div class="myDataInput">
         <label class="myDataSectionLabel" for="telephon">
         Telephone 
         </label>
         <input type="text" name="Telephon" id="telephon" class="myDataInputFelder">
      </div>
      <div class="myDataInput">
         <label class="myDataSectionLabel">
         </label>
         <input type="submit" name="suchen" id="suchenButton" class="myDataInputFelder" value="Suchen">
      </div>
   </form>
</div>