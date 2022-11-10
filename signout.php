<?php


if(session_status()>=0)
{   
    session_start();
    session_unset();
    if(session_destroy())
    {
        echo "You have Signed Out" ;
    }
    else { echo "Could not delete session" ;}
    
    
   
}
header("refresh:1 ; url=http://localhost/wtproject/main.php");



?>
