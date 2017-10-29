<?php

	require_once("include_fns.php");

	do_html_header("Leave your word");


	if(!isset($_SESSION['valid_user'])) {
		echo "<p>先登录啊你！</p>";
		echo "<div><a href=\"login.php\">登录</a></div>";
		do_html_footer();
		exit;
	}
	if(isset($_POST['title']) && ($_POST['title'] != "") && isset($_POST['comment']) && ($_POST['comment'] != "")) {
		@$title = $_POST["title"];
		@$comment = $_POST["comment"];
		$conn = db_connect();
		$query = "select * from tb_leaveword where title = '$title'";
		$result = $conn->query($query);
		if($result->num_rows > 0) {
			echo "<p>标题已被占用，换一个吧</p>";
			echo "<div><a href=\"saveleaveword.php\">重新评论</a></div>";
			do_html_footer();
			exit;
		}

		$userid = $_SESSION['valid_user'];
		$query = "insert into tb_leaveword (userid, createtime, title, content) values(
			      '$userid',now(),'$title','$comment')";
		$result = $conn->query($query);
		if(!$result) {
			echo "<p>插入出错，稍后重试</p>";
			echo $conn->error;
			do_html_footer();
			exit;
		}
		echo "<p>评论成功</p>";
		echo "<div><a href=\"index.php\">返回首页</a></div>";
	} else {
		display_leaveword_form();
	}

	do_html_footer();


?>