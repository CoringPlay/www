<?php
$_OPT['title'] = 'Привязка кошельков';

$disabled = 'disabled="disabled"';
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
            <div class="col-sm-offset-3 col-sm-6 col-lg-6">
                <div class="panel block">
                    <div class="panel-body">
                        <form>
                            <div class="form-group">
                                <label>PAYEER</label>
                                <input name="purse1" type="text" class="form-control insert_new_input"
                                       placeholder="Формат кошелька: P1000000" <? if($data['payeer'] != "0"){ echo 'value="'.$data['payeer'].'"'; echo $disabled; } ?>>
                            </div>
                            <div class="form-group">
                                <label>YandexMoney</label>
                                <input name="purse2" type="text" class="form-control insert_new_input"
                                       placeholder="Формат кошелька: 410011499718000" <? if($data['yandex'] != "0"){ echo 'value="'.$data['yandex'].'"'; echo $disabled; } ?>>
                            </div>
                            <div class="form-group">
                                <label>QIWI Wallet</label>
                                <input name="purse3" type="text" class="form-control insert_new_input"
                                       placeholder="Формат кошелька: +79531559596" <? if($data['qiwi'] != "0"){ echo 'value="'.$data['qiwi'].'"'; echo $disabled; } ?>>
                            </div>
                            <div class="form-group">
                                <label>WebMoney</label>
                                <input name="purse4" type="text" class="form-control insert_new_input"
                                       placeholder="Формат кошелька: R123456789012" <? if($data['webmoney'] != "0"){ echo 'value="'.$data['webmoney'].'"'; echo $disabled; } ?>>
                            </div>

                            <input type="hidden" name="type" value="user">
                            <input type="hidden" name="user" value="config">
                            <input type="hidden" name="config" value="purse">
                            <button type="button" onclick="savePurse();" style="width: 100%; border-radius: 8px;" class="btn-radius green-btn">
                                Сохранить изменения
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function savePurse() {
        var form = $('form');
        var str = form.serialize();

        $.ajax({
            url: "/ajax",
            type: "POST",
            data: str,
            dataType: 'json',
            success: function (res) {
                if(res.status === 'success'){
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

</script>