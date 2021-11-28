<?php
$_OPT['title'] = 'Авторизация';
?>

<div class="col-sm-offset-3 col-sm-6">
    <div class="main-title">
        <div class="row">
            <div class="col-sm-12">
                <div class="text-left">
                    <h2>Авторизация</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content">
        <div class="row">
            <div class="col-sm-offset-3 col-sm-6">
                <form>
                    <div class="form-group">
                        <label>Логин:</label>
                        <input type="text" name="login" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Пароль:</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Ключ:</label>
                        <input type="password" name="key" class="form-control">
                    </div>
                    <input type="hidden" name="type" value="admin">
                    <input type="hidden" name="admin" value="auth">
                    <button class="btn-radius red-btn"">Авторизоватся</button>
                    <span id="status"></span>
                </form>
            </div>
        </div>
    </div>
</div>