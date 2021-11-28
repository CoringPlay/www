<?php
$db->Query("SELECT * FROM admin WHERE id = '1'");
$admin_data = $db->FetchArray();
foreach ($_POST as $key => $value) {$$key = func::clear($value);}
if(!empty($pin)){
	if($pin === $admin_data['secret']){
		switch ($config) {

            case 'password':
				if($admin_data['password'] == $old){
					if($new == $confirm){
						$db->Query("UPDATE admin SET login = '{$login}', password = '{$new}' WHERE id = '1'");
					}else {
						echo status('err','Пароли не совпадают');
						return;
					}
				}else {
					echo status('err','Старый пароль не подходит');
					return;
				}
				break;
            case 'per':
                $db->Query("UPDATE config
								SET margin = '{$margin}',
									ref_1 = '{$ref1}',
									ref_2 = '{$ref2}',
									ref_3 = '{$ref3}'
								WHERE id = '1'");
                break;
            case 'bonus':
                if($bonus_min < $bonus_max) {
                    $db->Query("UPDATE config
								SET bonus_min = '{$bonus_min}',
                                    bonus_max = '{$bonus_max}'
								WHERE id = '1'");
                } else {
                    echo status('err','Мин. сумма не должна превышать Макс. суммы');
                    return;
                }
                break;
				
				case 'transfer':
if ($transfer_min < $transfer_max) {
    $db->Query("UPDATE config
				SET margin_transfer = '{$margin_transfer}',
    			    transfer_min = '{$transfer_min}',
                    transfer_max = '{$transfer_max}'
                    WHERE id = '1'");
} else echo status('err', 'Мин. сумма не должна превышать Макс. суммы');
break;


            default:
				echo status('err','Ошибка обновите страницу');
				return;
				break;
		}

		$arr = array('status'=>'success','text'=>'Сохранено');

		$num = 1;

		foreach ($_POST as $key => $value) {$arr['obj'][$num] = array('key'=>$key,'data'=>$value); $num++;}

		echo json_encode($arr);

	}else echo status('err', 'Пин-код неверен');

}else echo status('err', 'Укажите Пин-код');