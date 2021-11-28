<?php

class competition
{

    public $db;
    var $compd = array();

    function __construct($db)
    {
        $this->db = $db;
        $this->compd = $this->CompData();
    }

    function CompData()
    {
        $this->db->Query("SELECT * FROM competition WHERE status = '0' LIMIT 1");
        if ($this->db->NumRows() > 0) {
            return $this->db->FetchArray();
        } else return false;
    }

    // П - пользователь
    //

    function UpdatePoints($user_id, $sum)
    {
        $user_id = intval($user_id);
        $sum = round($sum, 2);

        if ($this->compd["date_add"] >= 0 AND $this->compd["date_end"] > time()) {

            $ref_id = $this->getRefId($user_id);
            $ref = $this->getRefName($ref_id);

            if ($ref_id != 0) {
                $this->db->Query("SELECT COUNT(*) FROM competition_users WHERE user_id = '{$ref_id}'");
                if ($this->db->FetchRow() == 1) {
                    $this->db->Query("UPDATE competition_users SET points = points + '{$sum}' WHERE user_id = '{$ref_id}'");
                } else $this->db->Query("INSERT INTO competition_users (user, user_id, points) VALUES ('{$ref}','{$ref_id}','{$sum}')");
                return true;
            } else return false;
        } else return false;

    }

    function getRefName($user_id)
    {
        $this->db->Query("SELECT screen_name FROM users WHERE id = '{$user_id}'");
        return $this->db->FetchRow();
    }

    function getRefId($user_id)
    {
        $this->db->Query("SELECT ref_1 FROM users_ref WHERE user_id = '{$user_id}'");
        return $this->db->FetchRow();
    }

}