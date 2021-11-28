<?php
$day = time() - 86400;
$db->Query("SELECT
	(SELECT COUNT(*) FROM users) users,
	(SELECT COUNT(*) FROM users WHERE date_reg > '{$day}') users_day,
	(SELECT SUM(money) FROM inserts WHERE status = '2') insert_m,
	(SELECT SUM(money) FROM payments WHERE status = '2') payment_m,
	(SELECT SUM(money) FROM inserts WHERE status = '2' AND date_op > '{$day}') insert_day,
	(SELECT COUNT(*) FROM db_coupon WHERE  activity = '1') kol_aksii,
	(SELECT SUM(type_coupon) FROM db_coupon WHERE  activity = '1') sum_aks,
	(SELECT SUM(moneyback) FROM db_coupon WHERE  activity = '1') itog_sum_aks,
	(SELECT COUNT(*) FROM db_coupon WHERE  activity = '0') prodan_kol_aksii,
	(SELECT COUNT(*) FROM db_bezproigrisha ) kol_momental_lot,
	(SELECT COUNT(*) FROM db_bezproigrishaa ) kol_momental_lot_2,
	(SELECT COUNT(*) FROM db_bezproigrishaaa ) kol_momental_lot_3,
	(SELECT COUNT(*) FROM db_bezproigrisha WHERE date_del > '{$day}') kol_momental_lot_sut,
	(SELECT COUNT(*) FROM db_bezproigrishaa WHERE date_del > '{$day}') kol_momental_lot_sut_2,
	(SELECT COUNT(*) FROM db_bezproigrishaaa WHERE date_del > '{$day}') kol_momental_lot_sut_3,
	(SELECT SUM(sum) FROM db_bezproigrisha ) summa_v_vovent,
	(SELECT SUM(sum) FROM db_bezproigrishaa ) summa_v_vovent_2,
	(SELECT SUM(sum) FROM db_bezproigrishaa ) summa_v_vovent_2,
	(SELECT COUNT(*) FROM db_klad ) kol_klad_24,
	(SELECT SUM(summa) FROM db_klad ) summa_vyigr_klad,
	(SELECT COUNT(*) FROM db_klad WHERE  summa > '0') naideno_klad,
	(SELECT COUNT(*) FROM db_klad WHERE  summa = '0') pustoi_klad,
	
	
	(SELECT SUM(money) FROM payments WHERE status = '2' AND date_op > '{$day}') payment_day");
$data = $db->FetchArray();
$data['sum_momental_lot'] = sprintf($data['kol_momental_lot'] + $data['kol_momental_lot_2'] + $data['kol_momental_lot_3']);
$data['sum_momental_lot_24'] = sprintf($data['kol_momental_lot_sut'] + $data['kol_momental_lot_sut_2'] + $data['kol_momental_lot_sut_3']);
$data['sum_v_moment'] = sprintf($data['summa_v_vovent'] + $data['summa_v_vovent_2'] + $data['summa_v_vovent_2']);
$data['sum_p_klad'] = sprintf($data['kol_klad_24'] * 2);
new gen('admin/admin',$data);