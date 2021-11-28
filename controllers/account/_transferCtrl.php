<?php
foreach ($_POST as $key => $value) {
    $$key = func::clear($value);
}

$db->Query("SELECT * FROM config WHERE id = '1'");
$conf = $db->FetchArray();
$set = new pconf();

$min = $conf['transfer_min'];
$max = $conf['transfer_max'];

$comm = $conf['margin_transfer'] / 100;


$db->Query("SELECT * FROM users WHERE id = '{$user_id}'");
$user = $db->FetchArray();

switch($transfer){
    case 'send':
        if (isset($_POST['money']) && !empty($_POST['money'])) {

            $money = mysql_escape_string(htmlspecialchars(strip_tags($_POST['money'])));
            $money = floatval(sprintf('%.02f', $money));

            if ($money >= $min) {
                if ($money <= $max) {

                    if (floatval(sprintf('%.02f', $user_data['balance'])) >= floatval($money)) {

                        if (isset($_POST['userid']) && !empty($_POST['userid'])) {

                            if (intval($_POST['userid']) != $user_id) {

                                $transfer = intval($_POST['userid']);

                                $db->Query("SELECT id FROM users WHERE id = '{$transfer}'");

                                if ($db->NumRows() > 0) {

                                    $sum = $money * $comm;
                                    $sum_transfer = $money - $sum;

                                    $db->Query("SELECT * FROM users WHERE id = '{$transfer}'");
                                    $userInfo = $db->FetchArray();

                                    $db->Query("UPDATE users_conf SET balance = balance - '{$money}' WHERE user_id = '{$user_id}'");
                                    $db->Query("INSERT INTO history (user_id, sum, type, comment, date_op) VALUES ('{$user_id}','{$money}','1','Перевод пользователю " . $userInfo['screen_name'] . "','{$time}')");

                                    $db->Query("UPDATE users_conf SET balance = balance + '{$sum_transfer}' WHERE user_id = '{$transfer}'");
                                    $db->Query("INSERT INTO history (user_id, sum, type, comment, date_op) VALUES ('{$transfer}','{$sum_transfer}','2','Перевод от пользователя " . $user['screen_name'] . "','{$time}')");

                                    $db->Query("INSERT INTO transfer_history (user_id, to_user, from_user, money, date_op) VALUES ('{$user_id}','{$transfer}','{$user_id}','{$sum_transfer}','{$time}')");

                                    echo status('success', 'Перевод успешно выполнен!');

                                } else echo status('err', 'Пользователь с таким ID не найден!');

                            } else echo status('err', 'Самому себе нельзя переводить!');

                        } else echo status('err', 'Укажите ID получателя!');

                    } else echo status('err', 'У вас недостаточно денег');

                } else echo status('err', 'Максимальная сумма перевода ' . $max . ' руб.');

            } else echo status('err', 'Минимальная сумма перевода ' . $min . ' руб.');

        } else echo status('err', 'Укажите сумму перевода!');
        break;

    case 'setting':
        echo status('err', $set->$param);
        break;
}