<?php

if (!empty($url[3]) && intval($url[3])) {
    $id = intval($url[3]);
    $data['id'] = $id;

    $db->Query("SELECT * FROM ticket WHERE id = '{$id}'");
    if ($db->NumRows() > 0) {

        $db->Query("SELECT * FROM ticket WHERE id = '{$id}'");
        $data['ticket'] = $db->FetchArray();

        $db->Query("SELECT * FROM ticket_message WHERE ticket_id = '{$id}' ORDER BY id ASC");
        $data['messages'] = $db->FetchAll();

        $usid = $data['ticket']['user_id'];

        $db->Query("SELECT * FROM users WHERE id = '{$usid}'");
        $data['user'] = $db->FetchArray();

        new gen('admin/ticket', $data);
    } else header('Location: /admin/support');
} else header('Location: /admin/support');