<?php
$_OPT['title'] = 'Настройки платежных систем';
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

            <div class="col-xs-6">
                <form class="block">
                    <h3>Payeer</h3>

                    <div class="form-group">
                        <label>Тип выплаты:</label>
                        <select name="p_pay_type" class="form-control">
                            <option <?= ($data['configs']['p_pay_type'] == 1) ? 'selected' : ''; ?> value="1">
                                Автоматические
                            </option>
                            <option <?= ($data['configs']['p_pay_type'] == 2) ? 'selected' : ''; ?> value="2">Ручные
                            </option>
                            <option <?= ($data['configs']['p_pay_type'] == 3) ? 'selected' : ''; ?> value="3">Выключены
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Минимальная сумма для выплаты:</label>
                        <input type="text" name="p_min_pay" class="form-control"
                               value="<?= $data['configs']['p_min_pay']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Сумма сброса в ручные выплаты:</label>
                        <input type="text" name="p_back_auto" class="form-control"
                               value="<?= $data['configs']['p_back_auto']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Коммиссия:</label>
                        <input type="text" name="p_coms" class="form-control"
                               value="<?= $data['configs']['p_coms']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Пин-код:</label>
                        <input type="password" name="pin" class="form-control" placeholder="&bull;&bull;&bull;&bull;">
                    </div>
                    <input type="hidden" name="type" value="admin">
                    <input type="hidden" name="admin" value="configpay">
                    <input type="hidden" name="config" value="payeer">
                    <button class="btn btn-default">Сохранить</button>
                    <span id="status"></span>
                </form>
            </div>

            <div class="col-xs-6">
                <form class="block">
                    <h3>Яндекс.Деньги</h3>

                    <div class="form-group">
                        <label>Тип выплаты:</label>
                        <select name="ym_pay_type" class="form-control">
                            <option <?= ($data['configs']['ym_pay_type'] == 2) ? 'selected' : ''; ?> value="2">Ручные
                            </option>
                            <option <?= ($data['configs']['ym_pay_type'] == 3) ? 'selected' : ''; ?> value="3">Выключены
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Минимальная сумма для выплаты:</label>
                        <input type="text" name="ym_min_pay" class="form-control"
                               value="<?= $data['configs']['ym_min_pay']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Коммисия:</label>
                        <input type="text" name="ym_coms" class="form-control"
                               value="<?= $data['configs']['ym_coms']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Пин-код:</label>
                        <input type="password" name="pin" class="form-control" placeholder="&bull;&bull;&bull;&bull;">
                    </div>
                    <input type="hidden" name="type" value="admin">
                    <input type="hidden" name="admin" value="configpay">
                    <input type="hidden" name="config" value="yandex">
                    <button class="btn btn-default">Сохранить</button>
                    <span id="status"></span>

                </form>
            </div>

        </div>

        <div class="row">

            <div class="col-xs-6">
                <form class="block">
                    <h3>Qiwi Wallet</h3>

                    <div class="form-group">
                        <label>Тип выплаты:</label>
                        <select name="qw_pay_type" class="form-control">
                            <option <?= ($data['configs']['qw_pay_type'] == 2) ? 'selected' : ''; ?> value="2">Ручные
                            </option>
                            <option <?= ($data['configs']['qw_pay_type'] == 3) ? 'selected' : ''; ?> value="3">Выключены
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Минимальная сумма для выплаты:</label>
                        <input type="text" name="qw_min_pay" class="form-control"
                               value="<?= $data['configs']['qw_min_pay']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Коммисия:</label>
                        <input type="text" name="qw_coms" class="form-control"
                               value="<?= $data['configs']['qw_coms']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Пин-код:</label>
                        <input type="password" name="pin" class="form-control" placeholder="&bull;&bull;&bull;&bull;">
                    </div>
                    <input type="hidden" name="type" value="admin">
                    <input type="hidden" name="admin" value="configpay">
                    <input type="hidden" name="config" value="qiwi">
                    <button class="btn btn-default">Сохранить</button>
                    <span id="status"></span>

                </form>
            </div>

            <div class="col-xs-6">
                <form class="block">
                    <h3>WebMoney</h3>

                    <div class="form-group">
                        <label>Тип выплаты:</label>
                        <select name="wm_pay_type" class="form-control">
                            <option <?= ($data['configs']['wm_pay_type'] == 2) ? 'selected' : ''; ?> value="2">Ручные
                            </option>
                            <option <?= ($data['configs']['wm_pay_type'] == 3) ? 'selected' : ''; ?> value="3">Выключены
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Минимальная сумма для выплаты:</label>
                        <input type="text" name="wm_min_pay" class="form-control"
                               value="<?= $data['configs']['wm_min_pay']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Коммисия:</label>
                        <input type="text" name="wm_coms" class="form-control"
                               value="<?= $data['configs']['wm_coms']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Пин-код:</label>
                        <input type="password" name="pin" class="form-control" placeholder="&bull;&bull;&bull;&bull;">
                    </div>
                    <input type="hidden" name="type" value="admin">
                    <input type="hidden" name="admin" value="configpay">
                    <input type="hidden" name="config" value="webmoney">
                    <button class="btn btn-default">Сохранить</button>
                    <span id="status"></span>

                </form>
            </div>

        </div>

    </div>
</div>