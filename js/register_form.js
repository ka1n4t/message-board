function check_valid(form) {
	if(form.username.value == "") {
		alert("用户名为空！");
		return false;
	}
	if(form.password1.value !== form.password2.value) {
		alert("两次密码不一样！");
		return false;
	}
	return true;
}