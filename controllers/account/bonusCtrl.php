<?php
$user_id = func::clear($_SESSION['user'], 'int');

$time = time();
$time_del = time() + 60 * 60 * 1;

$db->Query("SELECT * FROM config WHERE id = '1'");
$config = $db->FetchArray();

$bonus_max = $config['bonus_max'];
$bonus_min = $config['bonus_min'];

$data['form'] = false;

$data['success'] = "";

$db->Query("SELECT * FROM bonus WHERE user_id = '{$user_id}' AND date_del > '{$time}'");
if ($db->NumRows() > 0) {
    $data['form'] = true;
}

function random_float($min, $max)
{
    return ($min + lcg_value() * (abs($max - $min)));
}

$db->Query("SELECT * FROM users WHERE id = '{$user_id}'");
$user_data = $db->FetchArray();

if (isset($_POST["bonus"])) {

    if ($data['form'] == false) {

        $param = array(
            'group_id' => 'money_best_2018',
            'user_id' => $user_data['uid'],
            'v' => '3.0'
        );
   
        $groupInfo = json_decode(file_get_contents('https://api.vk.com/method/groups.isMember' . '?' . urldecode(http_build_query($param))), true);
 
        if ($groupInfo['response'] != 1) {
            $sum = random_float($bonus_min, random_float($bonus_min, $bonus_max));

            $db->Query("SELECT * FROM users WHERE id = '{$user_id}'");
            $info = $db->FetchArray();

            $screen_name = $info['screen_name'];

            $db->Query("UPDATE users_conf SET balance = balance + '{$sum}' WHERE user_id = '{$user_id}'");
            $db->Query("INSERT INTO bonus (user_id, sum, screen_name, date_add, date_del) VALUES ('{$user_id}','{$sum}','{$screen_name}','{$time}','{$time_del}')");

            $db->Query("INSERT INTO history (user_id, sum, type, comment, date_op) VALUES ('{$user_id}','{$sum}','2','Бонус каждый час','{$time}')");

            $data['form'] = true;
            $data['success'] = "Вы получили бонус в размере " . sprintf('%.02f', $sum) . " рублей!";
        } else {
            $data['form'] = false;
            $data['success'] = "<span style='color: red;'>Бонус не получен!</span><br>Для получения бонуса вступите в <a style='text-decoration: underline;
    color: red;' target='_blank' href=''>нашу группу</a>.";
        }

    }

}

$db->Query("SELECT * FROM bonus ORDER BY id DESC LIMIT 50"); 
if ($db->NumRows() > 0) {
    $data['bonus'] = $db->FetchAll();
} else $data['bonus'] = '0';

new gen('account/bonus', $data);