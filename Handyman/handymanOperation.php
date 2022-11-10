<?php
session_start();
if(isset($_POST["postReview"]))
{
    if(isset($_POST["comment"]))
    {
        if(isset($_POST["rating"]))
        {   
            date_default_timezone_set('Asia/Dhaka'); 
            $comment = $_POST["comment"];
            $rating = $_POST["rating"];
            $userID = $_SESSION["userID"];
            $commentDate = date('d/m/y');
            $commentTime = date('h:i:s');
            $hmID = $_SESSION["hmID"];

            $conn = mysqli_connect( 'localhost' ,'root','','handyman_services');
            $sql = "INSERT INTO comments (hmID, userID, comment, rating, commentDate, commentTime) VALUES ('$hmID','$userID'
            ,'$comment','$rating','$commentDate','$commentTime')";

                if(mysqli_query($conn , $sql))
                {
                    echo "Review Posted Successfully";
                    header("refresh:2 ; url=http://localhost/wtproject/User/userHome.php");
                }


        }else {
            echo "Please Give A Rating !";
            header("refresh:2 ; url=http://localhost/wtproject/Handyman/hmProfile.php");

        }
        
    }
    else {
        echo "Please Post a Comment !";
        header("refresh:2 ; url=http://localhost/wtproject/Handyman/hmProfile.php");

    }


}




?>
