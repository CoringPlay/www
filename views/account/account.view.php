<?php
$_OPT['title'] = 'Аккаунт';

$ref_link = 'http://' . $_SERVER['HTTP_HOST'] . '/i/' . $data['user_id'];

?>

<?
require 'inc/_left_menu.php';
?>

<div class="col-md-4 col-sm-4 col-xs-12">
    <div class="main-content">
        <div class="row">
            <div class="col-sm-12">
                <div align="center">
                    <table>
                        <tbody>
                        <tr>
                            <td>
                                <div style="border-radius: 50%;">
                                    <img src="{!PHOTO_100!}" style="border-radius: 50%;" width="70/">
                                </div>
                            </td>
                            <td>
                                <div style="padding-left: 20px; font-size: 16px;">
                                    Вы авторизовались как: <br>
                                    <span style="font-size: 24px;">{!SCREEN_NAME!}</span>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <br>

                    <div>
                        <a href="/account/logs">
                            <button class="btn btn-nice" style="width: 70%">
                                <i class="fa fa-history"></i> История входов
                            </button>
                        </a>
                    </div>

                    <br>

                    <div>
                        <a href="/account/purse">
                            <button class="btn btn-nice" style="width: 70%">
                                <i class="fa fa-cog"></i> Привязать кошельки
                            </button>
                        </a>
                    </div>

                    <br>
                    <br>

                    <b><div class="acc_string">Разместите свою реф-ссылку в соц. сети:</div>
                    <div class="share42init" data-url="<?= $ref_link; ?>" data-title="Demo Loto — сервис моментальных лотерей"
                         data-description="Проверьте свою удачу, бонус при регистрации 10 RUB."
                         data-image="http://<?= $_SERVER['HTTP_HOST']; ?>"></div>
                    <script type="text/javascript" src="/js/share42.js"></script>


                    <br>
                    <br>

                    <b><div class="acc_string">Вы выплатили: <?= sprintf('%.02f', $data['pay']); ?> <i class="fa fa-rub" style="color: #f2dc5d;"></i></div>

                    <b><div class="acc_string">Вы зарегистрированы: <b><span
                            style="color: #f2dc5d"><?= date('d.m.Y', $data['date_reg']); ?></span></div>
                    <div class="acc_string">Ваш ID: <b><span style="color: #f2dc5d"><?= $data['id']; ?></span></div>

                    <br>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <div class="main-content">
        <div class="row">
            <div align="center" style="padding: 1px;">
                <h2><i class="fa fa-money"></i> Ваш баланс:</h2>


                <h1>{!BALANCE!} <i class="fa fa-rub" style="color: #f2dc5d;"></i></h1>
                <a style="color: #FFFFFF;
    font-size: 16px;
    text-decoration: underline;" href="/account/history">История операций</a>
                <br>
                <br>

                <a href="/account/insert">
                    <button class="btn btn-pay" style="width: 70%">
                        <i class="fa fa-long-arrow-right"></i> Пополнить баланс
                    </button>
                </a>
                <br>
                <br>
                <a href="/account/payment">
                    <button class="btn btn-pay" style="width: 70%">
                        <i class="fa fa-long-arrow-left"></i> Вывести средства
                    </button>
                </a>

                <br>
                <br>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <div class="main-content">
        <div class="row">
            <div align="center" style="padding: 1px;">

                <h3><i class="fa fa-users"></i> Реф. программа</h3>

                <div class="box-content" align="center">
                    <br>
                    <b>Приглашая друзей, вы получаете до 5%<br>
                        от каждой их ставки навсегда! </b>
                    <br> <br>
                    <a href="/account/referals">
                        <button class="btn btn-good">Подробнее &gt;&gt; </button>
                    </a>

                    <br> <br>

                    <div class="acc_string">Рефералов: <?= $data['referals']; ?> чел.
                        <div style="font-size: 14px;">* Обновляется при входе в аккаунт.</div>
                    </div>
                    <br>

                    <div class="acc_string">Получено от рефералов: <br>

                        <h2> <?= sprintf('%.02f', $data['from_refs']); ?> <i class="fa fa-rub" style="color: #f2dc5d;"></i></h2>
                    </div>


                </div>

            </div>
        </div>
    </div>
</div>