<!DOCTYPE html>
<html lang="en">
<head>
  
    <title>Update Handyman Info</title>
    <link rel="stylesheet" href="http://localhost/wtproject/CSS/handyman.css">
</head>

<body>
   <div id="box">
<h1>Update Information</h1>
 <br> <br>

 <div class="flexcentre">
    <a href="http://localhost/wtproject/Handyman/hmHome.php" >&nbsp&nbsp&nbsp&nbspHome</a>
    <a href="http://localhost/wtproject/Handyman/updateHmInfo.php">&nbsp&nbsp&nbsp&nbspUpdate Information</a>
    <a href="http://localhost/wtproject/Handyman/hmJob.php" >&nbsp&nbsp&nbsp&nbspTake a Job</a>
    <a href="http://localhost/wtproject/Handyman/hmManageJobs.php" >&nbsp&nbsp&nbsp&nbspManage Jobs</a>
    <a href="http://localhost/wtproject/Handyman/hmCheckComments.php" >&nbsp&nbsp&nbsp&nbspCheck Comments</a>
 
    </div>

<?php
session_start();
   ?>


<br><br>
<form action="http://localhost/wtproject/Handyman/updateHmInfoProcess.php"  method = "post"> <br>
<h3 class="input_h2" >
    Full Name : <input type = "text" name="newHmName" value="<?php echo $_SESSION["hmName"] ?>" id="name">
    <p id="errorName"></p>
    <br><br> 

    Address : <input type = "text" name="newHmAddress" value="<?php echo $_SESSION["hmAddress"] ?>"><br><br>
    

    Phone no :  <input type = "text" name="newHmPhoneNo" value="<?php echo $_SESSION["hmPhoneNo"] ?>" id="phoneNo">
    <p id="errorPhoneNo"></p>
    <br><br>


    Email :  <input type = "text" name="newHmEmail"  value="<?php echo $_SESSION["hmEmail"] ?>" id="email">
    <p id="errorEmail"></p>
    <br><br> <br>
   
    <h3 style="margin-right:133px;" class="input_h2">Type :    
    <select name="hmNewType">
     <option value="<?php echo $_SESSION["hmType"] ?>" selected><?php echo $_SESSION["hmType"] ?></option>  
     <option value="Electrician">Electrician</option>
     <option value="Plumber">Plumber</option>
     <option value="Painter">Painter</option>
     <option value="Carpenter">Carpenter</option>
     <option value="Cleaner">Cleaner</option>
     </select>
     </h3>

   
    <h5>
       <fieldset id="card_Sub"> 
          <legend>Password Rules</legend>
          <li>Password Must me atleast 8 Characters Long</li>
          <li>Password Must Have a Digit from 0-9</li>
          <li>Password Must Have both smaller and upper case letters</li>
          <li>Password Must Contain a special Character</li>
       </fieldset>
    </h5>
    <h3 style="margin-left: 503px;">
    Old Password :  <input type = "password" name=hmOldPassword value="" >  
    
    <br><br>

    New Password :  <input type = "password" name=hmNewPassword id="password"> 
    <p id="errorpassword"></p>
    <br><br>

    Confirm New Password :  <input type = "password" name=confirmHmNewPassword > <br><br>
    
   <input  type="submit" name="hmUpdate" value="UPDATE INFORMATION"  >

    </h3>
   

</h2>

<h2 style="margin-left: 503px;">
   DELETE ACCOUNT <br>
   Type Password : <input type="password" name="hmPasswordForDeletion">
   <input type="submit" name="deleteAccount" value="DELETE ACCOUNT">
   <br>
   <br>
  </h2>
</form>
</div>
<script src="http://localhost/wtproject/JS/registrationValidate.js"></script>
   
</body>
</html>