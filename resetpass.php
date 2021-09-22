<?php
include "config.php";
if(!isset($_SESSION)){
    session_start();
}
if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
    if (!empty($_POST)){
        function validate($data){
           $data = trim($data);
    	   $data = stripslashes($data);
    	   $data = htmlspecialchars($data);
    	   return $data;
    	}
    
    	$op = validate($_POST['op']);
    	$np = validate($_POST['np']);
    	$nn = validate($_POST['nn']);
        
        if(empty($op)){
          header("Location: reset.php?error=Old Password is required");
    	  exit();
        }else if(empty($np)){
          header("Location: reset.php?error=New Password is required");
    	  exit();
        }else if($np !== $nn){
          header("Location: reset.php?error=The confirmation password  does not match");
    	  exit();
        }else {
        	// hashing the password
        	$op = md5($op);
        	$np = md5($np);
            $id = $_SESSION['id'];
    
            $sql = "SELECT password
                    FROM tb_user WHERE 
                    id='$id' AND password='$op'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) === 1){
            	
            	$sql_2 = "UPDATE tb_user SET password='$np' WHERE id='$id'";
            	mysqli_query($conn, $sql_2);
            	header("Location: reset.php?success=Your password has been changed successfully");
    	        exit();
            }else {
        	    header("Location: reset.php?error=Incorrect password");
	            exit();
        }

    }
        }else{
	    header("Location: reset.php");
	    exit();
    }
    
    }else{
        header("Location: index.php");
        exit();
}
?>