<?php
	
	require_once("include_fns.php");

	do_html_header("explore the universe");
	
	// display_current_user();

	do_tool_bar();

	do_tool_bar_end();

	if(isset($_GET['page'])) {
		@$current_page = $_GET['page'];
	} else {
		@$current_page = 1;
	}

	$conn = db_connect();
	$query = "SELECT count(*) FROM tb_leaveword";
	$result = $conn->query($query);
	$row = $result->fetch_row();
	$total_page = ceil($row[0] / 3);

	$query = "SELECT * FROM tb_leaveword LIMIT ".(($current_page-1)*3).",3";
	$result = $conn->query($query);
	if(!$result) {
		echo "<p>查询评论出错</p>";
		exit;
	}

	?>

	<div id="content_main">
		<!-- 留言记录 -->
		<!--<div class="real_comment">
			<div class="comment_title">comment_title1</div>
			<div class="comment_body">comment_body1</div>
		</div> -->
		<?php

			while($row = $result->fetch_assoc()) {
				echo "	<div class='real_comment'>
							<div class='comment_title'><div class='comment_text'>Title:".$row['title']."</div></div>
							<div class='comment_body'><div class='comment_text'>Text:".$row['content']."</div></div>
							<div class='comment_tip'>time:".$row['createtime']."</div>
						</div>";
			}
		?>
		<!-- 页码 -->
		<div id="index">
			<!-- <div class="index_item">test</div> -->
			<?php
				$flag = 1;
				while($flag <= $total_page) {
					echo "<div class='index_item'><a href='index.php?page=$flag'>$flag</a></div>";
					$flag ++;
				}
			?>
		</div>
	</div>

	<?php

	do_html_footer();

?>