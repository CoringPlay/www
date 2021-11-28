<?php
$db->Query("SELECT login FROM admin WHERE id = '1'");
$login = $db->FetchRow();
$db->Query("SELECT * FROM config WHERE id = '1'");
$configs = $db->FetchArray();
$data['configs'] = $configs;
$data['configs']['admin_login'] = $login;
new gen('admin/settings',$data);