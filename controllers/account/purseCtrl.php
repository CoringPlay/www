<?php
$user_id = func::clear($_SESSION['user'],'int');
$db->Query("SELECT * FROM users_conf WHERE user_id = '{$user_id}'");
$data = $db->FetchArray();

new gen('account/purse', $data);