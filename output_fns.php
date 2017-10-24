<?php
	
	function do_html_header($title = '') {

		?>
			<html>
			<head>
				<title><?php echo $title; ?></title>
				<style type="text/css">
					body {
						margin: 0;
					}
					.login_form a {
						text-decoration: none;
						color: #111;
					}
					div {
						text-align: center;
						/*border: solid 1px #111;*/
					}
					input {
						width: 170px;
						border: none;
						padding: none;
						margin: none;
					}
					#outer {
						width: 100%;
						height: 1000px;
						position: absolute;
						top: 0;
					}
					#header {
						background: #6aa0ff;
						width: 100%;
						height: 10%;
					}
					#title {
						font-size: 40px; 
					}
					.content_outer {
						width: 100%;
						height: 80%;
						margin: 0;
						position: absolute;
						bottom: 10%;
						background-color: grey;
					}
					#tool_bar {
						height: 100%;
						width: 25%;
						background: maroon;
						position: absolute;
						left: 0;
						display: inline-block;
					}
					#content_main {
						height: 100%;
						width: 75%;
						background-color: green;
						position: absolute;
						right: 0;
						display: inline-block;
					}
					#footer {
						background: #6aa0ff;
						position: absolute;
						bottom: 0px;
						width: 100%;
						height: 10%;
						background-color: pink;
					}
					.nav {
						display: inline-block;
						position: relative;
						top: 5px;
						/*width: 150px;*/
						width:10%;
						height: 35px;
						margin-left: 1%;
						cursor: hand;
						border: solid 1px #111;
					}
					.login_form {
						width: 400px;
						height: 300px;
						border: solid 1px #111;
						background-color: blue;
						position: relative;
						margin-left: auto;
						margin-right: auto;
						top: 50px;
						/*top: 50px;
						left: 30px;*/
					}
				</style>
			</head>
			<body>
				<div id="outer">
					<div id="header">
						<div id="title">welcome to un1verses bbs</div>
						<div class="nav" onclick="window.location.href='index.php'"	>首页</div>
						<div class="nav" onclick="window.location.href='http://www.baidu.com'"	>发表留言</div>
						<div class="nav" onclick="window.location.href='http://www.baidu.com'"	>查看留言</div>
						<div class="nav" onclick="window.location.href='http://www.baidu.com'"	>查询留言</div>
						<div class="nav" onclick="window.location.href='login.php'"	>用户登录</div>
						<div class="nav" onclick="window.location.href='logout.php'"	>注销登录</div>
					</div>
		<?php
	}

	function do_tool_bar() {
		?>
		<div class="content_outer">
			<!-- 面板 -->
			<div id="tool_bar">


		<?php
	}

	function do_tool_bar_end() {
		?>
		</div>
		<?php
	}

	function display_login_form() {
		?>	
		<!-- 登录区 -->
		<div class="content_outer">
			<div class="login_form">
				<form method="post" action="login.php">
					<br>
					<p>用户登录</p>
					用户名：
					<input type="input" name="username">
					<br>
					密&nbsp;&nbsp;码：
					<input type="password" name="password">
					<div>&nbsp;</div>
					<input  type="submit" name="submit" value="Submit">
				</form>
				<a href="register.php">注册</a>
				<a href="forget_passwd.php">忘记密码?</a>
			</div>			
		</div>

		<?php
	}

	function display_register_form() {
		?>
		<div class="content_outer">
			<div class="login_form">
				<form method="post" action="register.php">
					<br>
					<p>用户注册</p>
					用户名：
					<input type="input" name="username">
					<br>
					密&nbsp;&nbsp;&nbsp;码：
					<input type="input" name="password1">
					<br>
					再次输入密码：
					<input type="input" name="password2">
					<div>&nbsp;</div>
					<input  type="submit" name="submit" value="Submit">
				</form>
			</div>
		</div>
		<?php
	}

	function display_forget_passwd_form() {
		?>
		<div class="content_outer">
			<div class="login_form">
				<form method="post" action="forget_passwd.php">
					<br>
					<p>忘记密码</p>
					用户名：
					<input type="input" name="username">
					<br>
					密&nbsp;&nbsp;&nbsp;码：
					<input type="input" name="password1">
					<br>
					再次输入密码：
					<input type="input" name="password2">
					<div>&nbsp;</div>
					<input  type="submit" name="submit" value="Submit">
				</form>
			</div>
		</div>
		<?php
	}

	function do_content() {
		?>
			<div id="content_main">
				content_main
				<!-- 留言记录 -->

			</div>
		</div>
		<?php
	}

	function do_html_footer() {
		?>
					<div height="100" id="footer">
						<br>
						<br>
						powered by: <a href="https://github.com/un1verses">ka1n4t</a>
					</div>
				</div>
			</body>
			</html>

		<?php
	}


?>