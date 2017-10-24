<?php

	require_once("include_fns.php");

	$username = @$_POST['username'];
	$password1 = @$_POST['password1'];
	$password2 = @$_POST['password2'];

	do_html_header("Register an account");

	display_register_form();

	do_html_footer();

?>