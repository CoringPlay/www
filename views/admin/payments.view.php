<?php
$_OPT['title'] = 'Выплаты';
require 'views/subs/_admin_leftbar.php';
?>

<div class="col-sm-10">
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
                <div class="table-responsive block">
                    <table class="table table-hover table-bordered table-hover">
                        <thead>
                        <tr>
                            <td>ID</td>
                            <td>Пользователь</td>
                            <td>Платежная система</td>
                            <td>Кошелек</td>
                            <td>Сумма</td>
                            <td>Сумма с комм.</td>
                            <td>Дата</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        $pay = array('1' => 'PAYEER', '2' => 'Яндекс.Деньги', '3' => 'QIWI Wallet', '4' => 'WebMoney');
                        $paycm = array('1' => $data['configs']['p_coms'], '2' => $data['configs']['ym_coms'], '3' => $data['configs']['qw_coms'], '4' => $data['configs']['wm_coms']);

                        if($data['payments'] != '0'){
                            foreach ($data['payments'] as $payment) {

                                $prc = (100 - $paycm[$payment['pay_sys']]) / 100;

                                ?>
                                <tr>
                                    <td><?=$payment['id'];?></td>
                                    <td>
                                        <a href="/admin/user/<?=$payment['user_id'];?>"><?=$payment['user'];?></a>
                                    </td>
                                    <td><?= $pay[$payment['pay_sys']]; ?></td>
                                    <td><?=$payment['purse'];?> <i class="fa fa-credit-card"></i></td>
                                    <td><?=$payment['money'];?> <i class="fa fa-rouble"></i></td>
                                    <td><?=$payment['money'] * $prc;?> <i class="fa fa-rouble"></i></td>
                                    <td><?=$payment['date'];?></td>
                                </tr>
                            <?php
                            }
                        }else echo '<tr><td>Нет выплат</td></tr>';
                        ?>
                        </tbody>
                    </table>
                </div>
                <?php
                if($data['pag'] != '0'){
                    ?>
                    <center>
                        <ul class="pagination"><?=$data['pag'];?></ul>
                    </center>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>