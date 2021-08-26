<?php
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
	$pin = validate($_POST['pin']);

	// hashing the password
	// $pass = md5($pass);

	$sql = "SELECT * FROM register WHERE EMAIL='$email' ";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		header("Location: ../AddOperatorCor.php?error=The Email Id is taken try another");
		exit();
	} else {

		if ($pin == null && $pin == "") {
			$active = 0;
		} else {
			$sql = "SELECT * FROM pin WHERE ID='$pin'";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) === 1) {
				$sql = "delete FROM pin WHERE ID='$pin'";
				$result = mysqli_query($conn, $sql);
				if ($result) {
					$active = 1;
				} else {
					header("Location: ../AddOperatorCor.php?error=Invalid Pin.");
					exit();
				}
			} else {
				header("Location: ../AddOperatorCor.php?error=Invalid Pin.");
				exit();
			}
		}

		$target_dir = "../../../uploads/";
		$filename   = uniqid() . "-" . time(); // 5dab1961e93a7-1571494241
		$extension = end(explode(".", $_FILES["doc"]["name"]));
		$basename   = $filename . "." . $extension; // 5dab1961e93a7_1571494241.jpg

		$target_file = $target_dir . basename($_FILES["doc"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

		// Check if image file is a actual image or fake image
		if (isset($_POST["submit"])) {
			$check = getimagesize($_FILES["doc"]["tmp_name"]);
			if ($check !== false) {
				$uploadOk = 1;
			} else {
				$uploadOk = 0;
				header("Location: ../AddOperatorCor.php?error=File is not an image.");
				exit();
			}
		}

		// Check file size
		if ($_FILES["doc"]["size"] > 500000) {
			$uploadOk = 0;
			header("Location: ../AddOperatorCor.php?error=Sorry, your file is too large.");
			exit();
		}

		// Allow certain file formats
		if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
			$uploadOk = 0;
			header("Location: ../AddOperatorCor.php?error=Sorry, only JPG, JPEG, PNG files are allowed..");
			exit();
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			header("Location: ../AddOperatorCor.php?error=Sorry, your file was not uploaded.");
			exit();
			// if everything is ok, try to upload file
		} else {
			$source = $_FILES["doc"]["tmp_name"];
			$destination  = "../../../uploads/{$basename}";
			if (move_uploaded_file($source, $destination)) {
				echo "The file " . $basename . " has been uploaded.";
			} else {
				header("Location: ../AddOperatorCor.php?error=Sorry, there was an error uploading your file.");
				exit();
			}
		}

		$currdate = date('Y-m-d');
		$sql2 = "INSERT INTO register(FNAME, LNAME, EMAIL, NUMBER, PASSWORD, DOB, ADDRESS1, ADDRESS2, ADDRESS3, PIN, USERTYPE, STATE, DISTRICT, BLOCK, GP, IDENTITY, IDNUMBER, PHOTO,ACTIVE,CREATEDON) 
				               VALUES('$fname','$lname','$email','$number','$password','$date','$address1','$address2','$address3','$pin','$position','$state','$district','$block','$gp','$documet','$dnumber','$basename','$active','$currdate')";
		$result2 = mysqli_query($conn, $sql2);

		if ($result2) {
			header("Location: ../AddOperatorCor.php?success=District Coordinator created successfully");
			exit();
		} else {
			printf("Errormessage: %s\n", mysqli_error($conn));
			header("Location: ../AddOperatorCor.php?error=unknown error occurred" + mysqli_error($conn));
			exit();
		}
	}
} else {
	header("Location: ../AddOperatorCor.php");
	exit();
}
