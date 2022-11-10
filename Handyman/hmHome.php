<!DOCTYPE html>
<html lang="en">
<head>
  
    <title>Handyman Home</title>
    <link rel="stylesheet" href="http://localhost/wtproject/CSS/handyman.css">
</head>

<body >

<div id="box">
<h1 >Handyman Home</h1>

<?php
session_start();
if(isset($_SESSION["phoneOrEmail"]) )
{
   $phoneOrEmail = $_SESSION["phoneOrEmail"];
   
    $conn = mysqli_connect( 'localhost' ,'root','','handyman_services');
    $query = "SELECT * FROM hmdata WHERE hmEmail='$phoneOrEmail' or hmPhoneNo='$phoneOrEmail' ";
    $query_run = mysqli_query($conn,$query);
    while ($row = mysqli_fetch_array($query_run))
    {
        $_SESSION["hmName"]= $row["hmName"];
        $_SESSION["hmID"]= $row["hmID"];
        $_SESSION["hmEmail"]= $row["hmEmail"];
        $_SESSION["hmPhoneNo"]= $row["hmPhoneNo"];
        $_SESSION["hmAddress"]= $row["hmAddress"];
        $_SESSION["hmPassword"]= $row["hmPassword"];
        $_SESSION["hmType"]= $row["hmType"];
        $_SESSION["jobCompleted"]= $row["jobCompleted"];
        $_SESSION["hmRating"] = $row["hmRating"];
        $_SESSION["requestID"]="";
    }
   
    echo "<br> <br>";   
}

?>
    <div class="flexcentre">
    <a href="http://localhost/wtproject/Handyman/hmHome.php" >&nbsp&nbsp&nbsp&nbspHome</a>
    <a href="http://localhost/wtproject/Handyman/updateHmInfo.php">&nbsp&nbsp&nbsp&nbspUpdate Information</a>
    <a href="http://localhost/wtproject/Handyman/hmJob.php" >&nbsp&nbsp&nbsp&nbspTake a Job</a>
    <a href="http://localhost/wtproject/Handyman/hmManageJobs.php" >&nbsp&nbsp&nbsp&nbspManage Jobs</a>
    <a href="http://localhost/wtproject/Handyman/hmCheckComments.php" >&nbsp&nbsp&nbsp&nbspCheck Comments</a>
    </div>


<?php echo "<h2 >".$_SESSION["Message"]."</h2> <br>";?>
<br>
<div id="card">
<fieldset >
<legend> Handyman Info :</legend>
<menu>
    <h3 >
    <li>Name : <?php echo $_SESSION["hmName"] ; ?></li>
    <li>ID : <?php echo $_SESSION["hmID"] ; ?></li>
    <li>Email : <?php echo $_SESSION["hmEmail"] ; ?></li>
    <li>Phone No : <?php echo $_SESSION["hmPhoneNo"] ; ?></li>
    <li>Address : <?php echo $_SESSION["hmAddress"] ; ?></li>
    <li>Type : <?php echo $_SESSION["hmType"] ; ?></li> 
    <li>Job Completed : <?php echo $_SESSION["jobCompleted"] ; ?></li> 
    <li>Rating : <?php echo $_SESSION["hmRating"] ; ?></li> 
</h3>
    
</fieldset>

</div>


<br><br><br>
<fieldset id="card">
    <legend>Posted Problems </legend>
<section>
    <form action="http://localhost/wtproject/Handyman/hmJobProcess.php">
<?php

$problemType = substr($_SESSION["hmType"],0,4);
$conn = mysqli_connect( 'localhost' ,'root','','handyman_services');
$sql = "SELECT * FROM request_data Where problemType like '$problemType%' and pickedUpBy='' ";
$query_run = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_array($query_run))
{    
    echo  "<ul> <li > "."[REQUEST ID : ".$row["requestID"]."] - Problem Description  : ".$row["problemDescription"]."  #Posted On [".$row["postDate"]."- ".$row["postTime"]." ] 
    </li>  </ul>";     
}
?>
</section>
</fieldset>
</form>

<br><br><br><br>

<h3><a href="http://localhost/wtproject/signout.php"> Sign Out</a> </h3>

<div class="footer">
Copyright &copy All Rights Reserved
</div>

</div>
</body>
</html>