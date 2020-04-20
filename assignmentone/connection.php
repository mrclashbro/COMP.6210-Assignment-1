<?php

   // Create Database credential variables
   $user = "a3001429_clash";
   $password = "&oBNrU[uyKBI";
   $db = "a3001429_scp";

   // Create php db connection object
   $connection = new mysqli('localhost', $user, $password, $db) or die(mysqli_error($connection));

   // selcet data from db

   $result = $connection->query("select * from scp") or die($connection->error);

   // Insert Data to database

   if(isset($_POST['Item_no']))
   {
       // save all $_POST values from form into separate variables
       $Item_no = $_POST['Item_no'];
       $object_class = $_POST['Object_Class'];
       $subject_image = $_POST['subject_image'];
       $special_containment_procedure = $_POST['Special_Containment_Procedure'];
       $description = $_POST['Description'];
       $Reference = $_POST['Reference'];
       $ad1 = $_POST['Addendum_003_01'];
       $ad2 = $_POST['Addendum_003_02'];
       $ad3 = $_POST['Addendum_003_03'];
       $ad4 = $_POST['Addendum_003_04'];
       $ad5 = $_POST['Addendum_003_05'];
       $ch = $_POST['Chronological_History'];
       $sta = $_POST['Space_Time_Anomalies'];
       $Additional_Notes = $_POST['Additional_Notes'];
       $appA = $_POST['Appendix_A_Mental_Health_Effects_of_SCP_004_12'];
       $appB = $_POST['Appendix_B_Additional_Information'];

       $sql = "insert into scp (Item_no,Object_Class,subject_image,Special_Containment_Procedure, Description, Reference, Addendum_003_01, Addendum_003_02, Addendum_003_03, Addendum_003_04, Addendum_003_05, Chronological_History, Space_Time_Anomalies, Additional_Notes, Appendix_A_Mental_Health_Effects_of_SCP_004_12, Appendix_B_Additional_Information) values('$Item_no','$object_class','$subject_image','$special_containment_procedure','$description','$Reference','$ad1','$ad2','$ad3','$ad4','$ad5','$ch','$sta','$Additional_Notes','$appA','$appB')";

       if ($connection->query($sql) === TRUE) 
       {
        
        echo "<h1>Record created successfully</h1>
              <p><a href='index.php#database' class='btn btn-primary' style='width: 73px;background-color: rgb(255,0,0);color: rgb(255,255,255);'>Back to SCP App</a></p>";
              
       } 
       else 
       {
           
           echo "<h1>Error creating record: {$connection->error}</h1>
           <p><a href='index.php#create' class='btn btn-warning'>Back to form</a></p>";
           
       }

       
       
   }


  


// delete data from db

if(isset($_GET['delete']))
{
    $Item_n = $_GET['delete'];
    $mysqli->query("delete from scp where Item_no=$Item_n") or die($mysqli->error);

   header('location: index.php#database');
}

// update data in db



?>