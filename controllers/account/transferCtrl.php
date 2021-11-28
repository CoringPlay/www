<?php
$db->Query("SELECT * FROM config WHERE id = '1'");
$conf = $db->FetchArray();

$data['conf'] = $conf;

$db->Query("SELECT * FROM transfer_history WHERE from_user = '{$user_id}' OR to_user = '{$user_id}' ORDER BY id DESC");
$all_rows = $db->NumRows();
$per_page = 50;
$pages = $all_rows/$per_page;
$page = (isset($_GET['page']))?func::clear($_GET['page'],'int'):'1';
$pag = new pag();
$data['pag'] = ($pages > 1)? $pag->getPages($pages,$page,'/account/transfer'):'0';
$start = ($page-1)*$per_page;

$db->Query("SELECT * FROM transfer_history WHERE from_user = '{$user_id}' OR to_user = '{$user_id}' ORDER BY id DESC LIMIT $start,$per_page");
if($all_rows > 0){
    $transfers = $db->FetchAll();

    $db->Query("SELECT * FROM users");
    while ($dat = $db->FetchArray()) {
        $users[$dat['id']] = $dat['screen_name'];
    }

    $num = 0;
    foreach ($transfers as $transfer) {
        $us_dat = $db->FetchArray();

        $data['transfer'][$num]['from_id'] = $transfer['from_user'];
        $data['transfer'][$num]['from_user'] = $users[$transfer['from_user']];
        $data['transfer'][$num]['to_id'] = $transfer['to_user'];
        $data['transfer'][$num]['to_user'] = $users[$transfer['to_user']];
        $data['transfer'][$num]['money'] = sprintf('%.02f', $transfer['money']);
        $data['transfer'][$num]['date'] = date('d.m.y в H:i', $transfer['date_op']);

        $num++;

    }
}else $data['transfer'] = '0';

new gen("account/transfer", $data);