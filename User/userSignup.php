
<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>Sign Up</title>
    <link rel="stylesheet" href="http://localhost/wtproject/CSS/userSignUp.css">
</head>
<body>
    <div id="box">
    <h1 >User Sign Up </h1>
    
    <form action="http://localhost/wtproject/registrationProcess.php"  method = "post"> <br>
   
    <h3 >
    Full Name : <input type = "text" name="userName" id="name">
    <p id="errorName"></p>
    <br><br>
    Address : <input type = "text" name="userAddress" ><br><br>

    Gender :  Male<input type = "radio" name="userGender" value="Male" > 

    Female :<input type = "radio" name="userGender" value="Female" ><br><br><br><br>

    Phone no : <input type = "text" name="userPhoneNo"  id="phoneNo"><br><br>
    <p id="errorPhoneNo"></p>

    Email :  <input type = "text" name="userEmail" id="email">
    <p id="errorEmail"></p>
    <br><br>

            <h4>
            <fieldset > 
                <legend>Password Rules</legend>
                <li>Password Must me atleast 8 Characters Long</li>
                <li>Password Must Have a Digit from 0-9</li>
                <li>Password Must Have both smaller and upper case letters</li>
                <li>Password Must Contain a special Character</li>
            </fieldset>
            </h4>
     <h3>       
    Password : <input type = "password" name="userPassword" id="password"> <br>
    <p id="errorpassword"></p> 
   
    <br><br>

    Confirm Password : <input type = "password" name="confirmUserPassword" ><br><br>


    <input type = "submit" name="submit" value="REGISTER">
    </h3>
    

    </form>
    <br><br><br><br>
    <h3><a href="http://localhost/wtproject/main.php"> Home</a> </h3>
    </div>
<script src="http://localhost/wtproject/JS/registrationValidate.js"></script>
</body>
</html>