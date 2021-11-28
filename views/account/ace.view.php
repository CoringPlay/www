<?php

$_OPT['title'] = 'Поиск клада';



?>





<?

require 'inc/_left_menu.php';



$user_id = func::clear($_SESSION['user'],'int');



$uname = $_SESSION["user"];









$db->Query("SELECT * FROM users_conf WHERE user_id = '{$user_id}'");

$user_data = $db->FetchArray();

$data['user'] = $db->FetchArray();



$db->Query("SELECT * FROM config_kart WHERE id = '1'");

$config = $db->FetchArray();



# Настройки 

$kol_kl = 10; 

$pobeda = $config['pobeda']; 





?>



<div class="col-lg-10 col-md-9 col-sm-9 col-xs-12">
    <div class="main-title">
        <div class="row">
            <div class="col-sm-12">
                <div class="text-left">
                    <h2>{!TITLE!}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content">
        <div class="row">
            <div class="col-sm-12">

<?PHP

  $db->Query("SELECT * FROM users WHERE id = '{$user_id}'");

$info = $db->FetchArray();

$screen_name = $info['screen_name'];



$db->Query("SELECT * FROM users_conf WHERE user_id = '$user_id'");

$user_data = $db->FetchArray();

if (isset($_POST['stavka'])) {

$naper = intval($_POST['naper']);

$stavka = intval($_POST['stavka']);

$nap = rand(1,3);

$time = time();

		if($stavka <= $user_data['balance']) {

			if($stavka = $kol_kl) {

				if($naper == 1 or $naper ==  2 or $naper == 3) {

					if($naper == $nap) {

					$sum = $stavka*2;

					$win = 1;

						echo "<center><div><font color='#1afb0b' style='font-size: 22px;font-weight: bold;'>Вы нашли сокровище!</font></div>";

						

						$db->Query("UPDATE users_conf SET balance = balance + '$sum' where id = '$user_id'");

						

						$db->Query("INSERT INTO db_ace (user_id, login, date, summa, win,`screen_name`) VALUES ('$user_id', '$uname', '$time', '$sum', '$win','{$screen_name}')");

						

					} else {

						echo "<center><div><font color='red' style='font-size: 22px;font-weight: bold;'>Сундук пустой!</font></div>";

						$win = 0;

						$db->Query("UPDATE users_conf SET balance = balance - '$stavka' where id = '$user_id'");

						$db->Query("INSERT INTO db_ace (user_id, login, date, summa, win,`screen_name`) VALUES ('$user_id', '$uname', '$time', '$stavka', '$win','{$screen_name}')");

					}

				}else echo "<center><font color='red' style='font-size: 22px;font-weight: bold;'>Ошибка: выберите сундук!</font>";

			}else echo "<center><font color='red'></font>";

		}else echo "<center><font color='red' style='font-size: 22px;font-weight: bold;'>Ошибка: недостаточно средств!</font>";

}

?>





<BR />


<center>
    <h3><strong>Правила игры:</strong></h3>
    <b style="font-size: 18px;"><p>Ваша задача, выбрать сундук с сокровищем.</p>
    <p>В одном из сундуков лежит 20 RUB!</p><br>
    <p>Стоимость игры: 10 RUB</p></b>

</center>

</center>



<center>



<form method="post" action="">



<input class="poilop" type="text" style="border: 1px solid;

    color: #fff0;

    background: #ffffff03;

    width: 1%;

    text-align: center;" name="stavka" value="<?=$kol_kl;?>"><br>

<center>



<table align="center">

<tr >

<td>

<?php









if ($win == 1 and $naper == 1) {

?>

<img src="/img/sun2.png" style="margin: 7px;">

<? } else { ?>

<img src="/img/sun1.png"  style="margin: 7px;">

<? } ?>

</td>


<td >

&nbsp;

</td>

<td >


<?php

if ($win == 1 and $naper == 2) {

?>

<img src="/img/sun2.png" style="margin: 7px;">

<? } else { ?>

<img src="/img/sun1.png"  style="margin: 7px;">

<? } ?>

</td>


<td >
&nbsp;

</td>

<td>

<?php

if ($win == 1 and $naper == 3) {

?>

<img src="/img/sun2.png"  style="margin: 7px;">

<? } else { ?>

<img src="/img/sun1.png"  style="margin: 7px;">

<? } ?>

</td>



</tr>





<tr>

<td >

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="naper" value="1">

</td>

<td >

&nbsp;

</td>

<td >

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="naper" value="2">

</td>

<td >

&nbsp;

</td>

<td >

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="naper" value="3">

</td>



</tr>



</table>

</center>

<br>

<input style=" border-radius: 8px;   height: 35px;

    width: 40%;

    min-width: 260px;" class="btn-radius green-btn" type="submit" value="Играть">

</form>