<?php
include_once('db.php');
$info = $_POST;
$username = strtolower($info['username']);
$password = md5($info['password']);
$qq = $info['qq'];
$email = $info['email'];
// 判断 用户名
$isUsername  =  $database -> has('authme',array('username'=>$username));
if($isUsername){
	$data['info'] = '该用户已被注册';
	$data['status'] = '0';
	echo json_encode($data);return false;
}
// 判断 邮箱
$isEmail  =  $database -> has('authme',array('email'=>$email));
if($isEmail){
	$data['info'] = '该邮箱已被注册';
	$data['status'] = '0';
	echo json_encode($data);return false;
}

// 判断 qq
$isQq  =  $database -> has('authme',array('qq'=>$qq));
if($isQq){
	$data['info'] = '该QQ已被注册';
	$data['status'] = '0';
	echo json_encode($data);return false;
}


$add = $database -> insert('authme',array('username'=>$username,'password'=>$password,'email'=>$email,'qq'=>$qq));
if($add){
	$data['info'] = '注册成功';
	$data['status'] = '1';
}else{
	$data['info'] = '注册失败';
	$data['status'] = '0';
}
echo json_encode($data);return false;
