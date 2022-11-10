<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>Manage Posts</title>
    <link rel="stylesheet" href="http://localhost/wtproject/CSS/userHome.css">
</head>
<body>
   <div id="box"> 
    <h1>Manage Posts</h1>
    <br> <br>
        <div id="center">
        <a href="http://localhost/wtproject/User/userHome.php" >&nbsp&nbsp&nbsp&nbspHome</a>
        <a href="http://localhost/wtproject/User/updateUserInfo.php">&nbsp&nbsp&nbsp&nbspUpdate Information</a>
        <a href="http://localhost/wtproject/User/makeAPost.php" >&nbsp&nbsp&nbsp&nbspMake a Post</a>
        <a href="http://localhost/wtproject/User/managePosts.php" >&nbsp&nbsp&nbsp&nbspManage Posts</a>
        <a href="http://localhost/wtproject/User/checkOffers.php" >&nbsp&nbsp&nbsp&nbspSee Offers</a>
      
        </div>


<br> <br>
<?php

//LOAD FORM
echo "<form action='http://localhost/wtproject/User/managePosts.php' method='post'> ";
session_start();
$userID = $_SESSION["userID"];
$conn = mysqli_connect( 'localhost' ,'root','','handyman_services');
$sql1 = "SELECT * FROM request_data Where userID ='$userID' ";
$query_run = mysqli_query($conn,$sql1);
echo" Please Choose Your Request ID :";  

echo" <select name='requestID'> ";
echo "<option value='' selected></option> ";

while ($row = mysqli_fetch_array($query_run))
{   
    $_SESSION["reqID"]= $row["requestID"];
    $reqID = $row["requestID"];
    echo "<option value=".$reqID.">".$reqID."</option>  "; 
}
echo "</option> </select>";
echo "<input type='submit' name='Load' value='Load'>";
echo "</form>";

//Process Form Values
echo "<form action='http://localhost/wtproject/User/managePostProcess.php' method='post' > ";
if(isset($_POST["Load"]))
{      
      if($_POST["requestID"]!="")
      {
        $reqID =  $_POST["requestID"] ;
        $sql2 = "SELECT * FROM request_data Where requestID ='$reqID' ";
        $query_run = mysqli_query($conn,$sql2);
        $row2 = mysqli_fetch_array($query_run);
        if($row2!=null)
        {   
            $_SESSION["hmID"] = $row2["pickedUpBy"];
            $id = $_SESSION["hmID"] ;
            $pickedUpBy = $row2["pickedUpBy"];
            $problemCompleted = $row2["problemCompleted"];
            $problemDescription = $row2["problemDescription"];
            $problemType = $row2["problemType"];
            echo "<h3>Problem Description : </h3>"; 
            echo "<textarea name='problemDescription'  rows='20' cols='150'>".$problemDescription. "</textarea>";
            echo "<br>";
            echo "<br>";

            echo" Problem Type :";  

            echo" <select name='problemType'> ";
            echo "<option value=".$problemType." selected>".$problemType."</option> ";
            echo "<option value=Electricity>Electricity</option> ";
            echo "<option value=Carpenting>Carpenting</option> ";
            echo "<option value=Installation>Installation</option> ";
            echo "<option value=Cleaning>Cleaning</option> ";
            echo "<option value=Painting>Painting</option> ";
            echo "</select>";
            echo "<br><br>"; 
            echo "Problem Completed : ".$problemCompleted." % <br><br>";
            echo "Problem Picked Up By : ID [".$pickedUpBy."] <br><br>";

            date_default_timezone_set('Asia/Dhaka');
            echo "Today's Date : <input type = 'text' name='postDate'  value=".date('d/m/y')." readonly><br><br>";
            
            echo "Current Time : <input type = 'text' name='postTime'  value=".date('h:i:s')." readonly><br><br>";
            echo "VISIT HANDYMAN PROFILE --- <a href='http://localhost/wtproject/Handyman/hmProfile.php?id=$id'> Check Profile </a>";
 
            echo "<br><br>";   
            echo "<input type='submit' name='updatePost' value='Update' enabled >"; 
            echo "<br><br>"; 
            echo "<input type='submit' name='deletePost' value='DELETE POST' enabled>"; 
            
        }
      }
      else {echo "Post Not Found" ;}
}


echo "</form>";

?>

</form>

</div>
    
</body>

</html>