<?php
$_OPT['title'] = 'Инвестирование';
$user_id = func::clear($_SESSION['user'], 'int');
$db->Query("SELECT * FROM users_conf WHERE id = '$user_id'");
$bloc = $db->FetchArray();
?>

<?
require 'inc/_left_menu.php';
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

					<center> <div class="form-group">
                                <div class="user-balance"><div class="btn btn-good" style="padding: 10px 70px 10px 70px;">Баланс: <span>{!BALANCE!}</span>  RUB</div></div>
                            </div></center>
				 
					
					
                        <form class="text-center" id="inv">
                            <div class="form-group">
                                <label>Период</label>
                                <select name="period" id="period" class="form-control insert_new_input">
                                                                                <option value="30">30 дней</option>
                                                                                    <option value="90">90 дней</option>
                                                                                    <option value="180">180 дней</option>
                                                                                    <option value="365">365 дней</option>
                                                                        </select>
                            </div>

                            <div class="form-group" id="month">
                                <label>Процент в месяц</label>
                                 <input class="form-control insert_new_input" id="percentm" value="0" disabled>
                                <p class="help-block" style="color: #fff; display: none;">Проценты в месяц</p>
                            </div>

                            <div class="form-group">
                                <label>Доход в месяц</label>
                                <input class="form-control insert_new_input" id="profitm" value="0.00" disabled>
                                                            </div>

                            <div class="form-group">
                                <label>Процент за период</label>
                                <input class="form-control insert_new_input" id="percenty" value="0" disabled>
                                <p class="help-block" style="color: #fff; display: none;">Проценты за период</p>
                            </div>

                            <div class="form-group">
                                <label>Доход за период</label>
                                <input class="form-control insert_new_input" id="profit" value="0.00" disabled>
                                                            </div>

                            <div class="form-group">
                                <label>Сумма вклада</label>
                                      <input name="money" id="sum" type="text" class="form-control insert_new_input" value="100">
                                 <b><p class="help-block" style="color: #fff;">Минимальная сумма депозита: 100 RUB <br>Максимальная сумма депозита: 10000 RUB</p></b>
                            </div>

                            <input type="hidden" name="type" value="user">
                            <input type="hidden" name="user" value="invest">
                            <input type="hidden" name="invest" value="add">
                            <button type="button" onclick="saveInvest();" style="border-radius: 8px;" class="btn-radius transf-btn">
                                Инвестировать
                            </button>
                        </form>

                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-8 col-lg-8">
                <div class="panel block">
                    <div class="panel-heading">
                        <h3 class="panel-title tabletitle">
                            <i class="fa fa-list-ul"></i> История вкладов
                        </h3>
                    </div>
                     <? if($data['success'] != "") {
                        echo '<center><font color="green">' . $data['success'] . '</font></center>';
                    }
                    ?>    
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th class="text-center">Дата</th>
                                            <th class="text-center">Сумма</th>
                                            <th class="text-center">Начисленно/Всего</th>
                                            <th class="text-center">Процент</th>
                                            <th class="text-center">Срок</th>
                                            <th class="text-center">Статус</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                              <?php
                                        if ($data['invest'] != '0') {
                                            foreach ($data['invest'] as $trans) {
                                               ?>
                                               <tr class="text-center">
                                               <td><?= date('d/m/Y в H:i', $trans['date_add']); ?></td>
                                                   <td><?= $trans['sum']; ?> RUB</td>
                                                   <?php
                                                   $id = $trans['id'];
                                                   $date_start = date("d.m.Y ",$trans['date_add']);
                                                   $date_end = date("d.m.Y ",$trans["date_del"]);
                                                   $interval_date = date_diff(date_create(), date_create($date_end))->days+1;
                                                   
                                                   ?>
                                                  
                                                   <td><?=sprintf("%.4f",($trans['pr']/$interval_date)*$trans['kof']);?> RUB</td>
                                                   
                                                       <td><?= $trans['pr']; ?>%</td>
                                                      
                                                  
                                                   <td><?= $trans['period']; ?> дней</td>
                                                   <?
                                                   if($trans["date_del"] >=time()){
                                                       ?>
                                                   <?
                                                   if($trans['status'] == 1){
                                                       
                                                   ?>
                                                   <td><font color="red">Выполняется</font></td>
                                                   <?
                                                       
                                                      }
                                                   }
                                                   ?>
                                                    <?
                                                   if($trans['status'] == 2){
                                                       ?>
                                                   <td><font color="green">Завершен</font></td>
                                                    <?}else{?>
                                                     <?}
                                                      if($trans['status'] == 1){
                                                   if($trans["date_del"] <= time()){
                                                       ?>
                                                           <?
                if ($data["form"] == false) {
                    ?><td>
                                           <form action="" method="post">
                                           <input type="hidden" name="money_invest" id='<?=$trans['id'];?>' >
                                          <button type="submit" class="btn btn-enter">Забрать депозит</button>
                                               </form></td>
                                               
                                                   <?} else{ 
                                                       ?>
                                                      <td><font color="green">Завершен</font></td>
                                                       <?
                                                   }
                                                   }
                                                   }?>
                                                   
                                                   </tr>  
                                                    
                                             
                                             <?php
                                            }
                                        } else echo '<tr><td>Вкладов нет</td></tr> ';
                                        ?>                                      </tbody>
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
<script>
   function getProfit() {
        $('#sum').on('change', function () {
            var sum = $('#sum').val();
            var per = $('#percenty').val().replace("%","");

            var profit = (sum / 100 * per).toFixed(2);
            $('#profit').val(profit);

            var period = $('#period').val();

            var mont;

            if(period == 30){
                mont = 1;
            }

            if(period == 90){
                mont = 3;
            }

            if(period == 180){
                mont = 6;
            }

            if(period == 365){
                mont = 12;
            }

            var profitm = (profit / mont).toFixed(2);
            $('#profitm').val(profitm);
        });
    }

    $('#sum').on('keyup', function () {
        getProfit();
    });

    $('#sum').on('change', function () {
        getProfit();
    });

    $('#period').on('change', function () {
        var period = $('#period').val();

        var percentm;

        var mont;

                var percenty = 10;
        
                if (period == 30) {
            mont = 1;
            percenty = 10;
            $('#percenty').val(percenty + "%");
            $('#percentm').val(percenty  + "%");
        }
        
                if (period == 90) {
            mont = 3;
            percenty = 30;
            $('#percenty').val(percenty + "%");

            percentm = 10;
            $('#percentm').val(percentm + "%");
        }
        
                if (period == 180) {
            mont = 6;
            percenty = 66;
            $('#percenty').val(percenty  + "%");

            percentm = 11;
            $('#percentm').val(percentm + "%");
        }
        
                if (period == 365) {
            mont = 12;
            percenty = 144;
            $('#percenty').val(percenty + "%");

            percentm = 12;
            $('#percentm').val(percentm  + "%");
        }
        
        var sum = $('#sum').val();
        var profit = (sum / 100 * percenty).toFixed(2);
        $('#profit').val(profit);

        var profitm = (profit / mont).toFixed(2);
        $('#profitm').val(profitm);
    });

    function calc(period){
        var period = $('#period').val();

        var percentm;

        var mont;

                mont = 1;

        var percent = 10;
        var percenty = 10;
        
                if (period == 30) {
            mont = 1;

            percent = 10;
            percenty = 10;
            $('#percenty').val(percenty  + "%");
            $('#percentm').val(percenty  + "%");
        }
        
                if (period == 90) {
            mont = 3;

            percent = 3.3333333333333;
            percenty = 30;
            $('#percenty').val(percenty  + "%");

            percentm = 10;
            $('#percentm').val(percentm + "%");
        }
        
                if (period == 180) {
            mont = 6;

            percent = 1.8333333333333;
            percenty = 66;
            $('#percenty').val(percenty + "%");

            percentm = 11;
            $('#percentm').val(percentm + "%");
        }
        
                if (period == 365) {
            mont = 12;

            percent = 1;
            percenty = 144;
            $('#percenty').val(percenty + "%");

            percentm = 12;
            $('#percentm').val(percentm + "%");
        }
        
        var sum = $('#sum').val();
        var profit = (sum / 100 * percenty).toFixed(2);
        $('#profit').val(profit);

        var profitm = (profit / mont).toFixed(2);
        $('#profitm').val(profitm);
    }
    
      var invest;
    invest = {
        initialize: function () {
            $('#inv').on('submit', invest.submitForm);
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
                    },
                    error: function () {
                    }
                });
            }
        }
    }

    
   $(document).ready(function () {
        invest.initialize();

        calc();
    });

    function saveInvest() {
        var form = $('form');
        var str = form.serialize();
        reloadBalance();
        $.ajax({
            url: "/ajax",
            type: "POST",
            data: str,
            dataType: 'json',
            success: function (res) {
                if(res.status === 'success'){
                    swal({
                        type: "success",
                        title: "Отлично!",
                        text: res.text,
                        timer: 5000
                    });
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
    }
     function saveinvest_money() {
        var form = $('form');
        var str = form.serialize();
        reloadBalance();
        $.ajax({
            url: "/ajax",
            type: "POST",
            data: str,
            dataType: 'json',
            success: function (res) {
                if(res.status === 'success'){
                    swal({
                        type: "success",
                        title: "Отлично!",
                        text: res.text,
                        timer: 5000
                    });
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
    }
 // Balance
                       function reloadBalance() {
                        $.ajax({
                            url: '/ajax',
                            type: 'POST',
                            data: {'type': 'user', 'user': 'getBalance'},
                            dataType: 'json',
                            cache: false,
                            success: function (res) {
                                if (res.status === 'success') {
                                 $('.user-balance span').each(function () {
                                        $(this).html(res.text)
                                    });
                                    
                                }
                                
                            }
                        });
                    }
</script>
