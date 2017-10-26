<?php

	require_once("include_fns.php");

	do_html_header("login");

	// display_current_user();

	@$username = $_POST['username'];
	@$password = $_POST['password'];

	if(isset($_SESSION['valid_user'])) {
		//已有用户登录
		echo "<p>您已登录!</p>";
		echo "<div><a href=\"index.php\">返回首页</a></div>";
		do_html_footer();
		exit;
	}

	if(isset($username) && ($username != "") && isset($password) && ($password != "")) {
		//处理输入的用户名和密码
		$conn = db_connect();
		$query = "select * from tb_user where usernc = '$username' and userpwd = '$password'";
		$result = $conn->query($query);

		if(!$result) {
			echo "<div>Could not execute the query</div>";
			echo $conn->error;
		}

		if($result->num_rows == 1) {
			//注意这里的fetch用法
			$user = $result->fetch_assoc();
			$_SESSION['valid_user'] = $user['id'];

			echo "<div>welcome, ".$user['usernc']."!</div>";
			echo "<br>";
			echo "<a href='index.php'>回到主页</a>";

		} else {
			echo "用户名或密码错误！";
			echo "<br>";
			echo "<a href='login.php'>重新登录</a>";
		}

	} else {
		//进入登录页面
		display_login_form();
	}


	do_html_footer();

?>