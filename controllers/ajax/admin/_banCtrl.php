<?php
if(!empty($_POST['id'])){
	$id = func::clear($_POST['id'],'int');
	$db->Query("SELECT * FROM users WHERE id = '{$id}'");
	if($db->NumRows() > 0){
		$user_data = $db->FetchArray();
		$ban = ($user_data['ban'] == '1')?'2':'1';
		$db->Query("UPDATE users SET ban = '{$ban}' WHERE id = '{$id}'");
		$status = ($ban == '2')?'baned':'unbaned';
		echo status('success', $status);
	}else echo status('err', 'Пользователь не найден');
}else echo status('err','Ошибка обновите страницу');