$('.register').click(function(){
		var username = $('.username').val();
		if(username == ''){
			alert('游戏名不能为空');return false;
		}
		var password = $('.password').val();
		if(password == ''){
			alert('密码不能为空');return false;
		}
		var rpassword = $('.rpassword').val();
		if(password != rpassword){
			alert('密码两次输入的不同');return false;
		}
		var qq = $('.qq').val();
		if(qq == ''){
			alert('qq号不能为空');return false;
		}
		var email = $('.email').val();
		if(email == ''){
			alert('邮箱不能为空');return false;
		}
  		var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
	    if(!myreg.test(email))
        {
            alert('请输入有效的E_mail！');
            return false;
      	}
		
		var option = {
			"username" : username,
			"password" : password,
			"qq" : qq,
			"email" : email
		}
		$.post('register.php', option, function(data) {
			alert(data['info']);
		},'json');
});

