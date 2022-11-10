<!DOCTYPE html>
<html lang="en">
<head>
    <title>Handyman Profile</title>
    <link rel="stylesheet" href="http://localhost/wtproject/CSS/hmProfile.css">
</head>
<body>
   
<h1 style="text-align: center;">PROFILE</h1>

<div id="basicInfo">
<div id="margin">

<?php
echo "<br>";
   $GLOBALS["count"] = 1;
   $GLOBALS["rating"] = 0;

if(session_status()>=0)
{
    session_start();
}


//CALCULATE RATING
function getRating($hmID)
{   
    
    $conn = mysqli_connect( 'localhost' ,'root','','handyman_services');
    $sql = "SELECT * from comments where hmID = '$hmID'";
    $query_run = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_array($query_run))
    {
        $GLOBALS["rating"]= ($row["rating"]+$GLOBALS["rating"]);
        $GLOBALS["count"]++;
    }

    $rating =round($GLOBALS["rating"]/ $GLOBALS["count"] , 3) ;
    $sql = "UPDATE hmdata set hmRating= '$rating' where hmID=$hmID";
    $query_run = mysqli_query($conn,$sql);
    return $rating ;

}

$hmID = $_GET["id"];
$_SESSION["hmID"] = $hmID;

if($hmID != null)
{
$conn = mysqli_connect( 'localhost' ,'root','','handyman_services');
$sql = "SELECT * FROM hmdata Where hmID ='$hmID' ";
$query_run = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_array($query_run))
{    
    
    echo "ID : ".$row["hmID"]."<br>";
    echo "Name : ".$row["hmName"]."<br>";
    echo "Rating : ".getRating($row["hmID"])."<br>";
    echo "Phone No : ".$row["hmPhoneNo"]."<br>";
    echo "Email : ".$row["hmEmail"]."<br>";
    echo "Type : ".$row["hmType"]."<br>";
    echo "Job Completed : ".$row["jobCompleted"]."<br>";
    echo "Total Reviews : ".$GLOBALS["count"]."<br>";
}
}   

?>
<br> <br>

<form action="http://localhost/wtproject/Handyman/handymanOperation.php" method ="post" >

  <div id="comment">ADD A COMMENT  : <br><br>
  <textarea name="comment" cols="60" rows="10" id="commentBox" class="form-control"></textarea></div>  
  
  <br> <br>
  <div id="rating">
      <br>
  Give Ratings  : 
  1<input type="radio" name="rating" value ="1" id="radioButton" class="form-control">
  2<input type="radio" name="rating" value ="2" id="radioButton" class="form-control">
  3<input type="radio" name="rating" value ="3" id="radioButton" class="form-control">
  4<input type="radio" name="rating" value ="4" id="radioButton" class="form-control">
  5<input type="radio" name="rating" value ="5" id="radioButton" class="form-control">
  <br><br>
  </div>
  
  <br>
<input type="submit" name="postReview" value="POST" id="PostButton">
</form>

<br><br>
</div>
</div>
</body>
</html>

