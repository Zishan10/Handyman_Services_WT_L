<?php

   if(isset($_POST["submit"]))
    {
        if(isset($_POST["userCheck"]))

        {
          if($_POST["userCheck"]== "Regular User")
          {
            $phoneOrEmail = $_POST["phoneOrEmail"];
            $password = $_POST["password"];
            $conn = mysqli_connect( 'localhost' , 'root', '', 'handyman_services');
            $sql = "SELECT * FROM user_data WHERE (userEmail='$phoneOrEmail' or userPhoneNo='$phoneOrEmail') AND userPassword='$password' ";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);

            if($row!=null)
            {
            
              $status = $row["userStatus"];
              if($status== "Banned")
              {
                $count=0;
                echo "You Have Been Banned Until Further Notice.";
                header("refresh:4 ; url=http://localhost/wtproject/main.php");
              }
              if($status== "Warned" && $count==1)
              {
                session_start();
                $_SESSION["Message"] = "You Have Been Warned For Unusual Activity";
                $_SESSION["phoneOrEmail"]=$phoneOrEmail;  
                echo "LOGIN SUCCESSFUL";
                header("refresh:2 ; url=http://localhost/wtproject/User/userHome.php");
                exit();
              }
         
              if($status== "Valid" && $count==1 )
              {
                session_start();
                $_SESSION["Message"] = "";
                  $_SESSION["phoneOrEmail"]=$phoneOrEmail; 
                  echo "LOGIN SUCCESSFUL";
                  header("refresh:2 ; url=http://localhost/wtproject/User/userHome.php");
                  exit();
              } 
            }
            else   
            {
               echo "LOGIN UNSUCCESSFUL";
               header("refresh:1 ; url=http://localhost/wtproject/main.php");
            }

          }

          //HANDYMAN LOGIN
          
          if($_POST["userCheck"]== "Handyman" )
          {

            $phoneOrEmail = $_POST["phoneOrEmail"];
            $password = $_POST["password"];
       
            $conn = mysqli_connect( 'localhost' , 'root', '', 'handyman_services');
            $sql = "SELECT * FROM hmdata WHERE (hmEmail='$phoneOrEmail' or hmPhoneNo='$phoneOrEmail') AND hmPassword='$password' ";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);
            if($row!=null)
            {

            $status = $row["hmStatus"];  
            if($status== "Banned")
            {
              $count=0;
              echo "You Have Been Banned Until Further Notice.";
              header("refresh:2 ; url=http://localhost/wtproject/main.php");
            }
            if($status== "Warned" && $count==1)
            {
              session_start();
              $_SESSION["Message"] = "You Have Been Warned For Unusual Activity";
              $_SESSION["phoneOrEmail"]=$phoneOrEmail;  
              echo "LOGIN SUCCESSFUL";
              header("refresh:2 ; url=http://localhost/wtproject/Handyman/hmHome.php");
              exit();
            }
       
            if($status== "Valid" && $count==1 )
            {
                session_start();
                $_SESSION["Message"] = "";
                $_SESSION["phoneOrEmail"]=$phoneOrEmail; 
                echo "LOGIN SUCCESSFUL";
                header("refresh:2 ; url=http://localhost/wtproject/Handyman/hmHome.php");
                exit();
            } 
            
          }else   
            {
               echo "LOGIN UNSUCCESSFUL";
               header("refresh:1 ; url=http://localhost/wtproject/main.php");
            }

          }
        //ADMIN LOGIN
          if ($_POST["userCheck"] == "Admin")
        {
            if($_POST["phoneOrEmail"] == "admin@admin.com" &&  $_POST["password"] == "1" )
            {
                echo "LOGIN SUCCESSFUL";
                header("refresh:2 ; url=http://localhost/wtproject/Admin/adminHome.php");
            }
            else   
            {
               echo "LOGIN UNSUCCESSFUL";
               header("refresh:1 ; url=http://localhost/wtproject/main.php");
            }
        }
      
        } 
        else { echo "Must Choose A Type!"; header("refresh:1 ; url= http://localhost/wtproject/main.php");}
    

    }

?>
    

