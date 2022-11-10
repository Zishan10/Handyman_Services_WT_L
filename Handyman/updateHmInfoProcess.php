<?php

if(isset($_POST["hmUpdate"]))
{   
    session_start();
    $hmID = $_SESSION["hmID"];
    $newHmName = $_POST["newHmName"];
    $newHmEmail = $_POST["newHmEmail"];
    $newHmPhoneNo = $_POST["newHmPhoneNo"];
    $newHmAddress = $_POST["newHmAddress"];
    $hmNewPassword = $_POST["hmNewPassword"];
    $hmNewType= $_POST["hmNewType"];
    
    if(isset($_POST["newHmName"]))
    {
      if($_SESSION["hmName"]!=$_POST["newHmName"])
      {
      
        $conn = mysqli_connect( 'localhost' , 'root', '', 'handyman_services');
        $sql = "UPDATE hmdata set hmName ='$newHmName'  WHERE hmID='$hmID';";
        $result = mysqli_query($conn, $sql);
           if($result)
           {
            header("refresh:0 ; url=http://localhost/wtproject/Handyman/hmHome.php ");
           }
        
    }
  }
    
    if(isset($_POST["newHmAddress"]))
    {
      if($_SESSION["hmAddress"]!=$_POST["newHmAddress"])
      {
        $conn = mysqli_connect( 'localhost' , 'root', '', 'handyman_services');
        $sql = "UPDATE hmdata set hmAddress ='$newHmAddress' WHERE hmID='$hmID' ";
        $result = mysqli_query($conn, $sql);
           if($result)
           {
             header("refresh:0 ; url=http://localhost/wtproject/Handyman/hmHome.php");
           }
    }
  }
    
    if(isset($_POST["newHmEmail"]))
    {  
       
        $conn = mysqli_connect( 'localhost' , 'root', '', 'handyman_services');
        $sql = "UPDATE hmdata set hmEmail ='$newHmEmail'  WHERE hmID='$hmID' ";
        $result = mysqli_query($conn, $sql);

           if($result)
           {
            echo "Redirecting" ; header("refresh:2 ; url=http://localhost/wtproject/signout.php");
           }
       
    }
    
    if(isset($_POST["newHmPhoneNo"]))
    {
      if($_SESSION["hmPhoneNo"]!=$_POST["newHmPhoneNo"])
      {
        $conn = mysqli_connect( 'localhost' , 'root', '', 'handyman_services');
        $sql = "UPDATE hmdata set hmPhoneNo ='$newHmPhoneNo'  WHERE hmID='$hmID' ";
        $result = mysqli_query($conn, $sql);
        if($_POST["newHmPhoneNo"]!=$_SESSION["hmPhoneNo"])
        {   
        if($result)
           {
             echo "Redirecting" ; header("refresh:2 ; url= http://localhost/wtproject/signout.php");
           }
        }
      }
         
    }

    if(isset($_POST["hmNewType"]))
    {
      if($_SESSION["hmType"]!=$_POST["hmNewType"])
      {
        $conn = mysqli_connect( 'localhost' , 'root', '', 'handyman_services');
        $sql = "UPDATE hmdata set hmType ='$hmNewType'  WHERE hmID='$hmID' ";
        $result = mysqli_query($conn, $sql); 
        if($result)
           {
             echo "Redirecting" ; header("refresh:0 ; url= http://localhost/wtproject/Handyman/hmHome.php");
           }
      }    
    }

  
    
    if(isset($_POST["hmNewPassword"])!="" && $_POST["hmOldPassword"]!="")
    { 
        if($_POST["hmOldPassword"] == $_SESSION["hmPassword"])
        { 
            if($_POST["hmNewPassword"] == $_POST["confirmHmNewPassword"] )
            {
        $conn = mysqli_connect( 'localhost' , 'root', '', 'handyman_services');
        $sql = "UPDATE hmdata set hmPassword ='$hmNewPassword'  WHERE hmID='$hmID' ";
        $result = mysqli_query($conn, $sql);  
        if($result)
           {
             echo "Redirecting" ; header("refresh:2 ; url= http://localhost/wtproject/signout.php");
           }
        } else {echo "Make Sure Both Passwords are same ! "; header("refresh:2 ; url=http://localhost/wtproject/Handyman/updateHmInfo.php");}
    }  else {echo "Old Password Is not Correct! "; header("refresh:2 ; url= http://localhost/wtproject/Handyman/updateHmInfo.php");}
    
    } 
}

if(isset($_POST["deleteAccount"]))
{  
    session_start();
    $userPasswordForDeletion = $_POST["hmPasswordForDeletion"];
    $userID = $_SESSION["hmID"];
    if($_POST["hmPasswordForDeletion"] == $_SESSION["hmPassword"])
    {
        $conn = mysqli_connect( 'localhost' , 'root', '', 'handyman_services');
        $sql = "DELETE from hmdata WHERE hmID='$userID' and hmPassword='$userPasswordForDeletion' ";
        $result = mysqli_query($conn, $sql);  
        if($result)
           {
             echo "Redirecting" ; header("refresh:2 ; url=  http://localhost/wtproject/signout.php");
           }
    }     else {echo "Make Sure Both Passwords are same ! "; header("refresh:2 ; url=http://localhost/wtproject/Handyman/updateHmInfo.php");}
}


?>