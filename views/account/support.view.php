<?php
$_OPT['title'] = 'Тех. поддержка';
?>

<?
require 'inc/_left_menu.php';

$type = array('1' => 'Вопросы об игре', '2' => 'Реферальная программа', '3' => 'Финансовые вопросы', '4' => 'Предложения и пожелания', '5' => 'Прочее');
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
            <div class="col-lg-6 col-lg-offset-3 balancep_offset balancep_panel text-center"
                 style="margin-bottom: 15px; margin-top: 5px;">
                <button type="submit" class="btn btn-enter" data-toggle="modal" data-target="#addTicket">Создать тикет
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 balancep_offset balancep_panel">
                <div class="panel block">
                    <div class="panel-heading">
                        <h3 class="panel-title tabletitle">
                            <i class="fa fa-support"></i> Ваши тикеты
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th class="text-center">Тема</th>
                                            <th class="text-center">Тип</th>
                                            <th class="text-center">Сообщений</th>
                                            <th class="text-center">Статус</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        if ($data['ticket'] != '0') {
                                            foreach ($data['ticket'] as $ticket) {
                                                ?>
                                                <tr class="text-center">
                                                    <td><a href="/account/ticket/<?= $ticket['id']; ?>" style="text-decoration: underline;"><?= $ticket['title'];?></a></td>
                                                    <td><?=$type[$ticket['type']];?></td>
                                                    <td><?= $ticket['count']; ?></td>
                                                    <td>
                                                        <? if ($ticket['status'] == 0) { ?>
                                                            <font color="#04f90a">Открыт</font>
                                                        <? } else { ?>
                                                            <font color="#f90421">Закрыт</font>
                                                        <? } ?>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                        } else echo '<tr><td>Нет созданных тикетов!</td></tr>';
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

<div id="addTicket" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog balancep_modalwidth">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Создание тикета</h4>
            </div>
            <div class="modal-body">
                <form onsubmit="return false;">
                    <div class="form-group">
                        <label>Тип:</label>
                        <select name="type" class="form-control" id="type">
                            <?
                                foreach($type as $num => $val){
                                    ?>
                                    <option value="<?=$num;?>"><?=$val;?></option>
                            <?
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Тема:</label>
                        <input type="text" name="title" id="titleTicket" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Сообщение:</label>
                        <textarea type="text" name="message" id="messageTicket" rows="3" class="form-control"></textarea>
                    </div>
                    <button class="btn btn-default" onclick="createTicket();">Создать</button>
                </form>
            </div>
            <!-- /.modal-body -->
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
    function createTicket() {

        $.ajax({
            url: "/ajax",
            type: "POST",
            data: {type: 'user', user: 'ticket', ticket: 'add', title: $("#titleTicket").val(), typ: $("#type option:selected").val(), message: $("#messageTicket").val()},
            dataType: "json",
            success: function (res) {
                if (res.status == "success") {
                    window.location.reload();
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
        return false;
    }
</script>