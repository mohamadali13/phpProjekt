<?php

if (!isset($_SESSION['login']))
{
    header("Location: loginPage.php");

}

?>


<div id="AktualisierenAlert" class="rightDiv">
   <p>Die Daten wurde erfolgreich akualisiert</p>
   <p>Bitt <a href="#">klicken Sie hier</a> um die akualisierten Daten anzurufen </p>
</div>