<?php
    $name = "someName";
    $value = 100;
    $expiration = time() + (60*60*24*7);//seconds * minuts * hours* days

    setcookie($name ,$value,$expiration);
    


?>