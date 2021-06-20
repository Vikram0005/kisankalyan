<?php
session_start();
include "../../db_conn.php";

if (isset($_POST['fname'])) {

	function validate($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$fname = validate($_POST['fname']);
	$lname = validate($_POST['lname']);
	$email = validate($_POST['email']);
	$number = validate($_POST['number']);
	$password = validate($_POST['password']);
	$date = validate($_POST['date']);
	$address1 = validate($_POST['address1']);
	$address2 = validate($_POST['address2']);
	$address3 = validate($_POST['address3']);
	$pin = validate($_POST['pin']);
	$position = validate($_POST['position']);
	$state = validate($_POST['state']);
	$district = validate($_POST['district']);
	$block = validate($_POST['block']);
	$gp = validate($_POST['gp']);
	$document = validate($_POST['document']);
	$dnumber = validate($_POST['dnumber']);
	$doc = validate($_POST['doc']);

	// hashing the password
	// $pass = md5($pass);

	$sql = "SELECT * FROM REGISTER WHERE EMAIL='$email' ";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		header("Location: ../AddDistrictCor.php?error=The Email Id is taken try another");
		exit();
	} else {
		$currdate = date('Y-m-d');
		$sql2 = "INSERT INTO REGISTER(FNAME, LNAME, EMAIL, NUMBER, PASSWORD, DOB, ADDRESS1, ADDRESS2, ADDRESS3, PIN, USERTYPE, STATE, DISTRICT, BLOCK, GP, IDENTITY, IDNUMBER, PHOTO,CREATEDON) 
				               VALUES('$fname','$lname','$email','$number','$password','$date','$address1','$address2','$address3','$pin','$position','$state','$district','$block','$gp','$documet','$dnumber','$doc','$currdate')";
		$result2 = mysqli_query($conn, $sql2);

		if ($result2) {
			header("Location: ../AddDistrictCor.php?success=District Coordinator created successfully");
			exit();
		} else {
			printf("Errormessage: %s\n", mysqli_error($conn));
			header("Location: ../AddDistrictCor.php?error=unknown error occurred"+mysqli_error($conn));
			exit();
		}
	}
} else {
	header("Location: ../AddDistrictCor.php");
	exit();
}
