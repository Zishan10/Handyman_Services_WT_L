<?php
session_start();
if(isset($_POST["requestID"]))
{
    if(isset($_POST["hmID"]))
    {   

        $reqID = $_POST["requestID"];
        $hmID = $_POST["hmID"];
        $conn = mysqli_connect( 'localhost' , 'root', '', 'handyman_services');
        $sql = "SELECT * FROM request_data where requestID = '$reqID' and pickedUpBy='' ";
        $query_run = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($query_run);
        if($row != null)
        {
            $reqID = $_POST["requestID"];
            $hmID = $_POST["hmID"];
            $conn = mysqli_connect( 'localhost' , 'root', '', 'handyman_services');
            $sql = "SELECT * from hmdata where hmID='$hmID' ";
            $result = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($result);
            if($count!=0)
            {
                $conn = mysqli_connect( 'localhost' , 'root', '', 'handyman_services');
                $sql = "UPDATE request_data set pickedUpBy ='$hmID' where requestID = '$reqID' ";
                $result = mysqli_query($conn, $sql);
                   if($result)
                   {
                        $conn = mysqli_connect( 'localhost' , 'root', '', 'handyman_services');   
                        $tableName = "Temp_Bids_".$reqID;  
                        $sql = "DROP Table $tableName ";
                        $result = mysqli_query($conn, $sql);
                                if($result)
                            {
                                echo "JOB GIVEN.";
                                header("refresh:2 ; url=http://localhost/wtproject/User/userHome.php");
                            }

                    }  

            }else {echo "Handyman Doesn't Exist.";
                header("refresh:2 ; url=http://localhost/wtproject/User/checkOffers.php");}

        }
        else { echo "Request Doesn't Exist or Has been Taken Already.";
            header("refresh:2 ; url=http://localhost/wtproject/User/checkOffers.php"); }
         
    }
    else
        {
        echo "Please Provide  a Handyman ID.";
        header("refresh:2 ; url=http://localhost/wtproject/User/checkOffers.php");
        }
}
else
{
echo "Please Provide Request ID.";
header("refresh:2 ; url=http://localhost/wtproject/User/checkOffers.php");
}


?>