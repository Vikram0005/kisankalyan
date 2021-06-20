<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['email']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST['email']);
	$pass = validate($_POST['password']);

	if (empty($email)) {
		header("Location: index.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
		// hashing the password
       // $pass = md5($pass);

        
		$sql = "SELECT * FROM REGISTER WHERE EMAIL='$email' AND PASSWORD='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['EMAIL'] === $email && $row['PASSWORD'] === $pass) {
            	$_SESSION['EMAIL'] = $row['EMAIL'];
            	$_SESSION['FNAME'] = $row['FNAME'];
            	$_SESSION['ID'] = $row['ID'];

                if($row['USERTYPE']==1)
                {
                    //SUPER ADMIN
            	    header("Location: ../Php/Admin/Dashboard.php");
                }
                else if($row['USERTYPE']==2)
                {
                    //DISTRICT COORDINATOR
                }
                else if($row['USERTYPE']==3)
                {
                    //BLOCK COORDINATOR
                }
                else if($row['USERTYPE']==4)
                {
                    //OPERATOR
                }
		        exit();
            }else{
				header("Location: ../login-new.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: ../login-new.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: ../login-new.php");
	exit();
}