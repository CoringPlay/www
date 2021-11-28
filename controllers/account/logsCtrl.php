<?php
$db->Query("SELECT * FROM auth WHERE user_id = '{$user_id}' ORDER BY time DESC LIMIT 10");
if ($db->NumRows() > 0) {
    $data['auth_history'] = $db->FetchAll();
}else $data['auth_history'] = '0';
new gen('account/logs', $data);