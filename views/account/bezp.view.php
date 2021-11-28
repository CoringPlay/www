<?php
$_OPT['title'] = 'Увеличитель';

?>


<?
require 'inc/_left_menu.php';

$user_id = func::clear($_SESSION['user'],'int');

$uname = $_SESSION["user"];




$db->Query("SELECT * FROM users_conf WHERE user_id = '{$user_id}'");
$user_data = $db->FetchArray();
$data['user'] = $db->FetchArray();

# Настройки бонусов
$amount_lotteryyy = 1; 
$bonus_minii = 0;
$bonus_maxii = 2;

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
<!----третий розыгрыш----->
    <div class="main-content">
        <div class="row">
        	<div class="col-sm-12">
<margin: 0 auto;">
            <div align="center" style="padding: 1px;">
<center><div style="padding: 6px;;

font-size: 18px;
color: #fff;
font-weight: bold;">Шанс победы 50%</div>
              <div class="main-content">
<div style="

background: #282828;">
<center style="
background: #282828;">

<span style="font-size: 16px;color: #fff;font-weight: bold">Ставка</span> <span style="font-size: 18px;
font-weight: bold;
color: #f2dc5d;"><?=$amount_lotteryyy;?> RUB</span></center>
<center style="
background: #282828;
font-size: 14px;
color: #fff;
font-weight: bold;
">Выигрыш от <b style="font-size: 15px;
color: #f2dc5d;"><?=$bonus_minii;?> RUB</b> до <b style="font-size: 15px;
color: #f2dc5d;"><?=$bonus_maxii;?> RUB</b></center>
</div>
<p> </p>
<center>
<form action="" method="post">

<div  class="silver-tachka4ik"> 
<div class="silver-bkloxum">

<?PHP
$ddel = time() + 0*0*0;
$dadd = time();

$db->Query("SELECT COUNT(*) FROM db_bezproigrishaaa WHERE user_id = '$user_id' AND date_del > '$dadd'");
$db->Query("SELECT * FROM users_conf WHERE id = '$user_id' LIMIT 1");

$user_data = $db->FetchArray();
$stavka = intval($user_data["balance"]);
$hide_form = false;

$db->Query("SELECT * FROM users WHERE id = '{$user_id}'");
$info = $db->FetchArray();
$screen_name = $info['screen_name'];


	if($db->FetchRow() == 0){

		# Выдача бонуса
		if(isset($_POST["bonusss"])){
		
	    	if($stavka <= $user_data['balance']) {
		    if($stavka >= 1) {
		
			
			$sum = rand($bonus_minii, rand($bonus_minii, $bonus_maxii) );
			
			
			
			# Зачилсяем юзверю
			$db->Query("UPDATE users_conf SET balance = balance + '$sum' WHERE id = '$user_id'");
			
			# Вносим запись в список бонусов
		
			$db->Query("UPDATE users_conf SET balance = balance - '$amount_lotteryyy' WHERE id = '{$user_id}'");
			$db->Query("INSERT INTO db_bezproigrishaaa (`screen_name`, user, user_id, sum, date_add, date_del) VALUES ('{$screen_name}','$uname','$user_id','$sum','$dadd','$ddel')");
			
			# Случайная очистка устаревших записей
			
			
			echo "<center style='margin-top: 22px;
margin-bottom: 12px;'>

              

			<font style = 'border-radius: 40%;
border: 4px solid #282828;
width: 40px;
height: 40px;
text-align: center;
background: #282828;
padding: 8px;
transition: 5s;
color: #fff;'><b> Вы выйграли:  {$sum} RUB</b></font></center>";

	
			
			$hide_form = false;
			
			
			
			}else echo "<center><font color='red'>Недостаточно средств на балансе!</font>";
			
			}else echo "<center><font color='red'>Недостаточно средств на балансе!</font>";	
		}
		
			
			# Показывать или нет форму
			if(!$hide_form){
?>
</div>







  
 <center style="">  <input type="submit" style="border-radius: 8px;" name="bonusss" class="btn-radius green-btn" value="Ставка 1 RUB" style="width: 25%;margin-top: 5px;"></center>



</form>
</div>
</center>
<?PHP 

			}

	}else echo "<center><font color = 'red'><b>.</b></font></center><BR />"; ?>






	
</div>
			
			
            </div>
        </div>
    </div>
</div>








