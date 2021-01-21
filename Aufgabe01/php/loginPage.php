<?php 
include '../hidden/connection.php';?>
<?php 
    session_start();

    
    if(isset($_SESSION['login'])){
        header("Location: home.php");

    }

?>
<?php
   
    if (isset($_POST['loginButton'])){

        $emailAdresse = strtolower(trim($_POST['email']));
        $password = trim($_POST['password']);
    
        $emailAdresse = mysqli_real_escape_string(OpenCon() , $emailAdresse);
        $password = mysqli_real_escape_string(OpenCon() , $password);

        $hashFormat = "$2y$10$"; //10 mal
        $salt = "iusesomecrazystrings22"; //muss min.22 char
        $hashF_and_salt = $hashFormat . $salt;
    
        $password = crypt($password, $hashF_and_salt);

        if ($emailAdresse && $password ){

        // $select = "SELECT * FROM register WHERE email = '$email' AND password = '$password' AND status = 'Active'";
            $query = "SELECT * FROM `persons` WHERE `Email` = '$emailAdresse' AND `Passwort` = '$password' AND `ActiveStatus` = 1 LIMIT 1";
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
                

                header("Location: home.php");
                
            }
            else{
                echo "This username & password invalid";
            }

        }

    }   
?>
<?php 
 

    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LandingPage</title>
    <link rel="stylesheet" href="../css/loginPage01.css">
</head>

<body>
    <main>
        <div id="loginDiv">
            Login
        </div>
        <div id="loginRightDiv">
            <div id="loginFehlerDiv">
                <p>the Email or Password ot both are not correct</p>
            </div>
            <form action="loginPage.php" method="POST" id="form">
                <div id="emailDiv">
                    <input id="email" name="email" type="email" placeholder="E-Mail" >*<br>
                    <span id = emailFehlerSpan class="inputFehlerMedlung"> Please put the Email</span>
                    <span id ="emailFelhersopan2" class="inputFehlerMedlung">Die Email ist nicht registert!</span>
                </div>
                <div id="passDiv">
                    <input id="password" name="password" type="password" placeholder="Passwort">*<br>
                    <span id ="passwordFehlerSpan" class="inputFehlerMedlung">please put the Passwort</span>
                </div>


                <input id="loginButton" type="submit" name="loginButton" value="Login" >

                <div id="regLink">

                    <p>
                        noch nicht angemeldet? <br><br>
                        <a href="regPage.php" id="linkOfReg">Hier Klicken</a> um sich zu regestieren!
                    </p>


                </div>
            </form>
        
        </div>
        
    </main>
    <script src="../javascript/loginPage.js"></script>
</body>

</html>