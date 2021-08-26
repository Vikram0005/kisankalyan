<?php
include "../../db_conn.php";
Here:
$hour = rand(10, 99);
$min = date('i');
$sec = date('s');
$hms = $hour . "" . $min . "" . $sec;

$sql1 = "SELECT * FROM pin WHERE VALUE='$hms'";
$result = mysqli_query($conn, $sql1);
if (mysqli_num_rows($result) === 0) {

    $sql2 = "INSERT INTO pin(VALUE) VALUES($hms)";
    $result = mysqli_query($conn, $sql2);
    if ($result) {
        header("Location: ../ViewPin.php");
        exit();
    } else {
        echo "Problem in Pin Genrate";
        exit();
    }
}
else
goto Here;
?>
