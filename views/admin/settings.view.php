<?php
$_OPT['title'] = 'Настройки';
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
                    <h3>Основные</h3>

                    <div class="form-group">
                        <label>Логин:</label>
                        <input type="text" name="login" class="form-control"
                               value="<?= $data['configs']['admin_login']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Старый пароль:</label>
                        <input type="password" name="old" class="form-control"
                               placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;">
                    </div>
                    <div class="form-group">
                        <label>Новый пароль:</label>
                        <input type="password" name="new" class="form-control"
                               placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;">
                    </div>
                    <div class="form-group">
                        <label>Повторение пароль:</label>
                        <input type="password" name="confirm" class="form-control"
                               placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;">
                    </div>
                    <div class="form-group">
                        <label>Пин-код:</label>
                        <input type="password" name="pin" class="form-control" placeholder="&bull;&bull;&bull;&bull;">
                    </div>
                    <input type="hidden" name="type" value="admin">
                    <input type="hidden" name="admin" value="config">
                    <input type="hidden" name="config" value="password">
                    <button class="btn btn-default">Сохранить</button>
                    <span id="status"></span>
                </form>
            </div>
            <div class="col-xs-6">
                <form class="block">
                    <h3>Проценты</h3>

                    <div class="form-group">
                        <label>Процент системы:</label>
                        <input type="text" name="margin" class="form-control"
                               value="<?= $data['configs']['margin']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Процент Реф. 1-го уровня:</label>
                        <input type="text" name="ref1" class="form-control" value="<?= $data['configs']['ref_1']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Процент Реф. 2-го уровня:</label>
                        <input type="text" name="ref2" class="form-control" value="<?= $data['configs']['ref_2']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Процент Реф. 3-го уровня:</label>
                        <input type="text" name="ref3" class="form-control" value="<?= $data['configs']['ref_3']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Пин-код:</label>
                        <input type="password" name="pin" class="form-control" placeholder="&bull;&bull;&bull;&bull;">
                    </div>
                    <input type="hidden" name="type" value="admin">
                    <input type="hidden" name="admin" value="config">
                    <input type="hidden" name="config" value="per">
                    <button class="btn btn-default">Сохранить</button>
                    <span id="status"></span>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <form class="block">
                    <h3>Бонус</h3>

                    <div class="form-group">
                        <label>Мин. сумма:</label>
                        <input type="text" name="bonus_min" class="form-control"
                               value="<?= $data['configs']['bonus_min']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Макс. сумма:</label>
                        <input type="text" name="bonus_max" class="form-control" value="<?= $data['configs']['bonus_max']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Пин-код:</label>
                        <input type="password" name="pin" class="form-control" placeholder="&bull;&bull;&bull;&bull;">
                    </div>
                    <input type="hidden" name="type" value="admin">
                    <input type="hidden" name="admin" value="config">
                    <input type="hidden" name="config" value="bonus">
                    <button class="btn btn-default">Сохранить</button>
                    <span id="status"></span>

                </form>
            </div>
			
			<div class="col-xs-6">
    <form class="block">
        <h3>Система перевода</h3>
        <div class="form-group">
            <label>Процент от перевода:</label>
            <input type="text" name="margin_transfer" class="form-control" value="<?= $data['configs']['margin_transfer']; ?>">
        </div>
        <div class="form-group">
            <label>Мин. сумма:</label>
            <input type="text" name="transfer_min" class="form-control" value="<?= $data['configs']['transfer_min']; ?>">
        </div>
        <div class="form-group">
            <label>Макс. сумма:</label>
            <input type="text" name="transfer_max" class="form-control" value="<?= $data['configs']['transfer_max']; ?>">
        </div>
        <div class="form-group">
            <label>Пин-код:</label>
            <input type="password" name="pin" class="form-control" placeholder="&bull;&bull;&bull;&bull;">
        </div>
        <input type="hidden" name="type" value="admin">
        <input type="hidden" name="admin" value="config">
        <input type="hidden" name="config" value="transfer">
        <button class="btn btn-default">Сохранить</button>
        <span id="status"></span>
    </form>
</div>

        </div>
    </div>
</div>