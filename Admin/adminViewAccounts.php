<!DOCTYPE html>
<html lang="en">
<head>
   <title>View All Accounts</title>
   <link rel="stylesheet" href="http://localhost/wtproject/CSS/admin.css">
</head>
<body>
 <div id="box">
<h1 >View All Accounts</h1>


<div id="center">
  <a href="http://localhost/wtproject/Admin/adminHome.php" >&nbsp&nbsp&nbsp&nbspHome</a>
  <a href="http://localhost/wtproject/Admin/adminManageAccounts.php">&nbsp&nbsp&nbsp&nbspManage Accounts</a>
  <a href="http://localhost/wtproject/Admin/adminViewAccounts.php" >&nbsp&nbsp&nbsp&nbspView All Accounts</a>
  
</div>

<br> <br>
<p id="table">REGULAR USER ACCOUNTS</p>

<table>
    <th>
    <tr>
    <th >ID</th>
    <th>Name</th>
    <th >Gender</th>
    <th> Address</th>
    <th >Phone No</th>
    <th >Email</th>
    <th >Status</th>
  </tr>
    </th>
<?php
$conn = mysqli_connect( 'localhost' ,'root','','handyman_services');
$sql = "SELECT * FROM user_data ";
$query_run = mysqli_query($conn,$sql);

while ($row = mysqli_fetch_array($query_run))
{    
    echo  "
    <td  >".$row["userID"]."</td>
      <td>".$row["userName"]."</td>
      <td >".$row["userGender"]."</td>
      <td >".$row["userAddress"]."</td>
      <td >".$row["userPhoneNo"]."</td>
      <td >".$row["userEmail"]."</td>
      <td >".$row["userStatus"]."</td>
    </tr>
  ";     
}
?>
</table>

<br> <br>
<p id="table">HANDYMAN ACCOUNTS</p>
<table>
    <th>
    <tr>
    <th  >ID</th>
    <th >Name</th>
    <th >Gender</th>
    <th> Address</th>
    <th >Phone No</th>
    <th >Email</th>
    <th>Type</th>
    <th >Status</th>
    <th >PROFILE LINK</th>
  </tr>
    </th>
<?php
session_start();
$conn = mysqli_connect( 'localhost' ,'root','','handyman_services');
$sql = "SELECT * FROM hmdata ";
$query_run = mysqli_query($conn,$sql);

while ($row = mysqli_fetch_array($query_run))
{    
  $_SESSION["hmID"] = $row["hmID"];
  $id = $_SESSION["hmID"];
    echo  "
      <td > ID ".$_SESSION["hmID"] ."</td> 
      <td >".$row["hmName"]."</td>
      <td >".$row["hmGender"]."</td>
      <td >".$row["hmAddress"]."</td>
      <td >".$row["hmPhoneNo"]."</td>
      <td >".$row["hmEmail"]."</td>
      <td >".$row["hmType"]."</td>
      <td >".$row["hmStatus"]."</td>
      <td> <a href='http://localhost/wtproject/Handyman/hmProfile.php?id=$id'> Check Profile </a> </td>
    </tr>";     
}
?>
</table>
</div>
</body>
</html>
