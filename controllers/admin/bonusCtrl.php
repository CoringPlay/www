<?php
$day = time() - 86400;
$db->Query("SELECT
	(SELECT COUNT(*) FROM users) users,
	(SELECT COUNT(*) FROM users WHERE date_reg > '{$day}') users_day,
	(SELECT SUM(money) FROM inserts WHERE status = '2') insert_m,
	(SELECT SUM(money) FROM payments WHERE status = '2') payment_m,
	(SELECT SUM(money) FROM inserts WHERE status = '2' AND date_op > '{$day}') insert_day,
	
    (SELECT COUNT(*) FROM bonus) bon_bonus,                                     /**на бонусны ежечасный (шт.)**/
	(SELECT COUNT(*) FROM bonus WHERE date_add > '{$day}') bon_bonus_24,        /**на бонусны ежечасный (шт.)(24часа)**/
	(SELECT SUM(sum) FROM bonus ) bon_bon,                                     /**на бонусны ежечасный (руб.)**/
	(SELECT SUM(sum) FROM bonus WHERE  date_add > '{$day}') bon_bon_24,        /**на бонусны ежечасный (руб.)(24часа)**/
	

	
	(SELECT SUM(money) FROM payments WHERE status = '2' AND date_op > '{$day}') payment_day");
$data = $db->FetchArray();

new gen('admin/bonus',$data);