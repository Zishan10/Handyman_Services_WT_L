
<?php

session_start();
 $userID =$_SESSION["userID"];

if(isset($_POST["postRequest"]))
{   

if(isset($_POST["problemDescription"]))
{ 
    if(isset($_POST["problemType"]))
    {
    
      $requestedBy = $_SESSION["userName"];
      $problemDescription = $_POST["problemDescription"];
      $problemType = $_POST["problemType"];
      $postDate = $_POST["postDate"];
      $postTime = $_POST["postTime"];
      
      $conn = mysqli_connect( 'localhost' , 'root', '', 'handyman_services');
      $sql = "INSERT INTO request_data (userID, requestedBy, problemDescription, problemType, postDate,postTime) VALUES ('$userID','$requestedBy','$problemDescription'
      ,'$problemType','$postDate','$postTime')";
       $result = mysqli_query($conn, $sql);
       if($result)
       {
        $sql2 = "SELECT * FROM request_data Where userID ='$userID' and postTime = '$postTime'";
        $query_run = mysqli_query($conn,$sql2);
        $rows = mysqli_fetch_array($query_run);
        $requestID = $rows["requestID"];
        $tableName = "Temp_Bids_".$requestID;
         $sql3 = "CREATE TABLE $tableName (requestID varchar(30) NOT NULL, bidAmount varchar(10) NOT NULL , hmID varchar(5) NOT NULL , additionalMessage text NOT NULL)";
         $result2 = mysqli_query($conn, $sql3);

         if($result2)
         {
          echo "Your Problem Has Been Posted Successfully, Bidding System Created Successfully";
          header("refresh:5 ; url=userHome.php");
         }
         else { echo "Error In Creating Bidding System"; header("refresh:1 ; url=makeAPost.php"); }
         
      
       }
       else { echo "Error In Posting"; header("refresh:1 ; url=makeAPost.php"); }



    }
    else {echo "Please Select your Problem Type"; header("refresh:1 ; url=makeAPost.php");}


}else {echo "Please Describe Your Problem"; header("refresh:1 ; url=makeAPost.php");}


}

?>