<?php

$db->Query("SELECT * FROM history WHERE user_id = '{$user_id}' ORDER BY id DESC LIMIT 20");
if ($db->NumRows() > 0) {
    $data['history'] = $db->FetchAll();
} else $data['history'] = '0';

new gen('account/history', $data);