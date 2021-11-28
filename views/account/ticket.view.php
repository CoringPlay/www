<?php
$_OPT['title'] = 'Тема: ' . $data['ticket']['title'];
?>

<?
require 'inc/_left_menu.php';

$user_id = func::clear($_SESSION['user'],'int');
$usname = $_SESSION["user"];

$status = $data['ticket']['status'] == 0 ? 'Закрыть' : 'Открыть';
$disabled = $data['ticket']['status'] == 0 ? '' : 'disabled';
$placeholder = $data['ticket']['status'] == 0 ? '' : 'placeholder="тикет закрыт!"';
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
                        <div class="col-lg-6 col-lg-offset-3 balancep_offset balancep_panel text-center"
                             style="margin-bottom: 15px; margin-top: 5px;">
                            <button type="submit" class="btn btn-enter" id="statusTicket" onclick="statusTicket();">
                                <?=$status;?> тикет
                            </button>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <form class="chat" onsubmit="return false;">
                                    <div id="chat-block">
                                        <div id="messages">
                                            <div class="msg-wrap">
                                                <ul>
                                                    <?php
                                                    foreach ($data['messages'] as $msg) {
                                                    $type = $msg['user_id'] == $user_id ? '1' : '2';
                                                    ?>

                                                    <li class="clearfix">
                                                        <? if ($type == "1") { ?>
                                                            <div class="message-data align-right">
                                                                <span
                                                                    class="message-data-time"><?= date('d.m.y в H:i', $msg['date_add']); ?></span>
                                                                &nbsp; <span
                                                                    class="message-data-name"><?= $data['user']['screen_name']; ?></span>
                                                                &nbsp; <img src="<?= $data['user']['photo_100']; ?>">
                                                            </div>
                                                            <div class="message my-message float-right">
                                                                <?= $msg['message'] ?>
                                                            </div>
                                                        <? } else { ?>
                                                            <div class="message-data">
                                                                <img
                                                                    src="/img/support.png">
                                                                &nbsp; <span
                                                                    class="message-data-name">Администратор</span>
                                                                &nbsp; <span
                                                                    class="message-data-time"><?= date('d.m.y в H:i', $msg['date_add']); ?></span>
                                                            </div>
                                                            <div class="message other-message">
                                                                <?= $msg['message'] ?>
                                                            </div>
                                                        <? } ?>
                                                        <?php } ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="controller">
                                        <div class="input-group">
                                            <input type="text" name="message" id="messageTicket" class="form-control" <?=$placeholder;?> <?=$disabled;?>>
                                            <span class="input-group-btn">
                                                <input type="hidden" name="type" value="user">
                                                <input type="hidden" name="user" value="ticket">
                                                <input type="hidden" name="ticket" value="addmsg">
                                                <input type="hidden" name="id" id="ticketID" value="<?= $data['id']; ?>">
                                                <button class="btn btn-default" id="btnSend" <?=$disabled;?>>Отправить</button>
                                            </span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function statusTicket() {
        var id = <?=$data['ticket']['id'];?>;
        $.ajax({
            url: "/ajax",
            type: "POST",
            data: {type: 'user', user: 'ticket', ticket: 'status', tkID: id},
            dataType: "json",
            success: function (res) {
                if (res.status == "success") {
                    if(res.text.type == 1){
                        $('#statusTicket').text("Открыть тикет");
                        $('#messageTicket').prop("disabled", true);
                        $('#messageTicket').attr('placeholder', 'Ошибка: Тикет закрыт.');
                        $('#btnSend').prop("disabled", true);
                    } else {
                        $('#statusTicket').text("Закрыть тикет");
                        $('#messageTicket').prop("disabled", false);
                        $('#messageTicket').removeAttr('placeholder');
                        $('#btnSend').prop("disabled", false);
                    }
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

    var tik;
    tik = {
        initialize: function () {
            $('form').on('submit', tik.submitForm);
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
                            var msg = $("#messageTicket").val();
                            addMsg(msg, res.text);
                            $("#messageTicket").val("");
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

    function addMsg(message, response){
        $("#messages .msg-wrap ul").append('<li class="clearfix"><div class="message-data align-right">'
        + '<span class="message-data-time">' + response.time + '</span>'
        + '&nbsp;'
        + '<span class="message-data-name">' + response.user['screen_name'] + '</span>'
        + '&nbsp;'
        + '<img src="'+ response.user['photo_100'] +'">'
        + '</div>'
        + '<div class="message my-message float-right">' + message + '</div></li>');

        $('#messages').scrollTop(1000000);
    }

    $(document).ready(function(){
        tik.initialize();

        $('#messages').scrollTop(1000000);
    });
</script>