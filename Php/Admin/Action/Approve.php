<?php
include "../../db_conn.php";

function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $type = $_GET['type'];
    $active = $_GET['active'];

    if ($type != "FARMER")
        $sql2 = "UPDATE register SET ACTIVE=$active WHERE ID=$id";
    else
        $sql2 = "UPDATE farmer SET ACTIVE=$active WHERE ID=$id";

    $result = mysqli_query($conn, $sql2);
    if ($result) {
        $type=validate($type);
        if ($type =="DISTRICT") {
            header("Location: ../ViewDistrictCor.php");
            exit();
        } else if ($type =="BLOCK") {
            header("Location: ../ViewBlockCor.php");
            exit();
        } else if ($type =="OPERATOR") {
            echo $sql2;
            header("Location: ../ViewOperatorCor.php");
            exit();
        }
    } else {
        echo "Problem in Approving Request";
        exit();
    }
}
