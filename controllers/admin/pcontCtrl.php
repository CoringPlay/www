<?php
$db->Query("SELECT * FROM config_comp WHERE id = '1'");
$configs = $db->FetchArray();

$data['configs'] = $configs;

new gen("admin/pcont", $data);