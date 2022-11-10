<?php

if(isset($_POST["userUpdate"]))
{   
    session_start();
    $userID = $_SESSION["userID"];
    $newUserName = $_POST["newUserName"];
    $newUserEmail = $_POST["newUserEmail"];
    $newUserPhoneNo = $_POST["newUserPhoneNo"];
    $newUserAddress = $_POST["newUserAddress"];
    $userNewPassword = $_POST["userNewPassword"];
    if(isset($_POST["newUserName"]))
    { 
      if($_POST["newUserName"]!= $_SESSION["userName"])
      {
        if (preg_match("/^[a-zA-Z-' ]*$/",$_POST["newUserName"]))
        {
        $conn = mysqli_connect( 'localhost' , 'root', '', 'handyman_services');
        $sql = "UPDATE user_data set userName ='$newUserName'  WHERE userID='$userID';";
        $result = mysqli_query($conn, $sql);
           if($result)
           {
            header("refresh:0 ; url=http://localhost/wtproject/User/userHome.php");
           }
        }  else  {  echo "User Name Must Contain Letters and Spaces Only. "; header("refresh:2 ; url=http://localhost/wtproject/User/updateUserInfo.php"); }  
    }
  }
    
    if(isset($_POST["newUserAddress"]))
    {
      if($_POST["newUserAddress"]!= $_SESSION["userAddress"])
      {
        $conn = mysqli_connect( 'localhost' , 'root', '', 'handyman_services');
        $sql = "UPDATE user_data set userAddress ='$newUserAddress' WHERE userID='$userID' ";
        $result = mysqli_query($conn, $sql);
           if($result)
           {
             header("refresh:0 ; url=http://localhost/wtproject/User/userHome.php");
           }
    }
  }
    
    if(isset($_POST["newUserEmail"]))
    {  
        if($_POST["newUserEmail"]!=$_SESSION["userEmail"])
        {
        if (filter_var($_POST["newUserEmail"], FILTER_VALIDATE_EMAIL)) 
        {    
        $conn = mysqli_connect( 'localhost' , 'root', '', 'handyman_services');
        $sql = "UPDATE user_data set userEmail ='$newUserEmail'  WHERE userID='$userID' ";
        $result = mysqli_query($conn, $sql);

           if($result)
           {
            echo "Redirecting" ; header("refresh:2 ;url= http://localhost/wtproject/signout.php");
           }
        } else {echo "Invalid Email Address"; }
        }
    }
    
    if(isset($_POST["newUserPhoneNo"]))
    { 
      if($_POST["newUserPhoneNo"]!= $_SESSION["userPhoneNo"])
      {
        $conn = mysqli_connect( 'localhost' , 'root', '', 'handyman_services');
        $sql = "UPDATE user_data set userPhoneNo ='$newUserPhoneNo'  WHERE userID='$userID' ";
        $result = mysqli_query($conn, $sql);
        if($_POST["newUserPhoneNo"]!=$_SESSION["userPhoneNo"])
        {   
        if($result)
           {
             echo "Redirecting" ; header("refresh:2 ;url= http://localhost/wtproject/signout.php");
           }
        }
      }
         
    }

    if(isset($_POST["userNewPassword"]) && $_POST["userNewPassword"]!="")
    {
        if($_POST["userOldPassword"] == $_SESSION["userPassword"])
        { 
          if($_POST["userNewPassword"] =="")
          {
            if($_POST["userNewPassword"] == $_POST["confirmUserNewPassword"] )
            {
              $conn = mysqli_connect( 'localhost' , 'root', '', 'handyman_services');
              $sql = "UPDATE user_data set userPassword ='$userNewPassword'  WHERE userID='$userID' ";
              $result = mysqli_query($conn, $sql);  
              if($result)
           {
             echo "Redirecting" ; header("refresh:2 ; url= http://localhost/wtproject/signout.php");
           }
          }
           
        } else {echo "Make Sure Both Passwords are same ! "; header("refresh:2 ; url=http://localhost/wtproject/User/updateUserInfo.php");}
    }  else {echo "Old Password Is not Correct! "; header("refresh:2 ; url= http://localhost/wtproject/User/updateUserInfo.php");}
    
    } 
}

if(isset($_POST["deleteAccount"]))
{  
    session_start();
    $userPasswordForDeletion = $_POST["userPasswordForDeletion"];
    $userID = $_SESSION["userID"];
    if($_POST["userPasswordForDeletion"] == $_SESSION["userPassword"])
    {
        $conn = mysqli_connect( 'localhost' , 'root', '', 'handyman_services');
        $sql = "DELETE from user_data WHERE userID='$userID' and userPassword='$userPasswordForDeletion' ";
        $result = mysqli_query($conn, $sql);  
        if($result)
           {
             echo "Redirecting" ; header("refresh:2 ; url= http://localhost/wtproject/signout.php");
           }
    }     else {echo "Make Sure Both Passwords are same ! "; header("refresh:2 ; url=http://localhost/wtproject/User/updateUserInfo.php");}
}



?>