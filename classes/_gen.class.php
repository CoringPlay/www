<?php
/**
* Генерирует страницу
*/
class gen
{

    public function __construct($view,$data='')
	{

        $scripts = '';//Дефолтная переменная скриптов
		$_OPT['title'] = 'Demo Loto — сервис моментальных лотерей';//Дефолтная переменная тайтл
		$db = new db();

		include 'inc/_header.php';
		include 'views/'.$view.'.view.php';
		include 'inc/_footer.php';

		$func = new func();

		if (isset($_SESSION['user'])) {
			$user_id = $func->clear($_SESSION['user']);
            $db->Query("SELECT * FROM users WHERE id = '{$user_id}'");
            $us_dat = $db->FetchArray();
			$db->Query("SELECT * FROM users_conf WHERE user_id = '{$user_id}'");
			$us_con = $db->FetchArray();
		}

		$content = ob_get_contents();

		ob_end_clean();

		$content = str_replace('{!TITLE!}', $_OPT['title'] , $content);
		$content = str_replace('{!SCRIPTS!}', $scripts , $content);
		if (isset($_SESSION['user'])) {
            $content = str_replace('{!SCREEN_NAME!}', $us_dat['screen_name'] , $content);
            $content = str_replace('{!PHOTO_100!}', $us_dat['photo_100'] , $content);
			$content = str_replace('{!RE_KO!}', sprintf('%.02f', $us_con['reiting']) , $content);
			$content = str_replace('{!BALANCE!}', sprintf('%.02f', $us_con['balance']) , $content);
		}

        echo $content;
	}
}
