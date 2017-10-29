<?php
	
	require_once("include_fns.php");

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
					.real_comment {
						width: 1000px;
						height: 170px;
						position: relative;
						margin-left: auto;
						margin-right: auto;
						padding: 10px;
						top: 40px;
						border: solid 1px #111;
					}
					.comment_title {
						width:900px;
						height: 50px;
						position: relative;
						margin:auto;
						border: solid 1px #111;
					}
					.comment_body {
						width:900px;
						height: 120px;
						position: relative;
						margin:auto;
						border: solid 1px #111;
					}
					.comment_text {
						width:800px;
						height: 70%;
						position: relative;
						left: 30px;
						top:10px;
						text-align: left;
						border: solid 1px #111;
					}
					.comment_tip {
						width: 200px;
						font-size: 15px;
						position: absolute;
						right: 60px;
						bottom: 12px;
					}
					#index {
						width: 900px;
						height: 50px;
						position: relative;
						top: 100px;
						margin: auto;
						border: solid 1px #111;
					}
					.index_item {
						width: 50px;
						height: 30px;
						display: inline-block;
						margin: auto;
						position: relative;
						top: 10px;
						border: solid 1px #111;
					}
					.index_item a {
						text-decoration: none;
						color: #000;
					}
					.user_tip {
						width: 200px;
						background: #6aa0ff;
						position: absolute;
						top: 10px;
						right: 0;
						display: inline-block;
						border: solid 1px #111;
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
						height: 80%;
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
						background-color: #6aa0ff;
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
						height: 400px;
						border: solid 1px #111;
						background-color: #6aa0ff;
						position: relative;
						margin-left: auto;
						margin-right: auto;
						top: 50px;
						/*top: 50px;
						left: 30px;*/
					}
					.tip {
						position: absolute;
					}
					textarea {
						 width:200px;
						 height:100px;
						 resize:none;
					}
				</style>
			</head>
			<body>
				<div id="outer">
					<div id="header">
						<div id="title">welcome to un1verses bbs</div>
						<div class="nav" onclick="window.location.href='index.php'"	>首页</div>
						<div class="nav" onclick="window.location.href='saveleaveword.php'"	>发表留言</div>
						<!-- <div class="nav" onclick="window.location.href='http://www.baidu.com'"	>查看留言</div> -->
						<div class="nav" onclick="window.location.href='http://www.baidu.com'"	>查询留言</div>
						<!-- 登录按钮换成了右上角的tip -->
						<!-- <div class="nav" onclick="window.location.href='login.php'"	>用户登录</div>
						<div class="nav" onclick="window.location.href='logout.php'"	>注销登录</div> -->
					</div>
		<?php
			display_current_user();
	}

	function display_current_user() {
		?>
			<!-- <div class="user_tip"> -->
			<?php
				if(isset($_SESSION['valid_user']) && ($_SESSION['valid_user'] != "")) {
					$conn = db_connect();
					$query = "select usernc from tb_user where id=".$_SESSION['valid_user'];
					$result = $conn->query($query);

					if(!$result) {
						echo "error: could not load your name";
					}

					$username = $result->fetch_row()[0];
					?>
					<div class="user_tip">当前用户为：<?php echo $username ?>
						<br>
						<a href="logout.php">注销</a>
					</div>
					<?php
				} else {
					?>
					<div class="user_tip">当前未登录&nbsp;<a href="login.php">登录</a></div>
					<?php
				}
			?>
			<!-- </div>	 -->
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
		</div></div><!-- 第二个闭合标签被index.php带走了 -->
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
				<form method="post" action="register.php" onsubmit="return check_valid(this)">
					<br>
					<p>用户注册</p>
					*用户名：&nbsp;&nbsp;
					<input type="input" name="username">
					<br>
					*密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：
					<input type="password" name="password1">
					<br>
					*再次输入密码：
					<input type="password" name="password2">
					<br>
					真实姓名：
					<input type="input" name="truename" value="笨蛋">
					<br>
					性&nbsp;&nbsp;&nbsp;&nbsp;别：
					<select name="sex"><option value="m">男</option><option value="w">女</option></select>
					<br>
					E-mail地址：&nbsp;&nbsp;
					<input type="email" name="email" value="123456@gmail.com">
					<br>
					<!-- 头像选择： -->
					联系地址：&nbsp;&nbsp;
					<input type="text" name="address" value="加州硅谷">
					<br>
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

	function display_leaveword_form() {
		?>
		<div class="content_outer">
			<div>
				<form action="saveleaveword.php" method="post">
					<br>
					<br>
					留言标题：<input type="text" name="title">
					<br>
					<br>
					留言内容：<textarea name="comment"></textarea>
					<br>
					<br>
					<input type="submit" name="submit" value="提交">
				</form>
			</div>
		</div>
		<?php
	}

	// function display_comment_frame() {
	// 	?>
	<!-- // 	<div></div> -->
	 	<?php
	// }

	// function do_content() {
		?>
			<!-- <div id="content_main"> -->
				<!-- 留言记录 -->
			<!-- 	<div class="real_comment">
					<div class="comment_title">comment_title1</div>
					<div class="comment_body">comment_body1</div>
				</div>
				<div class="real_comment">
					<div class="comment_title">comment_title2</div>
					<div class="comment_body">comment_body2</div>
				</div>
				<div class="real_comment">
					<div class="comment_title">comment_title3</div>
					<div class="comment_body">comment_body3</div>
				</div>
 -->

				<!-- 页码 -->
<!-- 				<div>
					
				</div>
			</div>
		</div> -->
		<?php
//	}

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