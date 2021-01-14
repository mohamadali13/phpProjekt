<?php  include'../hidden/connection.php'?>


<?php 
  /*
  function OpenCon()
  {
  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $db = "skygate-aufgaben";
  $conn = new mysqli($dbhost, $dbuser, $dbpass,$db);
  
  return $conn;
  }
  function CloseCon($conn)
  {
  $conn -> close();
  }

  if (!OpenCon()) {
    echo "No";
}
  
     

/*function OpenCon()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "skygate-aufgaben";
    $connection = new mysqli($dbhost, $dbuser, $dbpass, $db);

    return $connection;
}
function CloseCon($connection)
{
    $connection->close();
}

if (!OpenCon())
{
    echo "Fehler mit der Verbindung mit der Datenbank";

}*/
?>
<?php 
    session_start();
    if(!isset($_SESSION['login'])){
        header("Location: http://localhost/Praktikum-Aufgaben/Aufgabe01/php/loginPage.php");
    
    }
?>


<?php
    //Update
    if(isset($_POST['aktualisieren'])){

            $emailAdresse = strtolower(trim($_POST['Email']));
            $name = ucwords(trim($_POST['Name']));
            $plz = ($_POST['PLZ']);
            $ort = ucwords(trim($_POST['Ort']));
            $telephon = trim($_POST['Telephon']);
            $password = trim($_POST['Passwort']);
        
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
    
             
                
            
            
            $_POST['Email'] = $emailAdresse ;
            $_POST['Name'] = $name;
            $_POST['PLZ'] = $plz;
            $_POST['Ort'] = $ort ;
            $_POST['Telephon'] =  $telephon;
            $_POST['Passwort'] = $password;

            $fields = array(
                'Email',
                'Name',
                'PLZ',
                'Ort',
                'Telephon',
                'Passwort'
            );
            $conditions = array();

    

    foreach($fields as $field){
        if(isset($_POST[$field]) && $_POST[$field] != '' ){
            $conditions[] = "`$field` = " ." '$_POST[$field]'";
            
        }
    }
    $query = "UPDATE `persons` ";
    if(count($conditions) > 0){
        //$query = "UPDATE `persons` SET `Name` = 'Mohamad Alschammari' WHERE `ID` ='".$_SESSION['ID']."'" ;
        $query .= "SET " . implode(',',$conditions). " WHERE `ID` = '".$_SESSION['ID']."'";
        
    }
    $result = mysqli_query(OpenCon(),$query);
    if(!$result){
        $updateMessage = 'FEHLER !!!';
    }else{
        $query = "SELECT * FROM `persons` WHERE `ID` = '".$_SESSION['ID']."' LIMIT 1";
            $result = mysqli_query(OpenCon(), $query);
            $count = mysqli_num_rows($result);
            
            if ($count == 1){
                $data = $result->fetch_assoc();
                $_SESSION['login'] = 'loggedin';
                $_SESSION['Email'] = $emailAdresse;
                $_SESSION['Name'] = $data['Name'];
                $_SESSION['Gruppe'] = $data['Gruppe'];
                $_SESSION['Plz'] = $data['PLZ'];
                $_SESSION['Telephon'] = $data['Telephon'];
                $_SESSION['Ort'] = $data['Ort'];
                $_SESSION['Passwort'] = $data['Passwort'];
                $_SESSION['ID'] = $data['ID'];
            }
                
            $updateMessage = 'Die Daten wurden erfolgreich aktulaisiert <br> Bitte cklicken Sie <a href = "home.php">hier</a> um die aktulalisierten Daten aufzurufen. ';
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Result</title>
    <link rel="stylesheet" href="../css/updatingData.css">
</head>
<body>
    <main>
        <div>
            <?php
                echo $updateMessage ;
            ?>
        </div>

    </main>
</body>
</html>