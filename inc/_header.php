<?php
$online = time() - 1200;
$db->Query("SELECT COUNT(*) FROM users WHERE last > '{$online}'");
$online = $db->FetchRow();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>{!TITLE!}</title>
    <meta name="description" content="Demo Loto — сервис моментальных лотерей"/>
    <meta name="keywords" content="Demo Loto — сервис моментальных лотерей"/>
<meta property="og:image" content="/img/ovk.png" />
<meta property="og:image" content="http://<?= $_SERVER['HTTP_HOST']; ?>/image.jpg"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="yandex-verification" content="d9e611484d4d54d5"/>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Scada" rel="stylesheet">

    <script src="/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="/js/jquery-ui.js"></script>

    <link rel="icon" href="/favicon.ico" type="image/x-icon">

	
	
	
	
	<!-- Global Site Tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-87943878-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments)};
  gtag('js', new Date());

  gtag('config', 'UA-87943878-1');
</script>

	
	
	
</head>
<body>

<style>
    .room_div {
        display: inline-block;
        font-size: 14px;
        font-weight: bold;
        padding: 4px;
        margin: 4px;
        vertical-align: top;
        border: 2px solid #ffffff;
        color: #f2dc5d;
    }

    .room_div:hover {
        border: 2px solid #f2dc5d;
    }

    .rooms_small_text {
        font-size: 12px;
        font-weight: bold;
        color: #fff;
    }
</style>

<?php
$path = parse_url($_SERVER['REQUEST_URI']);//Парсим строку запроса
$url = explode('/', $path['path']);//Превращаем её в массив
?>

<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-3 col-sm-2">
                <a href="/">
                    <img src="/img/logo.png">
                </a>
            </div>
            <div class="col-xs-9 col-sm-10 text-center">
                <div class="hidden-xs" align="center">
                    <?php if ($url[1] != 'room') {
                        $db->Query("SELECT * FROM packages");
                        $rooms = $db->FetchAll();
                        foreach ($rooms as $room) {
                            ?>
                            <a href="/room/?num=<?= $room['id']; ?>">
                                <div class="room_div">
                                    <div>КОМНАТА <?= $room['id']; ?></div>
                                    <div id="div_room_players_<?= $room['id']; ?>"class="rooms_small_text">Ставки от
                                        <br> <?=sprintf("%.0f",$room['min_bet']); ?> до <?=sprintf("%.0f",$room['max_bet']); ?>
                                    </div>
                                </div>
                            </a>
                        <?
                        }
                    } else {
                        $db->Query("SELECT * FROM packages");
                        $rooms = $db->FetchAll();
                        foreach ($rooms as $room) {
                            ?>
                            <a href="/room/?num=<?= $room['id']; ?>">
                                <div class="room_div">
                                    <div>КОМНАТА <?= $room['id']; ?></div>
                                    <div id="div_room_players_<?= $room['id']; ?>" class="rooms_small_text"
                                         style="display: block; color: rgb(254, 251, 247);">Игроков: <span
                                            id="room_players_<?= $room['id']; ?>">-</span></div>
                                    <div id="div_room_prize_<?= $room['id']; ?>" class="rooms_small_text"
                                         style="display: block; color: rgb(254, 251, 247);">Банк: <span
                                            id="room_prize_<?= $room['id']; ?>">- <i class="fa fa-rub" style="color: #f2dc5d;"></i></div>
                                    <div id="div_room_wait_<?= $room['id']; ?>" style="display: none;"><img
                                            src="/img/wait.gif"
                                            style="width: 35px;"></div>
                                </div>
                            </a>
                        <?
                        }
                    }
                    ?>
                </div>
                <div class="visible-xs" align="center">
                    <div class="red_text" style="margin-top: 10px; font-size: 14px;">Выберите комнату:</div>
                    <?
                    $db->Query("SELECT * FROM packages");
                    $rooms = $db->FetchAll();
                    foreach ($rooms as $room) {
                        ?>
                        <a href="/room/?num=<?= $room['id']; ?>">
                            <div class="room_div">
                                <div>&nbsp;&nbsp;<?= $room['id']; ?>&nbsp;&nbsp;</div>
                            </div>
                        </a>
                    <?
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container-fluid">
    <div class="row">

	<script type="text/javascript" src="https://vk.com/js/api/openapi.js?156"></script>

<script type="text/javascript" src="https://vk.com/js/api/openapi.js?156"></script>
