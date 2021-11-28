<?php
if (!empty($url[3]) && intval($url[3])) {
    $id = intval($url[3]);
    $data['id'] = $id;

    $db->Query("SELECT * FROM ticket WHERE id = '{$id}' AND user_id = '{$user_id}'");
    if ($db->NumRows() > 0) {

        $db->Query("SELECT * FROM ticket WHERE id = '{$id}' AND user_id = '{$user_id}'");
        $data['ticket'] = $db->FetchArray();

        $db->Query("SELECT * FROM ticket_message WHERE ticket_id = '{$id}' ORDER BY id ASC");
        $data['messages'] = $db->FetchAll();

        $db->Query("SELECT * FROM users WHERE id = '{$user_id}'");
        $data['user'] = $db->FetchArray();

        new gen('account/ticket', $data);

    } else header('Location: /account/support');
} else header('Location: /account/support');