<?php
/**
* Функции
*/
class func
{
	public static function status($status='success',$text='')
	{
		return json_encode(array('status'=>$status,'text'=>$text));
	}

	public static function clear($data,$type='str')
	{
		$data = trim($data);
		$data = strip_tags($data);
		$data = htmlspecialchars($data);
		$data = ($type == 'str')?strval($data):intval($data);
		return $data;
	}
	public function isMail($mail)
	{
		if(is_array($mail) && empty($mail) && strlen($mail) > 255 && strpos($mail,'@') > 64) return false;
			return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]{2,20}+\.)+[a-z]{2,6}$/ix", $mail)) ? false : strtolower($mail);
	}
	public function isPassword($password)
	{
		if(is_array($password) && empty($password) && strlen($password) > 255) return false;
			return (!preg_match('/(?=^.{7,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/',$password)) ? false : $password;
	}
	public function isUrl($url)
	{
		if(is_array($url) && empty($url) && strlen($url) > 255) return false;
			if (substr($url, 0, 7) == 'http://' || substr($url, 0, 8) == 'https://'){
				return $url;
			}else return false;
	}

	public function IsPayeer($payeer)
	{
		return (!preg_match("/^P[0-9]{4,15}+$/ix", $payeer)) ? false : strtolower($payeer);
	}

    public function IsYandex($yandex)
    {
        return (!preg_match("/^41001[0-9]{9,12}+$/ix", $yandex)) ? false : strtolower($yandex);
    }

    public function IsQiwi($qiwi){
        return (!preg_match("/^\+[0-9]+$/ix", $qiwi)) ? false : strtolower($qiwi);
    }

    public function IsWM($wm){
        return (!preg_match("/^R[0-9]{12}+$/ix", $wm)) ? false : strtolower($wm);
    }

    public function winner_rand($users, $pr)
    {
        if(!is_array($users) || count($users) < 1) return false;
        $sum = 0; $result = null;
        do{
            foreach($users as $i => $data) {
                $sum += $pr[$i];
                if (rand(0, $sum) < $pr[$i]) {
                    $result = $data;
                }
            }
        } while(is_null($result));
        return $result;
    }

}