<?php
include_once('db.php');
$info = $_POST;
$username = strtolower($info['username']);
$salt = getSalt('8','0'); // 获取盐分
$password = md5($info['password'] . $salt);
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


$add = $database -> insert('authme',array('username'=>$username,'password'=>$password,'email'=>$email,'qq'=>$qq,'salt'=>$salt));
if($add){
	$data['info'] = '注册成功';
	$data['status'] = '1';
}else{
	$data['info'] = '注册失败';
	$data['status'] = '0';
}
echo json_encode($data);return false;


/**
 * [getSalt 盐分]
 * @author mr.zhou
 * @param  integer $num  [盐的个数]
 * @param  integer $flag [ 0数字字符混合 1字符 2数字]
 * @return [type]        [description]
 */
function getSalt($num = 0, $flag = 0)
{
	  /**获取验证标识**/
    $arr = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',1,2,3,4,5,6,7,8,9,0);
    $vc  = '';
    switch($flag) {
        case '0' : $s = 0;  $e = 61; break;
        case '1' : $s = 0;  $e = 51; break;
        case '2' : $s = 52; $e = 61; break;
    }

    for($i = 0; $i < $num; $i++) {
        $index = rand($s, $e);
        $vc   .= $arr[$index];
    }
    return $vc;
}