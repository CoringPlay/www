<?php
$db->Query("SELECT * FROM ticket WHERE status = '0' ORDER BY id DESC");
$all_rows = $db->NumRows();

$per_page = 50;

$pages = $all_rows/$per_page;
$page = (isset($_GET['page']))?func::clear($_GET['page'],'int'):'1';

$pag = new pag();
$data['pag'] = ($pages > 1)? $pag->getPages($pages,$page,'/admin/support'):'0';
$start = ($page-1)*$per_page;

$db->Query("SELECT * FROM ticket WHERE status = '0' ORDER BY id DESC LIMIT $start,$per_page");

if($all_rows > 0){
    $support = $db->FetchAll();

    $db->Query("SELECT * FROM users");
    while ($dat = $db->FetchArray()) {
        $users[$dat['id']] = $dat['screen_name'];
    }

    $num = 0;

    foreach ($support as $ticket) {
        $us_dat = $db->FetchArray();
        $data['support'][$num]['id'] = $ticket['id'];
        $data['support'][$num]['type'] = $ticket['type'];
        $data['support'][$num]['title'] = $ticket['title'];
        $data['support'][$num]['count'] = $ticket['count'];
        $data['support'][$num]['user'] = $users[$ticket['user_id']];
        $data['support'][$num]['date'] = date('H:i в d.m.y',$ticket['date_add']);
        $num++;
    }

} else $data['support'] = '0';

new gen('admin/support', $data);