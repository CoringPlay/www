<?php
$_OPT['title'] = 'Пополнить баланс';
?>

<?
require 'inc/_left_menu.php';

$func = new func();
$config = new config();

$user_id = $func::clear($_SESSION['user']);
?>

<div class="col-lg-10 col-md-9 col-sm-9 col-xs-12">
    <div class="main-title">
        <div class="row">
            <div class="col-sm-12">
                <div class="text-left">
                    <h2>Пополнение баланса</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content">

        <div class="row text-center">
            <h3>СПОСОБЫ ПОПОЛНЕНИЯ:</h3>
        </div>

        <div class="row">

            <div class="col-sm-offset-2 col-sm-4 col-lg-4">
                <div class="panel text-center block">
                    <div class="panel-body">
                        <img class="balancei_psimg" src="/img/ps/pb_logo.png">

                        <form class="balancei_form">
                            <div class="form-group">
                                <input name="sum" value="20" type="text" class="form-control" maxlength="9"
                                       placeholder="Введите сумму пополнения... (RUB)" required="">
                            </div>
                            <div class="form-group m-b-0">
                                <input type="hidden" name="type" value="user">
                                <input type="hidden" name="user" value="insert">
                                <input type="hidden" name="insert" value="payeer">
                                <button class="btn-radius green-btn" style="border-radius: 8px;">Пополнить</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="col-sm-4 col-lg-4">
                <div class="panel text-center block">
                    <div class="panel-body p-t-20">
                        <img class="balancei_psimg" src="/img/ps/fk_logo.png">

                        <form class="balancei_form" method="post">
                            <div class="form-group">
                                <input name="sum" value="20" type="text" class="form-control" maxlength="9"
                                       placeholder="Введите сумму пополнения... (RUB)" required="">
                            </div>
                            <div class="form-group m-b-0">
                                <input type="hidden" name="type" value="user">
                                <input type="hidden" name="user" value="insert">
                                <input type="hidden" name="insert" value="fkassa">
                                <button class="btn-radius green-btn" style="border-radius: 8px;">Пополнить</button>
                            </div>
                        </form>
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
                <h4 class="modal-title" id="myModalLabel">Форма пополнения баланса</h4>
            </div>
            <form class="balancei_form">
                <div class="modal-body">
                    <div class="balancep_modaling">
                        <img id="imgid" src="/img/ps/wm_logo.png">
                    </div>

                    <hr class="balancep_hr">
                   <p class="text-center red-text">Читайте внимательно!!!</p>
                    <p class="text-center">Для пополнения необходимо перевести указанную сумму на <span
                            id="titleid"></span> нашего сервиса и указать примечание к переводу.</p>

                    

                    <hr class="balancep_hr">

                    <h5 class="balancep_h5"><b class="red-text">Кошелек для перевода:</b>  <font color="green"><span id="purse" style="font-weight: bold;"></span></h5></font>
                    <h5 class="balancep_h5"><b class="red-text">Примечание к переводу:</b> <font color="green"><span id="comment" style="font-weight: bold;"></span></h5></font>
                    <h5 class="balancep_h5"><b class="red-text">Сумма пополнения:</b> <font color="green"><span id="sum" style="font-weight: bold;"></span></h5></font>
                    <hr class="balancep_hr">
                    <h5 class="balancep_h5">- <b class="red-text">УБЕДИТЕСЬ</b>, что вы добавили сообщение к переводу и сумму которую указывали.<br>
                    - Указали там ваш <b class="red-text">ID</b> на сервисе, <b class="red-text">БЕЗ ОШИБОК И ЛИШНИХ СИМВОЛОВ</b>, в противном случае перевод может задержаться на срок до 24х часов!</h5>
                    <hr class="balancep_hr">
					<p class="text-center red-text">Срок зачисления средств на ваш баланс от 1 минуты до 5.</p>
                </div>
                <div class="modal-footer" style="border-top: 1px solid #f8f8f8;">
                    <button type="button" onclick="sendMoney()" style="width: 100%;" class="btn btn-enter"
                            style="margin-top: 0;margin-bottom: 15px;">Перейти к оплате
                    </button>
                 </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
    var nowid = 0;
    var imgs = ["ym_logo", "qiwi_logo", "wm_logo"];
    var exmpl = ["<?=$config->yandex;?>", "<?=$config->qiwi;?>", "<?=$config->webmoney;?>"];
    var title = ["Яндекс Деньги", "Qiwi Wallet", "WebMoney"];
    var comment = "ID: " + "<?=$user_id;?>";

    var sum = 0;

    function changePS(id) {
        nowid = id;

        if(id == 1){
            sum = $("form").find("#getSumYA").val();
        } else if(id == 2){
            sum = $("form").find("#getSumQW").val();
        } else if(id == 3){
            sum = $("form").find("#getSumWM").val();
        }

        if(sum == ""){
            sum = 0;
        }

        $("#imgid").attr("src", "/img/ps/" + imgs[(id - 1)] + ".png");
        $("#purse").text(exmpl[(id - 1)]);
        $("#titleid").text(title[(id - 1)]);
        $("#comment").text(comment);
        $("#sum").text(sum + " р.");

    }

    function sendMoney() {
        $.ajax({
            url: "/ajax",
            type: "POST",
            data: {type: 'user', user: 'ins', ps: nowid, money: sum},
            dataType: "json",
            success: function (res) {
                if (res.status == "success") {
                    window.location.href = res.text;
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

    var ins;
    ins = {
        initialize: function () {
            $('form').on('submit', ins.submitForm);
        },
        submitForm: function (e) {
            if ($(this).attr('act') !== 'on') {
                e.preventDefault();
                var form = $(this);
                var submitBtn = form.find('input[type=submit]');
                var str = form.serialize(),
                    type = form.find('input[name=type]').val();
                $.ajax({
                    url: "/ajax",
                    type: "POST",
                    data: str,
                    dataType: 'json',
                    success: function (res) {
                        if (res.status === 'success') {
                            window.location.href = res.text;
                        } else {
                            swal({
                                type: "warning",
                                title: "Ошибка!",
                                text: res.text,
                                timer: 5000,
                                showConfirmButton: true
                            });
                        }
                    },
                    error: function () {
                    }
                });
            }
        }
    }
    $(document).ready(function () {
        ins.initialize();
    });
	
</script><br>