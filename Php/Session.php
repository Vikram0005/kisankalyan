<?php 
if(!isset($_SESSION['EMAIL']))
{
    header("Location: ../../login.php");
}
?>