<?php
    session_start();
    if(isset($_POST['login'])) {
    	$data_missing = array();
        
        if(empty($_POST['email'])) {
            $data_missing[] = 'Email';
        } else {
            $email = trim($_POST['email']);
        }
        
        if(empty($_POST['password'])) {
            $data_missing[] = 'Password';
        } else {
            $password = trim($_POST['password']);
        }

        if (empty($data_missing)) {
	        	require_once('connect.php');
	          	$query = "SELECT email, password, username FROM users WHERE email = '" . $email . "'";
			  	$result = $dbc->query($query);	

			  	if ($result->num_rows > 0) {
			    // output data of each row
				    while($row = $result->fetch_assoc()) {
				        if ($password == $row["password"]) {
                            $_SESSION["user"] = $row["username"];
                            $_SESSION["logged"] = 1;
                            echo '<script>alert("success em logged true")</script>';
                            header("location: index.php");
                            exit;
                        } else {
                            echo "Password Errada :(";
                        }
				    }
				} else {
				    echo "0 results";
				}
				$dbc->close();
	    } else {
	    	echo '<script>alert("data missing")</script>';
	    }


    }

?>