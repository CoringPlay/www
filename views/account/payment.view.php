<?php
$_OPT['title'] = 'Вывод средств';
?>

<?
require 'inc/_left_menu.php';
?>

<div class="col-lg-10 col-md-9 col-sm-9 col-xs-12">
    <div class="main-title">
        <div class="row">
            <div class="col-sm-12">
                <div class="text-left">
                    <h2 style="text-align: center;">Заказ выплаты</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content">
        <div class="row">

            <div class="col-sm-6 col-lg-3">
                <div class="panel text-center block">
                    <div class="panel-body">
                        <img class="balancei_psimg" src="/img/ps/pb_logo.png">

                        <form class="balancei_form">
                            <div class="form-group">
                                <button type="button" onclick="changePS(1);" class="btn-radius red-btn" style="width: 100%; border-radius: 8px;" data-toggle="modal"
                                        data-target="#paymodal" <? if ($data['configs']['p_pay_type'] == 3) {
                                    echo "disabled";
                                } ?>>
                                    <i class="fa fa-credit-card"></i>
                                    <? if ($data['configs']['p_pay_type'] == 3) {
                                        echo "Временно недоступно";
                                    } else {
                                        echo "Заказать выплату";
                                    } ?>
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="panel text-center block">
                    <div class="panel-body">
                        <img class="balancei_psimg" src="/img/ps/ym_logo.png">

                        <form class="balancei_form">
                            <div class="form-group">
                                <button type="button" onclick="changePS(2);" class="btn-radius red-btn" style="width: 100%; border-radius: 8px;" data-toggle="modal"
                                        data-target="#paymodal" <? if ($data['configs']['ym_pay_type'] == 3) {
                                    echo "disabled";
                                } ?>>
                                    <i class="fa fa-credit-card"></i>
                                    <? if ($data['configs']['ym_pay_type'] == 3) {
                                        echo "Временно недоступно";
                                    } else {
                                        echo "Заказать выплату";
                                    } ?>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="panel text-center block">
                    <div class="panel-body">
                        <img class="balancei_psimg" src="/img/ps/qiwi_logo.png">

                        <form class="balancei_form">
                            <div class="form-group">
                                <button type="button" onclick="changePS(3);" class="btn-radius red-btn" style="width: 100%; border-radius: 8px;" data-toggle="modal"
                                        data-target="#paymodal" <? if ($data['configs']['qw_pay_type'] == 3) {
                                    echo "disabled";
                                } ?>>
                                    <i class="fa fa-credit-card"></i>
                                    <? if ($data['configs']['qw_pay_type'] == 3) {
                                        echo "Временно недоступно";
                                    } else {
                                        echo "Заказать выплату";
                                    } ?>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="panel text-center block">
                    <div class="panel-body">
                        <img class="balancei_psimg" src="/img/ps/wm_logo.png">

                        <form class="balancei_form">
                            <div class="form-group">
                                <button type="button" onclick="changePS(4);" class="btn-radius red-btn" style="width: 100%; border-radius: 8px;" data-toggle="modal"
                                        data-target="#paymodal" <? if ($data['configs']['wm_pay_type'] == 3) {
                                    echo "disabled";
                                } ?>>
                                    <i class="fa fa-credit-card"></i>
                                    <? if ($data['configs']['wm_pay_type'] == 3) {
                                        echo "Временно недоступно";
                                    } else {
                                        echo "Заказать выплату";
                                    } ?>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-lg-6 col-lg-offset-3 balancep_offset balancep_panel">
                <div class="panel block">
                    <div class="panel-heading">
                        <h3 class="panel-title tabletitle">
                            <i class="fa fa-list-ul"></i> Ваши последние выплаты
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">

                            <div class="col-xs-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th class="text-center">Дата выплаты</th>
                                            <th class="text-center">Сумма выплаты</th>
                                            <th class="text-center">Платежная система</th>
                                            <th class="text-center">Реквизиты</th>
                                            <th class="text-center">Статус</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        if ($data['payments'] != '0') {
                                            foreach ($data['payments'] as $payment) {
                                                $pay = array('1' => 'PAYEER', '2' => 'Яндекс.Деньги', '3' => 'QIWI Wallet', '4' => 'WebMoney');
                                                $status = array('1' => '<span class="status-wait">В обработке</span>', '2' => '<span class="status-good">Выплачено</span>', '3' => '<span class="status-bad">Отказано</span>');
                                                ?>
                                                <tr class="text-center">
                                                    <td><?= date('d/m/Y в H:i', $payment['date_op']); ?></td>
                                                    <td><?= $payment['money']; ?> руб.</td>
                                                    <td><?= $pay[$payment['pay_sys']]; ?></td>
                                                    <td><?= $payment['purse']; ?></td>
                                                    <td><?= $status[$payment['status']]; ?></td>
                                                </tr>
                                            <?php
                                            }
                                        } else echo '<tr><td>Вы не заказывали выплат</td></tr>';
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

    <div id="paymodal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog balancep_modalwidth">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Форма заказа выплаты</h4>
                </div>
                <form class="balancei_form">
                    <div class="modal-body">
                        <div class="balancep_modaling">
                            <img id="imgid" src="/img/ps/wm_logo.png">
                        </div>

                        <hr class="balancep_hr">

                 <b><p class="text-center red-text">Среднее время обработки заявки — 5 минут.</p>       



                        <hr class="balancep_hr">

                        <h5 class="balancep_h5">Мин. сумма: <span >10 RUB</span></h5>
						<h5 class="balancep_h5">Макс. сумма: <span >1000 RUB</span></h5>
                        <h5 class="balancep_h5">Комиссия: <span id="coms"></span></h5>
                        <h5 class="balancep_h5">Формат кошелька: <span id="format"></span></h5>
                        <hr class="balancep_hr">
                        <div class="form-group">
                            <input id="getsum" type="text" autocomplete="off"
                                   class="form-control balancei_input insert_new_input" onkeyup="upSum()" maxlength="10"
                                   placeholder="Введите сумму выплаты... (RUB)" required="">
                        </div>
                        <div class="form-group">
                            <input id="nprs" type="text" class="form-control balancei_input insert_new_input"
                                   disabled="">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control balancei_input insert_new_input"
                                   style="background-color: #fff8be;color: rgb(170, 117, 13);border: none;box-shadow: inset 0 0 4px #e0d158;text-shadow: 1px 1px 0 #fffce4;"
                                   id="scms" value="Вы получите с учетом комиссии: 0.00" disabled="">
                        </div>
                    </div>
                    <div class="modal-footer" style="border-top: 1px solid #f8f8f8;">
                        <button type="button" onclick="sendMoney()"  style="width: 100%;" class="btn-radius green-btn"
                                style="margin-top: 0;margin-bottom: 15px;">Создать заявку
                        </button>
						
	


                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

</div>

<script>
    var nowid = 0;

    var imgs = ["pb_logo", "ym_logo", "qiwi_logo", "wm_logo"];

    var coms = [<?=$data['configs']['p_coms'];?>, <?=$data['configs']['ym_coms'];?>, <?=$data['configs']['qw_coms'];?>, <?=$data['configs']['wm_coms'];?>];

    var exmpl = ["P1000000", "410011499718000", "+793155XXXX", "1111222233334444"];

    function changePS(id) {
        nowid = id;
        $("#imgid").attr("src", "/img/ps/" + imgs[(id - 1)] + ".png");

        if (id == 1) {
            $("#minsum").html("<?=$data['configs']['p_min_pay'];?> руб.");
        }
        else if (id == 2) {
            $("#minsum").html("<?=$data['configs']['ym_min_pay'];?> руб.");
        } else if (id == 3) {
            $("#minsum").html("<?=$data['configs']['qw_min_pay'];?> руб.");
        } else if (id == 4) {
            $("#minsum").html("<?=$data['configs']['wm_min_pay'];?> руб.");
        }

//        $("#maxsum").html("15000 руб.");

        $("#coms").html(coms[(id - 1)] + "%");

        $("#format").html(exmpl[(id - 1)]);

        if (id == 1) {
            <? if($data['user']['payeer'] != "0"){ ?>
            $("#nprs").val("<?=$data['user']['payeer'];?>");
            <? } else { ?>
            $("#nprs").val("Привяжите свой кошелек в личном кабинете!");
            <? } ?>
        }
        else if (id == 2) {
            <? if($data['user']['yandex'] != "0"){ ?>
            $("#nprs").val("<?=$data['user']['yandex'];?>");
            <? } else { ?>
            $("#nprs").val("Привяжите свой кошелек в личном кабинете!");
            <? } ?>
        }
        else if (id == 3) {
            <? if($data['user']['qiwi'] != "0"){ ?>
            $("#nprs").val("<?=$data['user']['qiwi'];?>");
            <? } else { ?>
            $("#nprs").val("Привяжите свой кошелек в личном кабинете!");
            <? } ?>
        }
        else if (id == 4) {
            <? if($data['user']['webmoney'] != "0"){ ?>
            $("#nprs").val("<?=$data['user']['webmoney'];?>");
            <? } else { ?>
            $("#nprs").val("Привяжите свой кошелек в личном кабинете!");
            <? } ?>
        }
    }

    function upSum() {
        var prc = (100 - coms[(nowid - 1)]) / 100;
        scmss = number_format($("#getsum").val() * prc, 2);
         $("#scms").val(+ scmss);
		
    }

    function sendMoney() {
        $.ajax({
            url: "/ajax",
            type: "POST",
            data: {type: 'user', user: 'payment', ps: nowid, money: $("#scms").val(), kom: $("#getsum").val(), purse: $("#purse").val()},
            dataType: "json",
            success: function (res) {
                if (res.status == "success") {
                    swal({
						
                        type: "success",
                        title: "Отлично!",
                        text: res.text,
                        timer: 5000
                    });
                } else {
                    swal({
                        type: "warning",
                        title: "Ошибка!",
                        text: res.text,
                        timer: 5000,
                        showConfirmButton: true
                    });
                }
            }
        });
    }

    function number_format(number, decimals, dec_point, thousands_sep) {
        var i, j, kw, kd, km;
        // input sanitation & defaults
        if (isNaN(decimals = Math.abs(decimals))) {
            decimals = 2;
        }
        if (dec_point == undefined) {
            dec_point = ".";
        }
        if (thousands_sep == undefined) {
            thousands_sep = " ";
        }
        i = parseInt(number = (+number || 0).toFixed(decimals)) + "";
        if ((j = i.length) > 3) {
            j = j % 3;
        } else {
            j = 0;
        }
        km = (j ? i.substr(0, j) + thousands_sep : "");
        kw = i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands_sep);
        //kd = (decimals ? dec_point + Math.abs(number - i).toFixed(decimals).slice(2) : "");
        kd = (decimals ? dec_point + Math.abs(number - i).toFixed(decimals).replace(/-/, 0).slice(2) : "");
        return km + kw + kd;
    }
</script>