<?php
$db->Query("SELECT * FROM promo_history WHERE user_id = '{$user_id}'");
$all_rows = $db->NumRows();

$db->Query("SELECT * FROM promo_history WHERE user_id = '{$user_id}'");
if($all_rows > 0){
    $promo_history = $db->FetchAll();

    $num = 0;
    foreach ($promo_history as $promos) {
        $us_dat = $db->FetchArray();
        $data['promo'][$num]['user_id'] = $promos['user_id'];
        $data['promo'][$num]['promo'] = $promos['promo'];
        $data['promo'][$num]['money'] = sprintf('%.02f', $promos['money']);
        $data['promo'][$num]['date'] = date('d.m.y в H:i', $promos['date']);
        $num++;

    }
}else $data['promo'] = '0';
new gen('account/promo', $data);