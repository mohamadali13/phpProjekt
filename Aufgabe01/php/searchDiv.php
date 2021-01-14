<div id="searchingBox" class="rightDiv">
   <div id="searchError">
      <p id="fehlerText"> <?php echo '$error_message;' ?> </p>
   </div>
   <form class="form" action ="searchingResult.php" method ="POST" id="searchForm">
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