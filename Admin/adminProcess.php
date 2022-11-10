<?php
if(isset($_POST["changeStatus"]))
{
       if($_POST["userType"]=="Regular User")
       {
        $status = $_POST["status"];  
        $userID= $_POST["userIDtoDelete"];
        $conn = mysqli_connect( 'localhost' , 'root', '', 'handyman_services');
        $sql = "UPDATE user_data set userStatus ='$status'  WHERE userID='$userID' ";
        $result = mysqli_query($conn, $sql);
        
        if($result)
           {
             echo "Redirecting" ; header("refresh:0 ; url= adminViewAccounts.php");
           }
        }

        if($_POST["userType"]=="Handyman")
       {
        $status = $_POST["status"];  
        $hmID= $_POST["userIDtoDelete"];
        $conn = mysqli_connect( 'localhost' , 'root', '', 'handyman_services');
        $sql = "UPDATE hmdata set hmStatus ='$status'  WHERE hmID='$hmID' ";
        $result = mysqli_query($conn, $sql);
        
        if($result)
           {
             echo "Redirecting" ; header("refresh:0 ; url= adminViewAccounts.php");
           }
        }
         
       
}



?>