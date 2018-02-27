<?php 


/*
 * 验证码比对
 * @return boolean true：验证码正确，false：验证码错误
 */
function check_verify($code = ''){
    $code= empty($code) ? I('request.verify') : $code;
    $verify = new \Think\Verify();
    return $verify->check($code, "");
}

/**
 * mso密码加密方法
 * @param string $pw 要加密的字符串
 * @return string
 */
function mso_password($ps){
	return sha1(sha1('xw1104'.$ps));
}

/**
 * mso密码比对
 * @param $ps 要比对的密码
 * @param $db_ps 数据库中的密码
 * @return boolean 密码相同，返回true
 */
function mso_compare_password($ps,$db_ps){
	return mso_password($ps)==$db_ps;
}

/**
 * 创建token
 * @return session
 */
function creatToken() {
    $code = chr(mt_rand(0xB0, 0xF7)) . chr(mt_rand(0xA1, 0xFE)) . chr(mt_rand(0xB0, 0xF7)) . chr(mt_rand(0xA1, 0xFE)) . chr(mt_rand(0xB0, 0xF7)) . chr(mt_rand(0xA1, 0xFE));
    session('token', authcode($code));
}

/**
 * 加密token
 * @param  string $str 需要加密的字符串
 * @return string      加密后的字符串
 */
function authcode($str) {
    $key = "xw1104";
    $str = substr(md5($str), 8, 10);
    return md5($key . $str);
}


/**
 * 判断token
 * @param  string $token 提交的token
 * @return boolean   如果比对成功则消除session返回true，否则返回false
 */
function checkToken($token) {
    if ($token == session('token')) {
        session('token', null);return true;
    } else {
        return false;
    }
}

/**
 * 协议的域名
 * @return string 带协议的域名
 */
function sp_get_host(){
	$host=$_SERVER["HTTP_HOST"];
	$protocol=is_ssl () ? "https://" : "http://";
	return $protocol.$host;
}

/**
 * 遍历文件夹
 * @param string $dir 文件夹地址
 * @return array 文件夹内容
 */
function getDir($dir){
    $list = scandir($dir,1);
    foreach($list as $k => $v) {
        if('.' != $v && '..' != $v){
            if(is_dir($dir.'/'.$v)){
                $res['dir'][$k] = iconv('gbk','utf-8',$dir.'/'.$v);
            }else{
                $res['file'][$k] = iconv('gbk','utf-8',$dir.'/'.$v);
            }
        }
    }
    return $res;
}


/**
 * 获取时间戳之间的时间间隔
 * @return array
 */
function mso_get_days($t1,$t2){
	if(t1>t2){
		$start = $t2;$end = $t1;
	}else{
		$start = $t1;$end = $t2;
	}
	$diff = $end - $start;
	$days = intval($diff/86400);
	$remain = $diff%86400;
	$hours = intval($remain/3600);
	$remain = $remain%3600;
	$mins = intval($remain/60);
	$secs = $remain%60;
	return array("day" => $days,"hour" => $hours,"min" => $mins,"sec" => $secs);
}

/**
 * 添加天数
 * @return int
 */
function mso_add_days($t,$m){
	return intval($t+($m*30*86400));
}

/**
 * 判断是否为微信访问
 * @return boolean
 */
function is_weixin(){
    if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false) {
        return true;
    }
    return false;
}


/**
 * 判断是否为手机访问
 * @return  boolean
 */
function is_mobile() {
	static $sp_is_mobile;

	if ( isset($sp_is_mobile) )
		return $sp_is_mobile;

	if ( empty($_SERVER['HTTP_USER_AGENT']) ) {
		$sp_is_mobile = false;
	} elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false // many mobile devices (all iPhone, iPad, etc.)
			|| strpos($_SERVER['HTTP_USER_AGENT'], 'Android') !== false
			|| strpos($_SERVER['HTTP_USER_AGENT'], 'Silk/') !== false
			|| strpos($_SERVER['HTTP_USER_AGENT'], 'Kindle') !== false
			|| strpos($_SERVER['HTTP_USER_AGENT'], 'BlackBerry') !== false
			|| strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== false
			|| strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mobi') !== false ) {
		$sp_is_mobile = true;
	} else {
		$sp_is_mobile = false;
	}
	return $sp_is_mobile;
}


/**
 * 生成唯一ID
 */
function getAbId()
{
    return rand(10,99).date('ymd') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
}