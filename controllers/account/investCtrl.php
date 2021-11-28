<?php
$user_id = func::clear($_SESSION['user'],'int');

$db->Query("SELECT * FROM users_conf WHERE user_id = '{$user_id}'");
$data = $db->FetchArray();

$db->Query("SELECT * FROM invest WHERE user_id = '{$user_id}' ORDER BY id DESC");
if ($db->NumRows() > 0) {
    $data['invest'] = $db->FetchAll();
} else $data['invest'] = '0';

$data['form'] = false;

$data['success'] = "";
$time = time();
$db->Query("SELECT * FROM invest WHERE user_id = '{$user_id}' AND date_del <= $time AND status = 1 ");
$investing = $db->FetchArray();
$sum = $investing['sum'];
$proc = ($investing['sum']*$investing['pr'])/100;
$money = $sum+$proc;
$id =  $investing['id'];


if (isset($_POST['money_invest'])) {    
if ($data['form'] == false) {
    if($investing['status'] == 1){
    $db->Query("UPDATE users_conf SET balance = balance +'{$money}',win = win +'{$money}' WHERE id = '{$user_id}' ");
     $db->Query("UPDATE invest SET status = 2 WHERE  id = '{$id}' AND user_id = '{$user_id}' AND date_del <= $time ");
    $db->Query("INSERT INTO history (user_id, sum, type, comment, date_op) VALUES ('{$user_id}','{$money}','2','Начисление вклада','{$time}')");
            $data['form'] = true;
            
            $data['success'] = "Депозит " . sprintf('%.02f', $money) . " руб. зачислен!";
           
    }
  }
}

new gen('account/invest', $data);