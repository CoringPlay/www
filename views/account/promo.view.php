<?php
$_OPT['title'] = 'Активация промо-кодов';
?>

<?
require 'inc/_left_menu.php';

$user_id = func::clear($_SESSION['user'],'int');
$usname = $_SESSION["user"];
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
            <div class="col-xs-12 col-sm-4 col-lg-4">
                <div class="panel block">
                    <div class="panel-body">
                        <form class="text-center">
                            <div class="form-group">
                                <label>Ваш ID: <?= $user_id; ?></label>
                            </div>
                            <div class="form-group">
                                <span class="btn btn-good" style="padding: 10px 70px 10px 70px;">Баланс: {!BALANCE!} <i
                                        class="fa fa-rub"></i></span>
                            </div>
                            <div class="form-group">
                                <label>Промо-код</label>
                                <input name="prom" type="text" id="prom" class="form-control insert_new_input">
                            </div>
                            

                            </br>

                            <input type="hidden" name="type" value="user">
                            <input type="hidden" name="user" value="promo">
                            <input type="hidden" name="promo" value="send">
                            <button type="button" id="trans" class="btn-radius green-btn" style="border-radius: 8px;">
                                Активировать
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-8 col-lg-8">
                <div class="panel block">
                    <div class="panel-heading">
                        <h3 class="panel-title tabletitle">
                            <i class="fa fa-list-ul"></i> Активированные промо-коды:
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th class="text-center">Промо-код</th>
                                            <th class="text-center">Сумма</th>
                                            <th class="text-center">Дата</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        if ($data['promo'] != '0') {
                                            foreach ($data['promo'] as $transfer) {
                                                ?>
                                                <tr class="text-center">
                                                    <td>
                                                        <?= $transfer['promo']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $transfer['money']; ?><i class="fa fa-rub"></i>
                                                    </td>
                                                    <td>
                                                        <?= $transfer['date']; ?>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                        } else echo '<tr><td>Активаций нет</td></tr>';
                                        ?>
                                        </tbody>
                                    </table>

                                    <?php
                                    if ($data['pag'] != '0') {
                                        ?>
                                        <center>
                                            <ul class="pagination"><?= $data['pag']; ?></ul>
                                        </center>
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
</div>

<script>
    $(document).ready(function () {
        $("#trans").on('click', function () {
            var form = $('form');
            var str = form.serialize();
            $.ajax({
                url: "/ajax",
                type: "POST",
                data: str,
                dataType: 'json',
                success: function (res) {
                    if (res.status === 'success') {
                        swal({
                            type: "success",
                            title: "Отлично!",
                            text: res.text,
                            timer: 3000
                        });
                        $('#userid').val('');
                        setTimeout(function(){
   window.location.reload(1);
}, 3000);
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
        });

        $('input[name=userid]').keypress(function (event) {
            var inputValue = event.charCode;
            if (!((inputValue > 47 && inputValue < 58) || (inputValue == 32) || (inputValue == 0))) {
                event.preventDefault();
            }
        });

        $('input[name=userid]').on("change", function () {
            var id = $('input[name=userid]').val();
            $.ajax({
                url: "/ajax",
                type: "POST",
                data: {type: "checkUser", id: id},
                dataType: 'json',
                success: function (res) {
                    if (res.status === 'success') {
                        $('input[name=name]').attr("placeholder", res.text);
                    } else if (res.status === 'err') {
                        $('input[name=name]').attr("placeholder", res.text);
                    }
                }
            });

        });
    });
</script>