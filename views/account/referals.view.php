<?php
$_OPT['title'] = 'Мои рефералы';

$ref_link = 'http://' . $_SERVER['HTTP_HOST'] . '/i/' . $data['user_id'];
$bann_link = 'http://' . $_SERVER['HTTP_HOST'] . '/img/banners/468x60.gif';
$bann_link2 = 'http://' . $_SERVER['HTTP_HOST'] . '/img/banners/200x300.gif';
$bann = htmlspecialchars('<a href="' . $ref_link . '"><img src="' . $bann_link . '"></a>');
$bann2 = htmlspecialchars('<a href="' . $ref_link . '"><img src="' . $bann_link2 . '"></a>');
?>

<?
require 'inc/_left_menu.php';
?>

<div class="col-lg-10 col-md-9 col-sm-9 col-xs-12">
    <div class="main-title">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="text-left">
                    <h2>{!TITLE!}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content col-xs-12">
        <div class="row">
            <div class="col-sm-6 col-lg-6 col-xs-12">
                <div class="panel text-center block">
                    <div class="panel-heading">
                        <img src="<?= $bann_link; ?>" style="margin-bottom: 10px;">
                        <br>
                        <input type="text" value="<?= $bann; ?>" class="form-control">
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <img src="<?= $bann_link2; ?>" style="margin-bottom: 10px;">
                            <br>
                            <input type="text" value="<?= $bann2; ?>" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-6 col-xs-12">
                <div class="panel text-center block">
                    <div class="panel-heading">
                    </div>
                    <div class="panel-body">
                        <h4 class="panel-title">Реферальная ссылка:</h4>

                        <h2 class="ref_link"><input type="text" value="<?= $ref_link; ?>" class="form-control"></h2>
                        <br>
							<b>Доход от рефералов 1 уровня: 5% от каждой ставки.<b><br>
							<b>Доход от рефералов 2 уровня: 2% от каждой ставки.<b><br>
							<b>Доход от рефералов 3 уровня: 1% от каждой ставки.<b><br>

							<br>
                        <div class="text-center">
                            <h4 class="panel-title">Кол-во рефералов (1 ур.)</h4>

                            <h2><b><?= $data['referals_1']; ?> чел.</b></h2>
                            <h4 class="panel-title">Кол-во рефералов (2 ур.)</h4>

                            <h2><b><?= $data['referals_2']; ?> чел.</b></h2>
                            <h4 class="panel-title">Кол-во рефералов (3 ур.)</h4>

                            <h2><b><?= $data['referals_3']; ?> чел.</b></h2>
							
                        </div>
                        <br>
                        <h4 class="text-center">Доход с рефералов</h4>

                        <h2><b><?= sprintf('%.02f', $data['from_refs']); ?> <i class="fa fa-rub" style="color: #f2dc5d;"></i></b></h2>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-lg-6 col-lg-offset-3 balancep_offset balancep_panel col-xs-12 col-xs-offset-0">
                <div class="panel block">
                    <div class="panel-heading">
                        <h3 class="panel-title tabletitle">
                            <i class="fa fa-users"></i> Список ваших рефералов
                        </h3>

                        <div class="ref-link text-center">
                            <a class="btn btn-enter <?= ($data['level'] == 1) ? 'active' : ''; ?>"
                               href="/account/referals?level=1">Первый уровень</a>
                            <a class="btn btn-enter <?= ($data['level'] == 2) ? 'active' : ''; ?>"
                               href="/account/referals?level=2">Второй уровень</a>
                            <a class="btn btn-enter <?= ($data['level'] == 3) ? 'active' : ''; ?>"
                               href="/account/referals?level=3">Третий уровень</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th class="text-center">Имя Фамилия</th>
                                            <th class="text-center">Принес прибыли</th>
                                            <th class="text-center">Дата регистрации</th>
                                            <th class="text-center">Откуда пришел</th>
                                            <th class="text-center">Последняя активность</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        if ($data['referals'] != '0') {
                                            foreach ($data['referals'] as $ref) {
                                                ?>
                                                <tr class="text-center">
                                                    <td><?= $ref['id']; ?></td>
                                                    <td><a target="_blank"
                                                           href="https://vk.com/id<?= $ref['uid']; ?>"><?= $ref['screen_name']; ?></a>
                                                    </td>
                                                    <td><?= $ref['money']; ?> <i class="fa fa-rub" style="color: #f2dc5d;"></i></td>
                                                    <td><?= date('d/m/Y H:i', $ref['date_reg']); ?></td>
                                                    <td><?= ($ref['httpref'] != '0') ? $ref['httpref'] : 'Неизвестно'; ?></td>
                                                    <td><?= date('d/m/Y H:i', $ref['last']); ?></td>
                                                </tr>
                                            <?php
                                            }
                                        } else echo '<tr><td>У вас нет рефералов ' . $data["level"] . ' уровня</td></tr>';
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php
                                if ($data['pag'] != '0') {
                                    ?>
                                    <div class="col-md-12">
                                        <center>
                                            <ul class="pagination"><?= $data['pag']; ?></ul>
                                        </center>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>