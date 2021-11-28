<?php
$_OPT['title'] = 'История входов';
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
                            <i class="fa fa-history"></i> Ваши последние авторизации
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th class="text-center">Дата</th>
                                            <th class="text-center">IP</th>
                                            <th class="text-center">Браузер</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        if ($data['auth_history'] != '0') {

                                            foreach ($data['auth_history'] as $block) {
                                                ?>
                                                <tr class="text-center">
                                                    <td><?= date('Y/m/d H:i', $block['time']); ?></td>
                                                    <td><?= $block['ip']; ?></td>
                                                    <td><?= $block['meta']; ?></td>
                                                </tr>
                                            <?php
                                            }
                                        } else echo '<tr><td style="color:#FF043B">Ошибка: Нет авторизаций.</td></tr>';
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-striped">
                        <thead>
                        <tr>
                            <td>Дата</td>
                            <td>Браузер</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
            /*                        foreach ($data['auth_history'] as $block) {
                                        */ ?>
                            <tr>
                                <td><? /*= date('Y/m/d H:i', $block['time']); */ ?></td>
                                <td><? /*= $block['meta']; */ ?></td>
                            </tr>
                        <?php
            /*                        }
                                    */ ?>
                        </tbody>
                    </table>
                </div>
            </div>
-->        </div>
    </div>
</div>