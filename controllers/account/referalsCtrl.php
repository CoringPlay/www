<?php
$data['user_id'] = $user_id;

$data['level'] = $level = (isset($_GET['level']) && intval($_GET['level']) <= 3) ? intval($_GET['level']) : 1;

$select = 'ref_' . $level;
$order = 'to_ref_' . $level;

$selecter = (isset($_GET['sort']) && $_GET['sort'] == 'date') ? "ORDER BY id DESC" : "ORDER BY {$order} DESC";
$sorter = (isset($_GET['sort']) && $_GET['sort'] == 'date') ? 'date' : 'money';

$db->Query("SELECT COUNT(*) FROM users_ref WHERE {$select} = '{$user_id}' {$selecter}");
$all_rows = intval($db->FetchRow());

$per_page = 50;
$sort = (isset($_GET['sort'])) ? $_GET['sort'] : 'money';
$pages = $all_rows / $per_page;
$page = (isset($_GET['page'])) ? func::clear($_GET['page'], 'int') : '1';
$pag = new pag();
$data['pag'] = ($pages > 1) ? $pag->getPages($pages, $page, '/account/referals?sort=' . $sort . '&level=' . $level, '&') : '0';
$start = ($page - 1) * $per_page;

$db->Query("SELECT * FROM users_ref WHERE {$select} = '{$user_id}' {$selecter} LIMIT $start,$per_page");
if ($db->NumRows() > 0) {
    $refs = $db->FetchAll();
    $num = 0;
    foreach ($refs as $usr) {
        $for_search[$num] = $usr['user_id'];
        $money_arr[$usr['user_id']] = $usr['to_ref_' . $level];
        $num++;
    }

    $db->Query("SELECT httpref,user_id FROM users_conf WHERE user_id IN (" . implode(',', $for_search) . ")");
    $data['httprefs'] = $db->FetchAll();
    foreach ($data['httprefs'] as $usr) {
        $httprefs[$usr['user_id']] = $usr['httpref'];
    }

    $db->Query("SELECT uid,screen_name,date_reg,last,id FROM users WHERE id IN (" . implode(',', $for_search) . ")");
    $data['refs'] = $db->FetchAll();
    $num = 0;

    foreach ($data['refs'] as $usr) {
        $data['referals'][$num] = $usr;
        $data['referals'][$num]['money'] = $money_arr[$usr['id']];
        $num++;
    }

    $db->Query("SELECT * FROM users WHERE id IN (" . implode(',', $for_search) . ")");
    $data['refs'] = $db->FetchAll();
    $num = 0;

    foreach ($data['refs'] as $usr) {
        $data['referals'][$num] = $usr;
        $data['referals'][$num]['money'] = $money_arr[$usr['id']];
        $data['referals'][$num]['httpref'] = $httprefs[$usr['id']];
        $num++;
    }

    if ($sorter == 'date') {
        $data['referals'] = array_reverse($data['referals']);
    } else {
        $num = 0;
        foreach ($data['referals'] as $usr) {
            $data['rfs'][$num] = $usr;
            $data['rfs'][$num]['money'] = $money_arr[$usr['id']];
            $num++;
        }

        $sortArr = array();
        foreach ($data['referals'] as $key) {
            $sortArr[$key['id']] = $key['money'];
        }
        array_multisort($sortArr, SORT_DESC, $data['referals']);
    }

} else $data['referals'] = '0';

$db->Query("SELECT (SELECT COUNT(*) FROM users_ref WHERE ref_1 = '{$user_id}') referals_1,
			(SELECT COUNT(*) FROM users_ref WHERE ref_2 = '{$user_id}') referals_2,
			(SELECT COUNT(*) FROM users_ref WHERE ref_3 = '{$user_id}') referals_3,
			(SELECT SUM(to_ref_1) FROM users_ref WHERE ref_1 = '{$user_id}') from_refs_1,
			(SELECT SUM(to_ref_2) FROM users_ref WHERE ref_2 = '{$user_id}') from_refs_2,
			(SELECT SUM(to_ref_3) FROM users_ref WHERE ref_3 = '{$user_id}') from_refs_3");
$data += $db->FetchArray();

$data['from_refs'] = sprintf('%.2f', $data['from_refs_1'] + $data['from_refs_2'] + $data['from_refs_3']);

new gen('account/referals', $data);