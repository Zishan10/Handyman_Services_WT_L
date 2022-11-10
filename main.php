
<!DOCTYPE html>
<html lang="en">
<head>
    
<title>HANDYMAN SERVICES</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body style="margin: 80px; background-color:honeydew">

<div style="text-align: center;">
<h1 >HANDYMAN SERVICES </h1> <br> <br>
<h4 >Find the Handyman near you! </h4> 
<form action="http://localhost/wtproject/loginProcess.php" method = "POST">

<div class="form-group" >
  <label for="Choose Type">Choose Your Type</label> <br>
  Regular User <input type="radio"  name="userCheck" value="Regular User"   aria-describedby="emailHelp">
  Handyman <input type="radio"  name="userCheck" value="Handyman"  aria-describedby="emailHelp">
  Admin <input type="radio"  name="userCheck" value="Admin"  aria-describedby="emailHelp">
</div>

<div class="form-group">
  <label for="exampleInputEmail1">Email address</label>
  <input type="email" class="form-control" name="phoneOrEmail" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" style="text-align:center">
  <small id="emailHelp" class="form-text text-muted">Provide Email or Phone No</small>
</div>

<div class="form-group">
  <label for="exampleInputPassword1">Password</label>
  <input type="password" class="form-control"  name= "password" id="exampleInputPassword1" placeholder="Password" style="text-align:center">
</div>

<button type="submit" name="submit" class="btn btn-primary">LOGIN</button>
<br> <br> <br> <br>
<div class="form-group">
 
</form>
  
  DON'T HAVE AN ACCOUNT ? <a href="http://localhost/wtproject/User/userSignup.php">SIGN UP</a> <br> <br>
  SIGN UP AS AN HANDYMAN <a href="http://localhost/wtproject/Handyman/hmSignup.php">REGISTER</a>
</div>

</div>



