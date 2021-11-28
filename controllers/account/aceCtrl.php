<?php
$db->Query("SELECT * FROM users_conf WHERE user_id = '{$user_id}'");
$user_data = $db->FetchArray();
$data['user'] = $db->FetchArray();
new gen('account/ace', $data);