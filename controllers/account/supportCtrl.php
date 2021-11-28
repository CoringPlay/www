<?php
$db->Query("SELECT * FROM ticket WHERE user_id = '{$user_id}' ORDER BY id DESC LIMIT 20");
if ($db->NumRows() > 0) {
    $data['ticket'] = $db->FetchAll();
} else $data['ticket'] = '0';
new gen('account/support', $data);
