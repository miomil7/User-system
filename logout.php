<?php include_once "nav.php";
session_start();
if(session_destroy())
{
    header("Location: LogIn.php");
}
?>