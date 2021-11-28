<?php
if(isset($_POST['id']) && !empty($_POST['id'])){
	$id = func::clear($_POST['id'],'int');
	$db->Query("SELECT * FROM payments WHERE id = '{$id}'");
	if($db->NumRows() > 0){
		$data_pay = $db->FetchArray();

		if($data_pay['status'] != '2' && $data_pay['status'] != '3'){
			$user_id = $data_pay['user_id'];
			$money = sprintf('%.02f',floatval($data_pay['money']));
			$db->Query("UPDATE users_conf SET balance = balance + '{$money}' WHERE user_id = '{$user_id}'");
			$db->Query("UPDATE payments SET status = '3' WHERE id = '{$id}'");
			echo status('success');
		}else echo status('err','Эта выплата уже была в обработке');

	}else echo status('err','Такая выплата не найдена');
}else echo status('err','Ошибка обновите страницу');