<?php


#User
if(isset($_POST["submit"]))
{   

    if($_POST["userEmail"]!= "")
    {
        $phoneOrEmail = $_POST["userEmail"];
    }
  
    if( isset( $_POST["userName"]) && isset($_POST["userAddress"])   && isset($_POST["userGender"])  && isset( $_POST["userPhoneNo"])
    && isset( $_POST["userPassword"]) && isset( $_POST["confirmUserPassword"]) && isset( $_POST["userEmail"]))
    {
    if( $_POST["userName"]!="" &&  $_POST["userAddress"]!="" && $_POST["userGender"]!=""  && 
     $_POST["userPassword"]!="" && $_POST["confirmUserPassword"]!="" )
    {
    if($_POST["userEmail"] !="" ||  $_POST["userPhoneNo"]!="")
    {

    {

    if($_POST["userPassword"] == $_POST["confirmUserPassword"] )  
    {   
        $conn = mysqli_connect( 'localhost' , 'root', '', 'handyman_services');
        $sql = "SELECT * FROM user_data WHERE userEmail='$phoneOrEmail'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
   
        if($count==0)
        {
    
        $userName = $_POST["userName"];
        $userAddress = $_POST["userAddress"];
        $userGender = $_POST["userGender"];
        $userPhoneNo = $_POST["userPhoneNo"];
        $userPassword = $_POST["userPassword"];
        $userEmail =$_POST["userEmail"] ;
        $userStatus ="Valid";
        $conn = mysqli_connect( 'localhost' , 'root', '', 'handyman_services');

        $sql = "INSERT INTO user_data (userName, userPassword, userAddress, userGender, userPhoneNo, userEmail, userStatus) VALUES ('$userName','$userPassword'
        ,'$userAddress','$userGender','$userPhoneNo','$userEmail', '$userStatus')";

        if(mysqli_query($conn , $sql))
        {
          session_start();
          $_SESSION["phoneOrEmail"] = $_POST["userEmail"];
          $_SESSION["Message"] = "";
          

          echo "Registration Completed ";

          header("refresh:2 ; url= http://localhost/wtproject/User/userHome.php");

        }

     
        else { echo "Registration  Error"; header("refresh:2 ; url=http://localhost/wtproject/User/userSignup.php"); }
        


      
    }
    else { echo "Another User Exists with the same Email !"; header("refresh:2 ; url=http://localhost/wtproject/User/userSignup.php"); }
    }

        else {  echo "Make sure Both Passwords are same"; header("refresh:2 ; url=http://localhost/wtproject/User/userSignup.php"); }        
    }  
 

    
    }
} else { echo "Please Provide an Email Address or Phone No. "; header("refresh:3 ; url=http://localhost/wtproject/User/userSignup.php"); }
    }

    
    else {

        echo "Please Fill all the information";
        header("refresh:2 ; url=http://localhost/wtproject/User/userSignup.php");
        }
} 
  

#HANDYMAN REGISTRATION
 
if(isset($_POST["hmSubmit"]))
{   
    if($_POST["hmEmail"]!= "")
    {
        $phoneOrEmail = $_POST["hmEmail"];
    }
  
    if( isset( $_POST["hmName"]) && isset($_POST["hmAddress"])   && isset($_POST["hmGender"])  && isset( $_POST["hmPhoneNo"])
    && isset( $_POST["hmPassword"]) && isset( $_POST["confirmHmPassword"]) && isset( $_POST["hmEmail"]) && isset( $_POST["hmType"]))
    {
    if( $_POST["hmName"]!="" &&  $_POST["hmAddress"]!="" && $_POST["hmGender"]!=""  && 
     $_POST["hmPassword"]!="" && $_POST["confirmHmPassword"]!="" && $_POST["hmType"]!="")
    {
    if($_POST["hmEmail"] !="" ||  $_POST["hmPhoneNo"]!="")
    {

    {
   
    {
    if($_POST["hmPassword"] == $_POST["confirmHmPassword"] )  
    { 
        $conn = mysqli_connect( 'localhost' , 'root', '', 'handyman_services');
        $sql = "SELECT * FROM hmdata WHERE hmEmail='$phoneOrEmail'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
   
        if($count==0)
        {
    
        $hmName = $_POST["hmName"];
        $hmAddress = $_POST["hmAddress"];
        $hmGender = $_POST["hmGender"];
        $hmPhoneNo = $_POST["hmPhoneNo"];
        $hmPassword = $_POST["hmPassword"];
        $hmEmail =$_POST["hmEmail"] ;
        $hmType =$_POST["hmType"] ;
        $hmStatus ="Valid";
        $conn = mysqli_connect( 'localhost' , 'root', '', 'handyman_services');

        $sql = "INSERT INTO hmdata (hmName, hmPassword, hmAddress, hmGender, hmPhoneNo, hmEmail, hmStatus, hmType) VALUES ('$hmName','$hmPassword'
        ,'$hmAddress','$hmGender','$hmPhoneNo','$hmEmail', '$hmStatus' , '$hmType')";

        if(mysqli_query($conn , $sql))
        {
          session_start();
          $_SESSION["phoneOrEmail"] = $_POST["hmEmail"];
          $_SESSION["Message"] = "";
          

          echo "Registration Completed ";

          header("refresh:2 ; url= http://localhost/wtproject/Handyman/hmHome.php");

        }

     
        else { echo "Registration  Error"; header("refresh:2 ; url= http://localhost/wtproject/Handyman/hmHome.php"); }
        


      
       }
        else { echo "Another Handyman Exists with the same Email !"; header("refresh:2 ; url= http://localhost/wtproject/Handyman/hmHome.php"); }
       }

        else {  echo "Make sure Both Passwords are same"; header("refresh:2 ; url= http://localhost/wtproject/Handyman/hmHome.php"); }        
    }  

}


    }
    }    else { echo "Please Provide an Email Address or Phone No. "; header("refresh:3 ; url=http://localhost/wtproject/Handyman/hmHome.php"); }
    }
    else {

        echo "Please Fill All the Information";
        header("refresh:2 ; url=http://localhost/wtproject/Handyman/hmHome.php");
        }
} 
  
