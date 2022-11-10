<!DOCTYPE html>
<html lang="en">
<head>
  
    <title>User Home</title>
    <link rel="stylesheet" href="http://localhost/wtproject/CSS/userHome.css">
</head>

<body>

<div id="box">
<h1>USER HOME</h1>

<?php
session_start();


if(isset($_SESSION["phoneOrEmail"]) )
{
   $phoneOrEmail = $_SESSION["phoneOrEmail"];
   
   
    $conn = mysqli_connect( 'localhost' ,'root','','handyman_services');
    $query = "SELECT * FROM user_data WHERE userEmail='$phoneOrEmail' or userPhoneNo='$phoneOrEmail' ";
    $query_run = mysqli_query($conn,$query);
    while ($row = mysqli_fetch_array($query_run))
    {
        $_SESSION["userName"]= $row["userName"];
        $_SESSION["userID"]= $row["userID"];
        $_SESSION["userEmail"]= $row["userEmail"];
        $_SESSION["userPhoneNo"]= $row["userPhoneNo"];
        $_SESSION["userAddress"]= $row["userAddress"];
        $_SESSION["userPassword"]= $row["userPassword"];
        $_SESSION["hmID"] ="";
    }
   
    echo "<br> <br>";   
}

?>


<div id="center">
  <a href="http://localhost/wtproject/User/userHome.php" >&nbsp&nbsp&nbsp&nbspHome</a>
  <a href="http://localhost/wtproject/User/updateUserInfo.php">&nbsp&nbsp&nbsp&nbspUpdate Information</a>
  <a href="http://localhost/wtproject/User/makeAPost.php" >&nbsp&nbsp&nbsp&nbspMake a Post</a>
  <a href="http://localhost/wtproject/User/managePosts.php" >&nbsp&nbsp&nbsp&nbspManage Posts</a>
  <a href="http://localhost/wtproject/User/checkOffers.php" >&nbsp&nbsp&nbsp&nbspSee Offers</a>
  
</div>

<?php echo "<h2 >".$_SESSION["Message"]."</h2> <br>";?>
<br>
<fieldset>
<legend> User Info :</legend>
<menu>
    <h3 >
     Name : <?php echo $_SESSION["userName"]."<br>" ; ?> 
    ID : <?php echo $_SESSION["userID"]."<br>" ; ?>
    Email : <?php echo $_SESSION["userEmail"]."<br>" ; ?>
    Phone No : <?php echo $_SESSION["userPhoneNo"]."<br>" ; ?>
    Address : <?php echo $_SESSION["userAddress"]."<br>" ; ?>
  </h3>
    
</fieldset>


<fieldset>
    <legend>My Posts </legend>
<section>
<?php

$userID = $_SESSION["userID"];
$conn = mysqli_connect( 'localhost' ,'root','','handyman_services');
$sql = "SELECT * FROM request_data Where userID ='$userID' ";
$query_run = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_array($query_run))
{    
    $reqID = $row["requestID"];

    $_SESSION["reqID"]= $reqID;

    echo  "<ul> <li> "."[REQUEST ID : ".$row["requestID"]."] - Problem Description  : ".$row["problemDescription"]."   #Posted On [".$row["postDate"]."- ".$row["postTime"].
    " ]<br> </li>  </ul>";
} 


?>
</section>
</fieldset>

<br><br><br><br> <br><br><br><br> <br><br><br><br>

<h3><a href="http://localhost/wtproject/signout.php"> Sign Out</a> </h3>

<div class="footer">
Copyright &copy All Rights Reserved
</div>

</div>

</body>
</html>