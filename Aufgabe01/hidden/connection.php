


<?php 
  
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