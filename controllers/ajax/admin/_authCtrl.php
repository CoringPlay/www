<?php
function badAuth($db){
	$ip = $_SERVER['REMOTE_ADDR'];
	$date = time();
	$db->Query("INSERT INTO bad_auth (ip,date) VALUES ('{$ip}','{$date}')");
	echo status('err','Логин или пароль или ключ неверен');
}
if (!isset($_SESSION['admin'])) {
	if(isset($_POST['login']) && !empty($_POST['login'])){
		if (isset($_POST['password']) && !empty($_POST['password'])) {
			$spec_time = time() - 21600;
			$db->Query("SELECT * FROM bad_auth WHERE ip = '{$ip}' AND date > '{$spec_time}'");
			if($db->NumRows() > 0)
				die(status('err','Нет доступа'));
			$db->Query("SELECT * FROM admin WHERE id = '1'");
			$admin_data = $db->FetchArray();
			$login = func::clear($_POST['login']);
			$password = func::clear($_POST['password']);
			if($login == $admin_data['login']){
				if($password == $admin_data['password']){
					$key = $admin_data['secret'];
					if ($_POST['key'] == $key) {
						$_SESSION['admin'] = true;
						echo status('success');
					}else badAuth($db);
				}else badAuth($db);
			}else badAuth($db);
		}else echo status('err','Укажите пароль');
	}else echo status('err','Укажите логин');
}else echo status('err','Вы авторизованы');