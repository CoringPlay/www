<?php
$db->Query("SELECT * FROM inserts WHERE status = '2' ORDER BY id DESC");
$all_rows = $db->NumRows();
$per_page = 50;
$pages = $all_rows/$per_page;
$page = (isset($_GET['page']))?func::clear($_GET['page'],'int'):'1';
$pag = new pag();
$data['pag'] = ($pages > 1)? $pag->getPages($pages,$page,'/admin/inserts'):'0';
$start = ($page-1)*$per_page;
$db->Query("SELECT * FROM inserts WHERE status = '2' ORDER BY id DESC LIMIT $start,$per_page");
if($all_rows > 0){
	$inserts = $db->FetchAll();
	$db->Query("SELECT * FROM users");
	while ($dat = $db->FetchArray()) {$users[$dat['id']] = $dat['screen_name'];}
	$num = 0;
	foreach ($inserts as $insert) {
		$us_dat = $db->FetchArray();
		$data['inserts'][$num]['id'] = $insert['id'];
		$data['inserts'][$num]['user'] = $users[$insert['user_id']];
		$data['inserts'][$num]['user_id'] = $insert['user_id'];
		$data['inserts'][$num]['money'] = $insert['money'];
		$data['inserts'][$num]['date'] = date('Y/m/d H:i',$insert['date_op']);
		$num++;
	}
}else $data['inserts'] = '0';
new gen('admin/inserts', $data);