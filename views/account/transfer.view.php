<?php
$_OPT['title'] = 'Перевод средств';
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
                                <label>Сумма</label>
                                <input name="money" type="text" class="form-control insert_new_input" value="10">
                            </div>

                            <div class="form-group">
                                <label>ID получателя</label>
                                <input name="userid" type="text" id="userid" class="form-control insert_new_input">
                            </div>

                            <div class="form-group">
                                <label>Имя получателя</label>
                                <input id="nprs" name="name" type="text"
                                       class="form-control balancei_input insert_new_input"
                                       placeholder="Укажите ID пользователя"
                                       disabled="">
                            </div>

                            <span style="">
								<b>Максимальная сумма: <?= $data['conf']['transfer_max']; ?> RUB</br>
                                Минимальная сумма: <?= $data['conf']['transfer_min']; ?> RUB</br>
                                Коммисия системы: <?= $data['conf']['margin_transfer']; ?>%</br></b>
                            </span>

                            </br>

                            <input type="hidden" name="type" value="user">
                            <input type="hidden" name="user" value="transfer">
                            <input type="hidden" name="transfer" value="send">
                            <button type="button" id="trans" style="border-radius: 8px;" class="btn-radius transf-btn">
                                Выполнить перевод
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-8 col-lg-8">
                <div class="panel block">
                    <div class="panel-heading">
                        <h3 class="panel-title tabletitle">
                            <i class="fa fa-list-ul"></i> История переводов
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th class="text-center">Отправитель</th>
                                            <th class="text-center">Получатель</th>
                                            <th class="text-center">Сумма</th>
                                            <th class="text-center">Дата</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        if ($data['transfer'] != '0') {
                                            foreach ($data['transfer'] as $transfer) {
                                                ?>
                                                <tr class="text-center">
                                                    <td>
                                                        <?= $transfer['from_user']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $transfer['to_user']; ?>
                                                    </td>
                                                    <td><?= $transfer['money']; ?> <i class="fa fa-rub"></i></td>
                                                    <td><?= $transfer['date']; ?></td>
                                                </tr>
                                            <?php
                                            }
                                        } else echo '<tr><td>Переводов нет</td></tr>';
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
                            timer: 5000
                        });

                        $('#userid').val('');

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