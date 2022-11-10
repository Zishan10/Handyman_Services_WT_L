<?php
session_start();
if(isset($_POST["updatePost"]))
{
    $reqID = $_SESSION["reqID"];
    if(isset($_POST["problemDescription"]))
    {   
        $newProblemDescription = $_POST["problemDescription"];
        $newPostDate = $_POST["postDate"];
        $newPostTime= $_POST["postTime"];

        $conn = mysqli_connect( 'localhost' , 'root', '', 'handyman_services');
        $sql = "UPDATE request_data set problemDescription ='$newProblemDescription' , postDate ='$newPostDate',postTime ='$newPostTime' WHERE requestID='$reqID';";
        $result = mysqli_query($conn, $sql);
           if($result)
           {   
            header("refresh:1 ; url=http://localhost/wtproject/User/userHome.php");
           }
           else  {  echo "Could not Update Problem Description. "; header("refresh:1 ; url=http://localhost/wtproject/User/managePosts.php"); }
    }

    if(isset($_POST["problemType"]))
    {   
        $reqID = $_SESSION["reqID"];
        $newProblemType = $_POST["problemType"];
        $newPostDate = $_POST["postDate"];
        $newPostTime= $_POST["postTime"];

        $conn = mysqli_connect( 'localhost' , 'root', '', 'handyman_services');
        $sql = "UPDATE request_data set problemType ='$newProblemType', postDate ='$newPostDate',postTime ='$newPostTime'  WHERE requestID='$reqID';";
        $result = mysqli_query($conn, $sql);
           if($result)
           {    
            header("refresh:1 ; url=http://localhost/wtproject/User/userHome.php");
           } 
           else  {  echo "Could not Update Problem Type. "; header("refresh:1 ; url=http://localhost/wtproject/User/managePosts.php"); }
        
    }

}



//DELETE POST 
if(isset($_POST["deletePost"]))
{   
    $reqID = $_SESSION["reqID"];
    $conn = mysqli_connect( 'localhost' , 'root', '', 'handyman_services');
    $sql = "SELECT * from request_data WHERE requestID='$reqID' ";
    $query_run = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($query_run);
    if($row["pickedUpBy"] =="")
    {   
        $conn = mysqli_connect( 'localhost' , 'root', '', 'handyman_services');
        $sql = "DELETE from request_data WHERE requestID='$reqID' and pickedUpBy='' ";
        $result = mysqli_query($conn, $sql);
        if($result)
            { 
                $conn = mysqli_connect( 'localhost' , 'root', '', 'handyman_services');   
                $tableName = "Temp_Bids_".$reqID;   
                $sql = "DROP table $tableName";
                $result = mysqli_query($conn, $sql);
                if($result)
                {
                echo "Post Deleted ";   
                header("refresh:2 ; url=http://localhost/wtproject/User/userHome.php");
                }
            } 
    } 
     else  {  echo "Could not Delete. The Job maybe already deleted or in progress "; header("refresh:2 ; url=http://localhost/wtproject/User/managePosts.php"); }

      
 
}



?>