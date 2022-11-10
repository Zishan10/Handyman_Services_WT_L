<!DOCTYPE html>
<html lang="en">
<head>
  
    <title>Make A Post</title>
    <link rel="stylesheet" href="http://localhost/wtproject/CSS/userHome.css">
</head>

<body>

<div id="box">
<h1 >Make A Post</h1>
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
 $userID =$_SESSION["userID"];
 
   ?>


<br><br>
<form action="http://localhost/wtproject/User/requestProcess.php"  method = "post"> <br>
<h3>
    User ID : <input type = "text" name="userID" value="<?php echo $_SESSION["userID"] ?>" readonly><br><br> 
    Post By : <input type = "text" name="requestedBy" value="<?php echo $_SESSION["userName"] ?>" readonly><br><br> 
    Address : <input type = "text" value="<?php echo $_SESSION["userAddress"] ?>" readonly><br><br>
    Phone no :  <input type = "text" name="newUserPhoneNo" value="<?php echo $_SESSION["userPhoneNo"] ?>"readonly><br><br>
    Email :  <input type = "text" name="newUserEmail"  value="<?php echo $_SESSION["userEmail"] ?>"readonly><br><br>
    <br>
    <aside >   
  <textarea name="problemDescription"  rows="15" cols="100" id="userPost" placeholder="ENTER POST TEXT HERE..."></textarea>
    <p id="errorUserPost"></p>
    </aside>
    <aside  > Problem Type :   
    <select name="problemType">
     <option value="" selected></option>  
     <option value="Electric">Electric</option>
     <option value="Plumbing">Plumbing</option>
     <option value="Painting">Painting</option>
     <option value="Carpenting">Carpenting</option>
     <option value="Cleaning">Cleaning</option>
     <option value="Installation">Installation</option>
     
     </select>
     </aside>
    <br> <br>
    <?php date_default_timezone_set('Asia/Dhaka'); ?>
    Today's Date : <input type = "text" name="postDate"  value="<?php echo date('d/m/y') ?>"readonly><br><br>
    Current Time : <input type = "text" name="postTime"  value="<?php echo date('h:i:s') ?>"readonly><br><br>
   
   <input type="submit" name="postRequest" value="POST PROBLEM">

</h3>
</form>
<script src="http://localhost/wtproject/JS/userPostValidation.js"></script>
</div>
</body>
</html>