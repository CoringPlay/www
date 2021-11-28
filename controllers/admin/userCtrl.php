<?php
if (isset($url[3])) {
	$id = func::clear($url[3],'int');
	$db->Query("SELECT * FROM users WHERE id = '{$id}'");
	if($db->NumRows() > 0){
		$user_dat1 = $db->FetchArray();
		$db->Query("SELECT * FROM users_conf WHERE user_id = '{$id}'");
		$user_dat2 = $db->FetchArray();
		$data['data'] = array_merge($user_dat1,$user_dat2);
		$db->Query("SELECT ref_1 FROM users_ref WHERE user_id = '{$id}'");
		$referer = $db->FetchRow();
		if($referer != '0'){
			$db->Query("SELECT screen_name FROM users WHERE id = '{$referer}'");
			$data['referer'] = $db->FetchRow();
		}else $data['referer'] = 'Пришел сам';
		$db->Query("SELECT
					(SELECT COUNT(*) FROM users_ref WHERE ref_1 = '{$id}') refs_1,
					(SELECT COUNT(*) FROM users_ref WHERE ref_2 = '{$id}') refs_2,
					(SELECT COUNT(*) FROM users_ref WHERE ref_3 = '{$id}') refs_3,
					(SELECT SUM(money) FROM inserts WHERE user_id = '{$id}' AND status = '2') insert_all,
					(SELECT SUM(money) FROM payments WHERE user_id = '{$id}' AND status = '2') payment_all,
					(SELECT SUM(to_ref_1) FROM users_ref WHERE ref_1 = '{$id}') from_1,
					(SELECT SUM(to_ref_2) FROM users_ref WHERE ref_2 = '{$id}') from_2,
					(SELECT SUM(to_ref_3) FROM users_ref WHERE ref_3 = '{$id}') from_3");
		$data['stats'] = $db->FetchArray();
		$data['stats']['from_all'] = $data['stats']['from_1'] + $data['stats']['from_2'] + $data['stats']['from_3'];
		$data['stats']['payment_all'] = ($data['stats']['payment_all'] > 0)? $data['stats']['payment_all'] : '0';
		$data['stats']['insert_all'] = ($data['stats']['insert_all'] > 0)? $data['stats']['insert_all'] : '0';
		$db->Query("SELECT * FROM inserts WHERE user_id = '{$id}'");
		if($db->NumRows() > 0){
			$data['inserts'] = $db->FetchAll();
		}else $data['inserts'] = '0';
		$db->Query("SELECT * FROM payments WHERE user_id = '{$id}'");
		if($db->NumRows() > 0){
			$data['payments'] = $db->FetchAll();
		}else $data['payments'] = '0';
		$db->Query("SELECT * FROM auth WHERE user_id = '{$id}' ORDER BY time DESC LIMIT 10");
		if ($db->NumRows() > 0) {
			$data['auth_history'] = $db->FetchAll();
		}else $data['auth_history'] = '0';
	}else $data['status'] = '0';
}else $data['status'] = '0';
new gen('admin/user',$data);
