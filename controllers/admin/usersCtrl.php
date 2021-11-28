<?php
if(!isset($_GET['find'])){
	$db->Query("SELECT * FROM users ORDER BY id DESC");
	$all_rows = $db->NumRows();
	$per_page = 50;
	$pages = $all_rows/$per_page;
	$page = (isset($_GET['page']))?func::clear($_GET['page'],'int'):'1';
	$pag = new pag();
	$data['pag'] = ($pages > 1)? $pag->getPages($pages,$page,'/admin/users'):'0';
	$start = ($page-1)*$per_page;
	$db->Query("SELECT * FROM users ORDER BY id DESC LIMIT $start,$per_page");
	if($all_rows > 0){
		$uss = $db->FetchAll();
		$num = 0;
		foreach ($uss as $user) {
			$user_id = $user['id'];
			$db->Query("SELECT * FROM users_conf WHERE user_id = '{$user_id}'");
			$us_dat = $db->FetchArray();
			$data['users'][$num] = array_merge($user,$us_dat);
			$num++;
		}
	}else $data['users'] = '0';
}else {
	$data['pag'] = '0';
	if(!empty($_GET['find'])){
		$find = func::clear($_GET['find']);
		$db->Query("SELECT * FROM users WHERE screen_name LIKE '%{$find}%'");
		if($db->NumRows() > 0){
			$uss = $db->FetchAll();
			$num = 0;
			foreach ($uss as $user) {
				$user_id = $user['id'];
				$db->Query("SELECT * FROM users_conf WHERE user_id = '{$user_id}'");
				$us_dat = $db->FetchArray();
				$data['users'][$num] = array_merge($user,$us_dat);
				$num++;
			}
		}else $data['users'] = '0';
	}else $data['users'] = '0';
}
new gen('admin/users', $data);