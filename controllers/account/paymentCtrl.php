<?php
$user_id = func::clear($_SESSION['user'],'int');
$db->Query("SELECT * FROM users_conf WHERE user_id = '{$user_id}'");
$data['user'] = $db->FetchArray();

$db->Query("SELECT * FROM payments WHERE user_id = '{$user_id}' ORDER BY id DESC");
if ($db->NumRows() > 0) {
    $data['payments'] = $db->FetchAll();
} else $data['payments'] = '0';
$data['status'] = true;

$db->Query("SELECT * FROM config_pay WHERE id = '1'");
$configs = $db->FetchArray();
$data['configs'] = $configs;

new gen('account/payment', $data);