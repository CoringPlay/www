<?php
$_OPT['title'] = 'Ежечасный бонус';
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

	<style>
   .colortext {
     color: red; /* Красный цвет выделения */
   }
  </style>
  
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 balancep_offset balancep_panel text-center"
                 style="margin-bottom: 15px; margin-top: 5px;">
                <?
                if ($data["form"] == false) {
                    ?>
                    <form action="" method="post">
                        <input type="hidden" name="bonus">
                        <center><button class="btn-radius green-btn" style="border-radius: 8px;">Получить бонус</button></center><br>
                    </form>
                    <? if ($data["success"] != "") {
                        echo '<h2 class="block">' . $data["success"] . '</h2>';
                    }
                } else if ($data['form'] == true) {
                    if ($data["success"] != "") {
                        echo '<h2 class="block">' . $data["success"] . '</h2>';
                    } else {
                        echo '<h2 class="block" style="color: #FFFFFF"" >Ошибка: Вы уже получали ежечасный бонус.';
                    }
                }
                ?>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-6 col-lg-offset-3 balancep_offset balancep_panel">
                <div class="panel block">
                    <div class="panel-heading">
                        <h3 class="panel-title tabletitle">
                            <i class="fa fa-gift"></i> Последние 50 бонусов
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
                                            <th class="text-center">Пользователь</th>
                                            <th class="text-center">Сумма</th>
                                            <th class="text-center">Дата</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        if ($data['bonus'] != '0') {
                                            foreach ($data['bonus'] as $bonus) {
                                                ?>
                                                <tr class="text-center">
                                                    <td><?= $bonus['id']; ?></td>
                                                    <td><?= $bonus['screen_name']; ?></td>
                                                    <td><?= $bonus['sum']; ?> <i class="fa fa-rub" style="color: #f2dc5d;"></i></td>
                                                    <td><?= date('d/m/Y H:i', $bonus['date_add']); ?></td>
                                                </tr>
                                            <?php
                                            }
                                        } else echo '<tr><td>Нет полученных бонусов!</td></tr>';
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


