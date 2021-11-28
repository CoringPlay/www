<?php
$_OPT['title'] = 'Настройка комнат';
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
            <div class="col-sm-offset-2 col-sm-8">
                <div class="table-responsive block">
                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <td>ID</td>
                            <td>Мин. ставка <i class="fa fa-rouble"></i></td>
                            <td>Действия</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if ($data['pack'] != '0') {
                            foreach ($data['pack'] as $pack) {
                                ?>
                                <tr>
                                    <td><?= $pack['id']; ?></td>
                                    <td data-bet="<?=$pack['id'];?>"><?= $pack['min_bet']; ?></td>
                                    <td>
                                        <button class="btn btn-default" onclick="admin.editPack(<?= $pack['id']; ?>);">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php
                            }
                        } else echo '<tr><td>Нет комнат</td></tr>';
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- addPack -->
<div class="modal fade" id="editPack">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="fa fa-close"></i>
                </button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label>Мин. ставка:</label>
                        <input type="text" name="bet" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Пин-код:</label>
                        <input type="password" name="pin" class="form-control">
                    </div>
                    <input type="hidden" name="type" value="admin">
                    <input type="hidden" name="admin" value="editpack">
                    <input type="hidden" name="id" value="0">
                    <button class="btn btn-default">Сохранить</button>
                    <span id="status"></span>
                </form>
            </div>
        </div>
    </div>
</div>