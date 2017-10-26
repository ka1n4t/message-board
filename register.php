<?php

	require_once("include_fns.php");

	do_html_header("Register an account");

	// display_current_user();
	display_register_form();

	@$username = $_POST['username'];
	@$password1 = $_POST['password1'];
	@$password2 = $_POST['password2'];
	@$truename = $_POST['truename'];
	@$sex = $_POST['sex'];
	@$email = $_POST['email'];
	@$address = $_POST['address'];
	@$qq = "12345";
	@$tel = "12345";
	@$ip = "1";
	@$face = "tough";

	if(!empty($_POST)){
		//有数据提交时
		$conn = db_connect();
		$query = "select * from tb_user where usernc = '".$username."'";
		$result = $conn->query($query);
		if(!$result) {
			echo "<div class='tip'>error: could not check the valid of your nick name.</div>";
			do_html_footer();
			exit;
		}
		if($result->num_rows > 0) {
			echo "<div class='tip'>error: your nick name has been used.</div>";
			do_html_footer();
			exit;
		}
		//用户名有效，将信息存入数据库
		$query = "insert into tb_user (usernc,userpwd,truename,email,qq,tel,ip,address,regtime,sex,usertype,face) values(
					'$username','$password1','$truename','$email','$qq','$tel','$ip','$address',now(),'$sex','1','$face'
		         )";
		$result = $conn->query($query);
		if(!$result) {
			echo $conn->error;
			echo "<div class='tip'>error: could not save your information, please try again later.<div>";
			do_html_footer();
			exit;
		} else if($result->num_rows == false){
			echo "<div class='content_outer'>注册成功！&nbsp;<a href='login.php'>登录</a></div>";
		}
	}


	do_html_footer();

	echo "<script src='js/register_form.js'></script>";

?>