<?php
$_OPT['title'] = 'Статистика';
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
            <div class="col-sm-offset-2 col-sm-8 block">
                <div class="table-responsvie">
                    <table class="table table-hover table-bordered table-hover">
                        <tbody>
                        <tr>
                            <td>Всего пользователей</td>
                            <td><?= $data['users'] ?></td>
                        </tr>
                        <tr>
                            <td>Новых за 24 часа</td>
                            <td><?= ($data['users_day'] > 0) ? $data['users_day'] : 0; ?></td>
                        </tr>
                        <tr>
                            <td>Всего пополнено</td>
                            <td><?= ($data['insert_m'] > 0) ? sprintf('%.02f', $data['insert_m']) : 0; ?></td>
                        </tr>
                        <tr>
                            <td>Всего выведено</td>
                            <td><?= ($data['payment_m'] > 0) ? sprintf('%.02f', $data['payment_m']) : 0; ?></td>
                        </tr>
                        <tr>
                            <td>Пополнено за 24 часа</td>
                            <td><?= ($data['insert_day'] > 0) ? sprintf('%.02f', $data['insert_day']) : 0; ?></td>
                        </tr>
                        <tr>
                            <td>Выведено за 24 часа</td>
                            <td><?= ($data['payment_day'] > 0) ? sprintf('%.02f', $data['payment_day']) : 0; ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>