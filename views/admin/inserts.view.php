<?php
$_OPT['title'] = 'Пополнения';
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
            <div class="col-sm-12">
                <div class="table-responsive block">
                    <table class="table table-hover table-bordered table-hover">
                        <thead>
                        <tr>
<!--                            <td>ID</td>
-->                            <td>Пользователь</td>
                            <td>Сумма</td>
                            <td>Дата</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if($data['inserts'] != '0'){
                            foreach ($data['inserts'] as $insert) {
                                ?>
                                <tr>
<!--                                    <td><?/*=$insert['id'];*/?></td>
-->                                    <td>
                                        <a href="/admin/user/<?=$insert['user_id'];?>">
                                            <?=$insert['user'];?>
                                        </a>
                                    </td>
                                    <td><?=$insert['money'];?> <i class="fa fa-rouble"></i></td>
                                    <td><?=$insert['date'];?></td>
                                </tr>
                            <?php
                            }
                        }else echo '<tr><td>Нет пополнений</td></tr>';
                        ?>
                        </tbody>
                    </table>
                </div>
                <?php
                if($data['pag'] != '0'){
                    ?>
                    <center>
                        <ul class="pagination"><?=$data['pag'];?></ul>
                    </center>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>