<?php
	
	function db_connect() {
		$db_host = "localhost";
		$db_username = "guestbook";
		$db_passwd = "password";
		$db_name = "db_guestbook";
		$conn = mysqli_connect($db_host,$db_username,$db_passwd,$db_name);
		
		if(mysqli_connect_errno()) {
			echo mysqli_connect_error();
			exit;
		}
	
		$conn->set_charset('utf8');	
		return $conn;
	}



?>