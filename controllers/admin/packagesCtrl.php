<?php
$db->Query("SELECT * FROM packages ORDER BY id DESC");
if($db->NumRows() > 0){
	$data['pack'] = $db->FetchAll();
}else $data['pack'] = '0';
new gen('admin/packages',$data);