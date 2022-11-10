<!DOCTYPE html>
<html lang="en">
<head>
  
    <title>Update Info</title>
    <link rel="stylesheet" href="http://localhost/wtproject/CSS/userHome.css">
</head>

<body>
  <div id="box">
<h1>Update Information</h1>
<br> <br>


<div id="center">
  <a href="http://localhost/wtproject/User/userHome.php" >&nbsp&nbsp&nbsp&nbspHome</a>
  <a href="http://localhost/wtproject/User/updateUserInfo.php">&nbsp&nbsp&nbsp&nbspUpdate Information</a>
  <a href="http://localhost/wtproject/User/makeAPost.php" >&nbsp&nbsp&nbsp&nbspMake a Post</a>
  <a href="http://localhost/wtproject/User/managePosts.php" >&nbsp&nbsp&nbsp&nbspManage Posts</a>
  <a href="http://localhost/wtproject/User/checkOffers.php" >&nbsp&nbsp&nbsp&nbspSee Offers</a>
  
</div> 


<?php
session_start();
   ?>


<br><br>
<form action="updateUserInfoProcess.php"  method = "post"> <br>
<h3 >
    Full Name : <input type = "text" name="newUserName" value="<?php echo $_SESSION["userName"] ?>" id="name">
    <p id="errorName"></p>
    <br><br> 
    Address : <input type = "text" name="newUserAddress" value="<?php echo $_SESSION["userAddress"] ?>"><br><br>
    
    Phone no :  <input type = "text" name="newUserPhoneNo" value="<?php echo $_SESSION["userPhoneNo"] ?>" id="phoneNo">
    <p id="errorPhoneNo"></p>
    <br><br> 

    Email :  <input type = "text" name="newUserEmail"  value="<?php echo $_SESSION["userEmail"] ?>" id="email">
    <p id="errorEmail"></p>
    <br><br> 
   
    Old Password :  <input type = "password" name=userOldPassword > 
    
    <br><br> 

    New Password :  <input type = "password" name=userNewPassword id="password">
    <p id="errorpassword"></p>
    <br><br> 

    Confirm New Password :  <input type = "password" name=confirmUserNewPassword > <br><br>
    
   <input type="submit" name="userUpdate" value="UPDATE INFO">

   <br> <br> <br> 

   <h2>
   DELETE ACCOUNT <br>
   Type Password : <input type="password" name="userPasswordForDeletion">
   <input type="submit" name="deleteAccount" value="DELETE ACCOUNT" id="deleteButton">
   <br>
   <br>
  </h3>

</h2>
</form>



</div>

<script src="http://localhost/wtproject/JS/registrationValidate.js"></script> 
</body>
</html>