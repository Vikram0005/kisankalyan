<?php
session_start();
include "../../db_conn.php";

if (isset($_POST['name'])) {

	function validate($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$name = validate($_POST['name']);
	$fname = validate($_POST['fname']);
	$email = validate($_POST['email']);
	$number = validate($_POST['number']);
	$address1 = validate($_POST['address1']);
	$address2 = validate($_POST['address2']);
	$pin = validate($_POST['pin']);
	$state = validate($_POST['state']);
	$district = validate($_POST['district']);
	$block = validate($_POST['block']);
	$gp = validate($_POST['gp']);
	$familymember = validate($_POST['familymember']);
	$education = validate($_POST['education']);
	$caste = validate($_POST['caste']);
	$land = validate($_POST['land']);
	$crop = validate($_POST['crop']);
	$ir = validate($_POST['ir']);
	$source = validate($_POST['source']);
	$doc1name = validate($_POST['doc1name']);
	$doc1num = validate($_POST['doc1num']);
	$doc2num = validate($_POST['doc2num']);
	$pin = validate($_POST['pin']);

	$active = 0;

	// hashing the password
	// $pass = md5($pass);
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
				header("Location: ../AddFarmerCor.php?error=Invalid Pin.");
				exit();
			}
		} else {
			header("Location: ../AddFarmerCor.php?error=Invalid Pin.");
			exit();
		}
	}


	$target_dir = "../../../uploads/";
	$filename   = uniqid() . "-" . time(); // 5dab1961e93a7-1571494241
	$extension = end(explode(".", $_FILES["doc1image"]["name"]));
	$doc1path   = $filename . "." . $extension; // 5dab1961e93a7_1571494241.jpg

	$filename   = uniqid() . "-" . time(); // 5dab1961e93a7-1571494241
	$extension = end(explode(".", $_FILES["doc2image"]["name"]));
	$doc2path   = $filename . "." . $extension; // 5dab1961e93a7_1571494241.jpg

	$filename   = uniqid() . "-" . time(); // 5dab1961e93a7-1571494241
	$extension = end(explode(".", $_FILES["doc3image"]["name"]));
	$doc3path   = $filename . "." . $extension; // 5dab1961e93a7_1571494241.jpg

	$target_file1 = $target_dir . basename($_FILES["doc1image"]["name"]);
	$target_file2 = $target_dir . basename($_FILES["doc2image"]["name"]);
	$target_file3 = $target_dir . basename($_FILES["doc3image"]["name"]);
	$uploadOk = 1;
	$imageFileType1 = strtolower(pathinfo($target_file1, PATHINFO_EXTENSION));
	$imageFileType2 = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));
	$imageFileType3 = strtolower(pathinfo($target_file3, PATHINFO_EXTENSION));

	// Check if image file is a actual image or fake image
	if (isset($_POST["submit"])) {
		$check1 = getimagesize($_FILES["doc1image"]["tmp_name"]);
		$check2 = getimagesize($_FILES["doc2image"]["tmp_name"]);
		$check3 = getimagesize($_FILES["doc3image"]["tmp_name"]);
		if ($check1 !== false && $check2 !== false && $check3 !== false) {
			$uploadOk = 1;
		} else {
			$uploadOk = 0;
			header("Location: ../AddFarmerCor.php?error=File is not an image.");
			exit();
		}
	}

	// Check file size
	if ($_FILES["doc1image"]["size"] > 500000 && $_FILES["doc2image"]["size"] > 500000 && $_FILES["doc3image"]["size"] > 500000) {
		$uploadOk = 0;
		header("Location: ../AddFarmerCor.php?error=Sorry, your file is too large.");
		exit();
	}

	// Allow certain file formats
	if ($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg") {
		$uploadOk = 0;
		header("Location: ../AddFarmerCor.php?error=Sorry, only JPG, JPEG, PNG files are allowed..");
		exit();
	}

	if ($imageFileType2 != "jpg" && $imageFileType2 != "png" && $imageFileType2 != "jpeg") {
		$uploadOk = 0;
		header("Location: ../AddFarmerCor.php?error=Sorry, only JPG, JPEG, PNG files are allowed..");
		exit();
	}

	if ($imageFileType3 != "jpg" && $imageFileType3 != "png" && $imageFileType3 != "jpeg") {
		$uploadOk = 0;
		header("Location: ../AddFarmerCor.php?error=Sorry, only JPG, JPEG, PNG files are allowed..");
		exit();
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		header("Location: ../AddFarmerCor.php?error=Sorry, your file was not uploaded.");
		exit();
		// if everything is ok, try to upload file
	} else {
		$source1 = $_FILES["doc1image"]["tmp_name"];
		$destination1  = "../../../uploads/{$doc1path}";

		$source2 = $_FILES["doc2image"]["tmp_name"];
		$destination2  = "../../../uploads/{$doc2path}";

		$source3 = $_FILES["doc3image"]["tmp_name"];
		$destination3  = "../../../uploads/{$doc3path}";

		if (move_uploaded_file($source1, $destination1)) {
			echo "The file " . $doc1path . " has been uploaded.";
		} else {
			header("Location: ../AddFarmerCor.php?error=Sorry, there was an error uploading your file.");
			exit();
		}

		if (move_uploaded_file($source2, $destination2)) {
			echo "The file " . $doc2path . " has been uploaded.";
		} else {
			header("Location: ../AddFarmerCor.php?error=Sorry, there was an error uploading your file.");
			exit();
		}

		if (move_uploaded_file($source3, $destination3)) {
			echo "The file " . $doc3path . " has been uploaded.";
		} else {
			header("Location: ../AddFarmerCor.php?error=Sorry, there was an error uploading your file.");
			exit();
		}
	}

	$currdate = date('Y-m-d');
	$KID = date("Y") . "-" . rand(1000, 9999) . "-" . rand(1111, 9999);
	$addedby = $_SESSION["ID"];
	$sql2 = "INSERT INTO farmer(ADDEDBY,NAME, FNAME, EMAIL, NUMBER, ADDRESS1, ADDRESS2, PINCODE, STATE, DISTRICT, BLOCK, GP, FMEMBER, EDUCATION, CASTE, LANDHOLDING, CROP, IR, SOURCE,DOCTYPE,DOC1NUM,DOC1URL,DOC2NUM,DOC2URL,DOC3URL,KID,ACTIVE,CREATEDON) 
				        VALUES('$addedby','$name','$fname','$email','$number','$address1','$address2','$pin','$state','$district','$block','$gp','$familymember','$education','$caste','$land','$crop','$ir','$sour','$doc1name','$doc1num','$doc1path','$doc2num','$doc2path','$doc3path','$KID','$active','$currdate')";
	$result2 = mysqli_query($conn, $sql2);

	if ($result2) {
		header("Location: ../AddFarmerCor.php?success=Farmer created successfully");
		exit();
	} else {
		header("Location: ../AddFarmerCor.php?error=unknown error occurred");
		exit();
	}
} else {
	header("Location: ../AddFarmerCor.php");
	exit();
}
