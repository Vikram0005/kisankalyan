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
        
		$sql = "SELECT * FROM register WHERE EMAIL='$email' AND PASSWORD='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['EMAIL'] === $email && $row['PASSWORD'] === $pass) {
            	$_SESSION['EMAIL'] = $row['EMAIL'];
            	$_SESSION['FNAME'] = $row['FNAME'];
            	$_SESSION['ID'] = $row['ID'];
				$_SESSION['DISTRICT'] = $row['DISTRICT'];
				$_SESSION['BLOCK'] = $row['BLOCK'];

                if($row['USERTYPE']==1 && $row['ACTIVE']==1)
                {
                    //SUPER ADMIN
            	    header("Location: ../Php/Admin/Dashboard.php");
                }
                else if($row['USERTYPE']==2 && $row['ACTIVE']==1)
                {
                    //DISTRICT COORDINATOR
					header("Location: ../Php/District/Dashboard.php");
                }
                else if($row['USERTYPE']==3 && $row['ACTIVE']==1)
                {
                    //BLOCK COORDINATOR
					header("Location: ../Php/Block/Dashboard.php");
                }
                else if($row['USERTYPE']==4 && $row['ACTIVE']==1)
                {
                    //OPERATOR
					header("Location: ../Php/Operator/Dashboard.php");
                }
				else
				{
					header("Location: ../login.php?error=You dont permission to access. Please contact to admin.");
		        exit();
				}
		        exit();
            }else{
				header("Location: ../login.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: ../login.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: ../login.php");
	exit();
}