<?php 
include '../hidden/connection.php';

?>
<?php 

session_start();
    
if(!isset($_SESSION['login'])){
    header("Location: loginPage.php");

}

   
    ?>
<?php
    $resultNumber = '';
    if(isset($_POST['suchen'])){

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
        'Telephon',
        'Passwort'
    );
    $conditions = array();

    

    foreach($fields as $field){
        if(isset($_POST[$field]) && $_POST[$field] != '' ){
            $conditions[] = "`$field` LIKE '%" .($_POST[$field]). "%'";
            
        }
    }
    $query = "SELECT * FROM `persons`  ";
    if(count($conditions) > 0){
        $query .= "WHERE " . implode(' AND ',$conditions);
    }
    $result = mysqli_query(OpenCon(),$query);
 
         
}

    


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SearchingResult</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="  https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../css/searchingResult01.css">
</head>
<body>
   
<div id="personstable" class="rightDiv" >
            <table class=" table table-striped table-bordered  table-hover" style="width:100%" id="mydatatable">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Name</th>
                        <th>PLZ</th>
                        <th>Ort</th>
                        <th>Telephon</th>
                    </tr>
                </thead>
                <tbody >

              <?php 
                       if(!$result){
                        echo 'FEHLER !!!';
                    }else{
                        $count_result = mysqli_num_rows($result);
                        if($count_result > 0){
                            while($data = $result->fetch_assoc()){?> 
                            <tr>
                              
                            <td>
                                   <?php if($_SESSION['Gruppe'] == 'user'){
                                        echo '<a href="dataDisplayUser.php?Email='.$data['Email'].'&Name='.$data['Name'].'&PLZ='.$data['PLZ'].'&Ort='.$data['Ort'].'&Telephon='.$data['Telephon'].'&ID='.$data['ID'].'">'.$data['Email'];'</a>';
                                   } else if($_SESSION['Gruppe'] == 'admin'){
                                    echo '<a href="dataDisplayAdmin.php?Email='.$data['Email'].'&Name='.$data['Name'].'&PLZ='.$data['PLZ'].'&Ort='.$data['Ort'].'&Telephon='.$data['Telephon'].'&Passwort='.$data['Passwort'].'&ID='.$data['ID'].'">'.$data['Email'];'</a>';
                                   }
                                   ?>
                                  
                                   
                                   </a>
                                    
                               </td>
                              <td>
                              <?php echo $data['Name']; ?>
                              </td>
                              <td>
                              <?php echo $data['PLZ']; ?>
                              </td>
                              <td>
                              <?php echo $data['Ort']; ?>
                              </td>
                              <td>
                              <?php echo $data['Telephon']; ?>
                              </td>
                           </tr>
                              
                              
                           <?php
                           } 
                           $resultNumber = $count_result . ' ' . 'Results' .' ' . 'gefunden!';
                           ?>
                           <?php 
                        }else{
                            $resultNumber = 'Kein Ergines gefunden';
                        }
                    }
                    ?>
                        
                        <div id="resultNum"><?php echo $resultNumber; ?></div>
                            
                    
                </tbody> 
         
            </table>

            <input id="backButton" type="button" onclick="window.location.href='home.php'" value="Zurück">
        </div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
</body>
</html>