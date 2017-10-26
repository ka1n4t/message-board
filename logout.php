<?php
	
	require_once("include_fns.php");

	do_html_header("Log out");

	// display_current_user();
	
	if(!isset($_SESSION['valid_user']) || ($_SESSION['valid_user'] == '')) {
		echo "<div>您还未登录</div>";
		echo "<div><a href=\"login.php\">登录</a></div>";
	} else {
		unset($_SESSION['valid_user']);
		$dist = session_destroy();
		if($dist) {
			echo "<div>已经退出</div>";
			echo "<div><a href=\"login.php\">重新登录</a></div>";
		} else {
			echo "<div>无法退出，请稍后重试</div>";
			echo "<div><a href=\"index.php\">回到主页</a></div>";
		}
	}

	do_html_footer();
	
?>