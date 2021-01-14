<?php 

include 'connection.php';



$avticResult = '';

 
	if(isset($_GET['id'])){

        $userId =$_GET['id'];

        $query = "SELECT * from `persons` WHERE `ID` = '$userId' AND `ActiveStatus` = 0 LIMIT 1";

        $result = mysqli_query(OpenCon(), $query);

        $count = mysqli_num_rows($result);

        if ($count == 1){

            $update = "UPDATE `persons` SET `ActiveStatus` = 1 WHERE `ID` = '$userId' LIMIT 1";
            $upadteResult = mysqli_query(OpenCon(), $update);

            if($upadteResult){
                
                $avticResult = ' Vieln Dank Ihr Account wurde freigeschaltet.<br>
                Bitte <a href = "http://localhost/Praktikum-Aufgaben/Aufgabe01/php/loginPage.php">Clicken Sie hier</a>  um sich anzumelden.';
            }else{
                $avticResult = 'Activation Failed!';
            }
           
        }else{
            echo 'failed or already verifed !';
        }

    }

?>



<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Activation</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/activation.css">
    </head>
    <body>
        <main>
            <p>
               <?php echo $avticResult ?> 
            </p>
            
        </main>
        
    </body>
</html>