<?php
$db->Query("SELECT * FROM ins WHERE status = '1' ORDER BY id DESC");
$all_rows = $db->NumRows();

$per_page = 50;

$pages = $all_rows/$per_page;
$page = (isset($_GET['page']))?func::clear($_GET['page'],'int'):'1';

$pag = new pag();
$data['pag'] = ($pages > 1)? $pag->getPages($pages,$page,'/admin/ins'):'0';
$start = ($page-1)*$per_page;

$db->Query("SELECT * FROM ins WHERE status = '1' ORDER BY id DESC LIMIT $start,$per_page");

if($all_rows > 0){
    $ins = $db->FetchAll();

    $db->Query("SELECT * FROM users");
    while ($dat = $db->FetchArray()) {
        $users[$dat['id']] = $dat['screen_name'];
    }

    $num = 0;

    foreach ($ins as $inse) {
        $us_dat = $db->FetchArray();
        $data['ins'][$num]['id'] = $inse['id'];
        $data['ins'][$num]['user'] = $users[$inse['user_id']];
        $data['ins'][$num]['user_id'] = $inse['user_id'];
        $data['ins'][$num]['money'] = $inse['money'];
        $data['ins'][$num]['pay_sys'] = $inse['type_op'];
        $data['ins'][$num]['date'] = date('Y/m/d H:i',$inse['date_op']);
        $num++;
    }

}else $data['ins'] = '0';

$db->Query("SELECT * FROM config_pay WHERE id = '1'");
$configs = $db->FetchArray();

$data['configs'] = $configs;

new gen('admin/ins', $data);