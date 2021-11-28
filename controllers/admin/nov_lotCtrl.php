<?php
$day = time() - 86400;
$db->Query("SELECT
	(SELECT COUNT(*) FROM users) users,
	(SELECT COUNT(*) FROM users WHERE date_reg > '{$day}') users_day,
	(SELECT SUM(money) FROM inserts WHERE status = '2') insert_m,
	(SELECT SUM(money) FROM payments WHERE status = '2') payment_m,
	(SELECT SUM(money) FROM inserts WHERE status = '2' AND date_op > '{$day}') insert_day,
	
	
	
(SELECT COUNT(*) FROM db_bezproigrisha ) kol_momental_lot,
	(SELECT COUNT(*) FROM db_bezproigrishaa ) kol_momental_lot_2,
	(SELECT COUNT(*) FROM db_bezproigrishaaa ) kol_momental_lot_3,
	(SELECT COUNT(*) FROM db_bezproigrisha WHERE date_del > '{$day}') kol_momental_lot_sut,
	(SELECT COUNT(*) FROM db_bezproigrishaa WHERE date_del > '{$day}') kol_momental_lot_sut_2,
	(SELECT COUNT(*) FROM db_bezproigrishaaa WHERE date_del > '{$day}') kol_momental_lot_sut_3,
	(SELECT SUM(sum) FROM db_bezproigrisha ) summa_v_vovent,
	(SELECT SUM(sum) FROM db_bezproigrishaa ) summa_v_vovent_2,
	(SELECT SUM(sum) FROM db_bezproigrishaa ) summa_v_vovent_3,
	
	(SELECT SUM(sum) FROM db_bezproigrisha WHERE date_del > '{$day}') summa_v_vovent_24,
	(SELECT SUM(sum) FROM db_bezproigrishaa WHERE date_del > '{$day}') summa_v_vovent_2_24,
	(SELECT SUM(sum) FROM db_bezproigrishaa WHERE date_del > '{$day}') summa_v_vovent_3_24,
	
	
	
	(SELECT SUM(money) FROM payments WHERE status = '2' AND date_op > '{$day}') payment_day");
$data = $db->FetchArray();
$data['sum_momental_lot'] = sprintf($data['kol_momental_lot'] + $data['kol_momental_lot_2'] + $data['kol_momental_lot_3']);
$data['sum_momental_lot_24'] = sprintf($data['kol_momental_lot_sut'] + $data['kol_momental_lot_sut_2'] + $data['kol_momental_lot_sut_3']);

$data['sum_p_lot'] = sprintf($data['kol_momental_lot'] *10);
$data['sum_p_lot_24'] = sprintf($data['kol_momental_lot_sut'] *10);

$data['sum_po_lot'] = sprintf($data['kol_momental_lot_2'] *20);
$data['sum_po_lot_24'] = sprintf($data['kol_momental_lot_sut_2'] *20);

$data['sum_pob_lot'] = sprintf($data['kol_momental_lot_3'] *40);
$data['sum_pob_lot_24'] = sprintf($data['kol_momental_lot_sut_3'] *40);

$data['pr_lot'] = sprintf($data['sum_p_lot'] - $data['summa_v_vovent']);
$data['pr_lot_2'] = sprintf($data['sum_po_lot'] - $data['summa_v_vovent_2']);
$data['pr_lot_3'] = sprintf($data['sum_pob_lot'] - $data['summa_v_vovent_3']);

$data['pr_lot_24'] = sprintf($data['sum_p_lot_24'] - $data['summa_v_vovent_24']);
$data['pr_lot_2_24'] = sprintf($data['sum_po_lot_24'] - $data['summa_v_vovent_2_24']);
$data['pr_lot_3_24'] = sprintf($data['sum_pob_lot_24'] - $data['summa_v_vovent_3_24']);
new gen('admin/nov_lot',$data);