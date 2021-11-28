<?php
$_OPT['title'] = 'История операций';
?>

<?
require 'inc/_left_menu.php';
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
            <div class="col-lg-6 col-lg-offset-3 balancep_offset balancep_panel">
                <div class="panel block">
                    <div class="panel-heading">
                        <h3 class="panel-title tabletitle">
                            <i class="fa fa-list-ul"></i> Ваши последнии операции
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th class="text-center">Сумма</th>
                                            <th class="text-center">Проведенная операция</th>
                                            <th class="text-center">Дата</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        if ($data['history'] != '0') {
                                            foreach ($data['history'] as $history) {
                                                ?>
                                                <tr class="text-center">
                                                    <td><b><?= $history['id']; ?></td>
                                                    <td>
                                                        <? if ($history['type'] == 1) { ?>
                                                            <font color="#F2DC5D"><b>- <?= $history['sum']; ?> <i class="fa fa-rub" style="color: #2290FF;"></i></b></font>
                                                        <? } else { ?>
                                                            <font color="#F2DC5D"><b>+ <?= $history['sum']; ?> <i class="fa fa-rub" style="color: #2290FF;"></i></b></font>
                                                        <? } ?>
                                                    </td>
                                                    <td><b>Операция: <?= $history['comment']; ?></td>
                                                    <td><b><?= date('d/m/Y H:i', $history['date_op']); ?></td>
                                                </tr>
                                            <?php
                                            }
                                        } else echo '<tr><td>Вы не совершали ни одной операции!</td></tr>';
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>