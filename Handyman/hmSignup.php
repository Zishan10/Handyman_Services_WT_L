<?php

if (session_status()>=0)
{
    session_start();

    if(isset($_SESSION["phoneOrEmail"]))
    {
        header("refresh:1 ; url = http://localhost/wtproject/Handyman/hmHome.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>Sign Up</title>
    <link rel="stylesheet" href="http://localhost/wtproject/CSS/userSignUp.css">
</head>
<body >
    <div id="box">
    <h1 >Handyman Registration </h1>
    
    <h3>
    
    <form action="http://localhost/wtproject/registrationProcess.php"  method = "post"> <br>
        Full Name : <input type = "text" name="hmName" id="name" >
        <p id="errorName"></p>
        <br><br>

        Address :  <input type = "text" name="hmAddress" ><br><br>
        
        Gender :  Male<input type = "radio" name="hmGender" value="Male" > 

        Female<input type = "radio" name="hmGender" value="Female" ><br><br><br><br>

        Phone no : <input type = "text" name="hmPhoneNo" id="phoneNo">
        <p id="errorPhoneNo"></p>
        <br><br>

        Email :  <input type = "text" name="hmEmail"  id="email">
        <p id="errorEmail"></p>
        <br><br>

            <h5>
            <fieldset> 
                <legend>Password Rules</legend>
                <li>Password Must me atleast 8 Characters Long</li>
                <li>Password Must Have a Digit from 0-9</li>
                <li>Password Must Have both smaller and upper case letters</li>
                <li>Password Must Contain a special Character</li>
            </fieldset>
            </h5>
        Password : <input type = "password" name="hmPassword" id="password">
        <p id="errorpassword"></p>
        <br><br>


        Confirm Password : <input type = "password" name="confirmHmPassword" ><br><br>
  
    Please Choose a Type :    
    <select name="hmType">
     <option value="" selected></option>  
     <option value="Electrician">Electrician</option>
     <option value="Plumber">Plumber</option>
     <option value="Painter">Painter</option>
     <option value="Carpenter">Carpenter</option>
     <option value="Cleaner">Cleaner</option>
     </select>
 
     <br><br>
  
    
    
    <input  type = "submit" name="hmSubmit" value="Submit Info" >


    </form>

    </h3> 
    <br><br><br><br>
    <h3><a href="http://localhost/wtproject/main.php"> Home</a> </h3>

    <script src="http://localhost/wtproject/JS/registrationValidate.js"></script>
    </div>
</body>
</html>