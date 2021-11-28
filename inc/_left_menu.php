<style>
    .blink {
        -webkit-animation: blink2 0.5s linear infinite;
        animation: blink2 0.9s linear infinite;
        color: #FDCE4E!important;
    }
</style>
<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
    <div class="side-bar">
        <?php
        if (isset($_SESSION['user'])) {
            ?>
            <div class="side-title-user">
                <div class="side-user">
                    <div class="user-avatar">
                        <a href="/account"><img src="{!PHOTO_100!}""></a>
                    </div>
                    <div class="user-info">
                        <b><div class="user-name">{!SCREEN_NAME!}</div></b>
                        <div class="user-balance"><b style="color: #FFFFFF;">Баланс:</b> <span style="color: #FFFFFF;"><b>{!BALANCE!}</b></span> <b style="color: #FFFFFF;">RUB</b></div>
                    </div>
                </div>
                <a href="/room/?num=1">
                    <b><button class="btn-radius green-btn" style="width: 100%; border-radius: 8px;">Играть</button>
                </a>
            </div>
            <ul class="side-menu">
                <li><a href="/account"><i class="fa fa-university" style="margin: 0 10px;"></i> Личный кабинет</a></li>
                <li><a href="/account/ace"><i class="fa fa-key" style="margin: 0 10px;"></i> Поиск клада</a></li>
				<li><a href="/account/bezp"><i class="fa fa-line-chart" style="margin: 0 10px;"></i> Увеличитель</a></li>
                <li><a href="/account/insert"><i class="fa fa-arrow-circle-right" style="margin: 0 10px;"></i> Пополнить баланс</a></li>
                <li><a href="/account/payment"><i class="fa fa-arrow-circle-down" style="margin: 0 10px;"></i> Заказать выплату</a></li>
				<li><a href="/account/transfer"><i class="fa fa-random" style="margin: 0 10px;"></i> Перевод средств</a></li>
				<li><a href="/account/invest"><i class="fa fa-area-chart" style="margin: 0 10px;"></i> Инвестирование</a></li>
                <li><a href="/account/referals"><i class="fa fa-suitcase" style="margin: 0 10px;"></i>Партнёрка</a>
				<li><a href="/account/promo"><i class="fa fa-ticket" style="margin: 0 10px;"></i>Промокоды</a>
				<li><a href="/news"><i class="fa fa-newspaper-o" style="margin: 0 10px;"></i> Новости</a>
				<li><a href="/account/support"><i class="fa fa-support" style="margin: 0 10px;"></i> Тех. поддержка</a></li>
                <li><a href="/account/bonus"><i class="fa fa-gift" style="margin: 0 10px;"></i> Ежечасный бонус</a></li>
               
                <li><a href="/logout"><i class="fa fa-sign-out" style="margin: 0 10px;"></i> Выход</a></li></b>
            </ul>
        <?php
        } else {
            ?>
            <div class="side-title-user">
                <a href="/login">
                    <b><button class="btn-radius red-btn" style="width: 100%; border-radius: 8px;">Войти на сайт</button>
                </a>
            </div>
            <ul class="side-menu">
                <li><a href="/room/?num=1"><i class="fa fa-navicon" style="margin: 0 10px;"></i> Начать игру</a></li>
                <li><a href="/rules"><i class="fa fa-info-circle" style="margin: 0 10px;"></i> Правила проекта</a></li>
				<li><a href="/faq"><i class="fa fa-question-circle" style="margin: 0 10px;"></i> Вопросы и ответы</a></li>
				<li><a href="/account/support"><i class="fa fa-support" style="margin: 0 10px;"></i> Тех. поддержка</a></li></b>

            </ul>
        <?php
        }
        ?>

        <div style="padding-bottom: 10px; text-align: center; color: #fff;">
            <br style="clear:both">
            <a href="https://vk.com/id532614022" target="_blank">
                <button class="btn btn-default" style="width:95%; background: #2a81f4; color: #fff;"><i
                        class="fa fa-vk"></i> МЫ ВКОНТАКТЕ
                </button>
            </a>
        </div>

    </div>
</div>