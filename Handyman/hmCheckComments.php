<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>Comments</title>
    <link rel="stylesheet" href="http://localhost/wtproject/CSS/handyman.css">
</head>
<body>
<div id="box">
    <h1>COMMENTS</h1> <br> <br>
    <div class="flexcentre">
    <a href="http://localhost/wtproject/Handyman/hmHome.php" >&nbsp&nbsp&nbsp&nbspHome</a>
    <a href="http://localhost/wtproject/Handyman/updateHmInfo.php">&nbsp&nbsp&nbsp&nbspUpdate Information</a>
    <a href="http://localhost/wtproject/Handyman/hmJob.php" >&nbsp&nbsp&nbsp&nbspTake a Job</a>
    <a href="http://localhost/wtproject/Handyman/hmManageJobs.php" >&nbsp&nbsp&nbsp&nbspManage Jobs</a>
    <a href="http://localhost/wtproject/Handyman/hmCheckComments.php" >&nbsp&nbsp&nbsp&nbspCheck Comments</a>
 
    </div>
    <br> <br>

    <fieldset id="card">
        <legend>
            Comments
        </legend>

    <?php
    session_start();
     if($_SESSION["hmID"]!="")
     {      
            $hmID = $_SESSION["hmID"];
            $conn = mysqli_connect( 'localhost' ,'root','','handyman_services');
            $query = "SELECT * FROM comments WHERE hmID='$hmID' ";
            $query_run = mysqli_query($conn,$query);
            while ($row = mysqli_fetch_array($query_run))
            {
               echo "<li> Comment : ".$row["comment"]." , From [".$row["userID"]."] , #Comment Time  ".$row["commentDate"]." , ".$row["commentTime"]."<br><br></li>";

            }

     }

    ?>
     </fieldset>
</div>
</body>
</html>