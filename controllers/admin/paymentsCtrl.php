<?php
$db->Query("SELECT * FROM payments WHERE status = '2' ORDER BY id DESC");
$all_rows = $db->NumRows();
$per_page = 50;
$pages = $all_rows / $per_page;
$page = (isset($_GET['page'])) ? func::clear($_GET['page'], 'int') : '1';
$pag = new pag();
$data['pag'] = ($pages > 1) ? $pag->getPages($pages, $page, '/admin/pay') : '0';
$start = ($page - 1) * $per_page;

$db->Query("SELECT * FROM payments WHERE status = '2' ORDER BY id DESC LIMIT $start,$per_page");
if ($all_rows > 0) {

    $payments = $db->FetchAll();

    $db->Query("SELECT * FROM users");
    while ($dat = $db->FetchArray()) {
        $users[$dat['id']] = $dat['screen_name'];
    }

    $num = 0;
    foreach ($payments as $payment) {
        $us_dat = $db->FetchArray();
        $data['payments'][$num]['id'] = $payment['id'];
        $data['payments'][$num]['user'] = $users[$payment['user_id']];
        $data['payments'][$num]['user_id'] = $payment['user_id'];
        $data['payments'][$num]['money'] = $payment['money'];
        $data['payments'][$num]['pay_sys'] = $payment['pay_sys'];
        $data['payments'][$num]['purse'] = $payment['purse'];
        $data['payments'][$num]['date'] = date('Y/m/d H:i', $payment['date_op']);
        $num++;
    }
} else $data['payments'] = '0';

$db->Query("SELECT * FROM config_pay WHERE id = '1'");
$configs = $db->FetchArray();

$data['configs'] = $configs;

new gen('admin/payments', $data);
