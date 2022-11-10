<?php
session_start();

//FIND JOB
if(isset($_POST["loadInfo"]))
{
 $requestID = $_POST["requestID"];
 $conn = mysqli_connect( 'localhost' , 'root', '', 'handyman_services');
 $sql = "SELECT * from request_data where requestID = '$requestID'";
 $query_run = mysqli_query($conn,$sql);
 $row = mysqli_fetch_array($query_run); 

 if($row !=null)
 {  
    $_SESSION["requestID"] = $row["requestID"];
    $_SESSION["problemDescription"] = $row["problemDescription"];
    $_SESSION["problemType"] = $row["problemType"];
      
            $userID = $row["userID"];
            $conn = mysqli_connect( 'localhost' , 'root', '', 'handyman_services');
            $sql = "SELECT * from user_data where userID = '$userID'";
            $query_run = mysqli_query($conn,$sql);
            $row2 = mysqli_fetch_array($query_run);
            if($row2 !=null)
            { 
                $_SESSION["userName"] = $row2["userName"];
                $_SESSION["userAddress"] = $row2["userAddress"];
                $_SESSION["userEmail"] = $row2["userEmail"];
                $_SESSION["userPhoneNo"] = $row2["userPhoneNo"];
            }

            else {echo "user Not Found ";}


    echo "Job Found";
    header("refresh:1 ; url=http://localhost/wtproject/Handyman/hmJob.php ");

 }
 else {
  echo "Job Not Found. Enter a Correct Request ID";
  header("refresh:2 ; url=http://localhost/wtproject/Handyman/hmJob.php ");

 }

}

// PLACE OFFER
if(isset($_POST["offer"]) &&  $_SESSION["requestID"]!="" )
 {
   if($_POST["offeredPrice"]!="")
   {
    $requestID = $_SESSION["requestID"];   
    $offeredPrice = $_POST["offeredPrice"];
    $hmID = $_SESSION["hmID"];
    $message = $_POST["additionalMessage"];
    $tableName = "temp_bids_".$requestID;
    $conn = mysqli_connect( 'localhost' , 'root', '', 'handyman_services');
    $sql = "INSERT INTO $tableName (requestID, bidAmount, hmID, additionalMessage) VALUES ('$requestID' , '$offeredPrice' , '$hmID', '$message' );";
    if(mysqli_query($conn , $sql))
    {
        echo "Offer Placed. Stay Tuned For Updates";
        header("refresh:2 ; url=http://localhost/wtproject/Handyman/hmHome.php ");

    }
    else {
        echo "Error in Placing Offer";
        header("refresh:2 ; url=http://localhost/wtproject/Handyman/hmJob.php ");
    }

   }
   else {
    echo "Please offer a price for the job";
    header("refresh:2 ; url=http://localhost/wtproject/Handyman/hmJob.php ");
     }

 } else {

    header("refresh:1 ; url=http://localhost/wtproject/Handyman/hmJob.php ");
     }


//JOB IS ONGOING 
 if(isset($_POST["updateJobInfo"]))
{
    if(isset($_POST["requestID"]))
    {
        if(isset($_POST["problemCompleted"]))
        {   
            $requestID = $_POST["requestID"];
            

            $conn = mysqli_connect( 'localhost' , 'root', '', 'handyman_services');
            $sql = "SELECT * from request_data where requestID = '$requestID'";
            $query_run = mysqli_query($conn,$sql);
            $row2 = mysqli_fetch_array($query_run);
            if($row2 !=null)
            {
                $problemCompleted = $_POST["problemCompleted"];
                $sql = "UPDATE request_data set problemCompleted ='$problemCompleted'  WHERE requestID='$requestID' ";
                $result = mysqli_query($conn, $sql);
        
                   if($result)
                   {
                    echo "Updated" ; header("refresh:2 ;url= http://localhost/wtproject/Handyman/hmManageJobs.php");
                   } 
                    
                    else {
                    echo "Could not Update";
                    header("refresh:2 ; url=http://localhost/wtproject/Handyman/hmManageJobs.php ");
                     }
                
            }
            else {
                echo "Request ID not Found";
                header("refresh:2 ; url=http://localhost/wtproject/Handyman/hmManageJobs.php ");
                 }


        }
        else {
            echo "Please Post Your Progression";
            header("refresh:2 ; url=http://localhost/wtproject/Handyman/hmManageJobs.php ");
             }

    }   else {
        echo "Please Provide Request ID";
        header("refresh:2 ; url=http://localhost/wtproject/Handyman/hmManageJobs.php ");
         }
}


//JOB IS FINISHED
if(isset($_POST["finishJob"]))
{
    if(isset($_POST["requestID"]))
    {
        $requestID = $_POST["requestID"];
            

        $conn = mysqli_connect( 'localhost' , 'root', '', 'handyman_services');
        $sql = "SELECT * from request_data where requestID = '$requestID'";
        $query_run = mysqli_query($conn,$sql);
        $row2 = mysqli_fetch_array($query_run);
        if($row2 !=null)
        {  
            $conn = mysqli_connect( 'localhost' , 'root', '', 'handyman_services');
            $problemCompleted = 'DONE';
            $sql = "UPDATE request_data set problemCompleted ='$problemCompleted'  WHERE requestID='$requestID' ";
            $result = mysqli_query($conn, $sql);
    
               if($result)
               {
                 $hmID = $_SESSION["hmID"]; 
                 $conn = mysqli_connect( 'localhost' , 'root', '', 'handyman_services');
                
                 $sql = "UPDATE hmdata set jobCompleted =jobCompleted +1  WHERE hmID='$hmID' ";
                 $result = mysqli_query($conn, $sql);
                 if($result)
                 {
                    echo "JOB FINISHED" ; header("refresh:2 ;url= http://localhost/wtproject/Handyman/hmHome.php");
                 }
               
               }

        } else {
            echo "Request ID not Found";
            header("refresh:2 ; url=http://localhost/wtproject/Handyman/hmManageJobs.php ");
             }

    }  
    else {
        echo "Please Provide Request ID";
        header("refresh:2 ; url=http://localhost/wtproject/Handyman/hmManageJobs.php ");
         }
}

?>


