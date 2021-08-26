<?php
session_start();
if (isset($_SESSION['EMAIL']))
session_destroy();
header("Cache-Control: no-cache, must-revalidate");
header("Location: ../login.php");
?>