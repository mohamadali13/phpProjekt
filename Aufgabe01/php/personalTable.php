<?php 

    
if(!isset($_SESSION['login'])){
    header("Location: loginPage.php");

}

?>



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
                   $query = "SELECT * FROM persons";
                    $result = mysqli_query(OpenCon(),$query);
                
                        while ($data = $result->fetch_assoc()){
                ?> 
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
                            ?>

                </tbody> 
         
            </table>
        </div>

        