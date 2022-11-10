<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>Check Offers</title>
    <link rel="stylesheet" href="http://localhost/wtproject/CSS/userHome.css">
</head>
<body>
<div id="box">   
<h1 >Check Offers</h1>
<br> <br>
<div id="center">
  <a href="http://localhost/wtproject/User/userHome.php" >&nbsp&nbsp&nbsp&nbspHome</a>
  <a href="http://localhost/wtproject/User/updateUserInfo.php">&nbsp&nbsp&nbsp&nbspUpdate Information</a>
  <a href="http://localhost/wtproject/User/makeAPost.php" >&nbsp&nbsp&nbsp&nbspMake a Post</a>
  <a href="http://localhost/wtproject/User/managePosts.php" >&nbsp&nbsp&nbsp&nbspManage Posts</a>
  <a href="http://localhost/wtproject/User/checkOffers.php" >&nbsp&nbsp&nbsp&nbspSee Offers</a>
 
</div> 

<div id="margin">
<?php
echo "<br>";
session_start();
$userID = $_SESSION["userID"];
$conn = mysqli_connect( 'localhost' ,'root','','handyman_services');
$sql = "SELECT * FROM request_data Where userID ='$userID' and pickedUpBy='' ";
$query_run = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_array($query_run))
{    
    $tableName = "Temp_Bids_".$row["requestID"];
    $requestID = $row["requestID"];
    echo "OFFERS FOR REQ ID :". $requestID."<br><br>";
    $sql1 = "SELECT * FROM $tableName ORDER BY bidAmount ASC";
    $query_run1 = mysqli_query($conn,$sql1);

    while($row1 = mysqli_fetch_array($query_run1))
    {   
        $_SESSION["hmID"]= $row1["hmID"];
        $id =  $_SESSION["hmID"];
        echo "BID AMOUNT : ". $row1["bidAmount"]." Handyman ID : [". $row1["hmID"]."]   -- Message : ". $row1["additionalMessage"]."<br>"; 
        echo "<a href='http://localhost/wtproject/Handyman/hmProfile.php?id=$id'> Check Profile </a>";
        echo "<br>";
    }

    echo "<br>";
    
}
?>
</div>

<div id="margin">
<form action="http://localhost/wtproject/User/offerProcess.php" method="post">
<br><br>
Enter Request ID : 
<input type="text" name="requestID" id="requestID">
<p id="errorRequestID" ></p>

Enter Handyman ID : 
<input type="text" name="hmID" id="hmID">
<p id="errorhmID" ></p> 
<input type="submit" name="giveJob" value="Give Job" >

</form>
</div>

<div class="footer">
Copyright &copy All Rights Reserved
</div>

<script src="http://localhost/wtproject/JS/userFeatureValidation.js"></script>
</div>    
</body>
</html>