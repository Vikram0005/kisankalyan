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

    if ($type != "FARMER")
        $sql2 = "DELETE FROM register WHERE ID=$id";
    else
        $sql2 = "DELETE FROM farmer WHERE ID=$id";

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
            header("Location: ../ViewOperatorCor.php");
            exit();
        }
        else if ($type =="FARMER") {
            header("Location: ../ViewFarmerCor.php");
            exit();
        }

    } else {
        echo "Problem in Approving Request";
        exit();
    }
}
