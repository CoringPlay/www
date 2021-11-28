<?php
$path = parse_url($_SERVER['REQUEST_URI']);//Парсим строку запроса
$url = explode('/', $path['path']);//Превращаем её в массив
?>

<script>
    $(function () {
        $('#chat_window').draggable({cursor: "move", handle: "#chat_title"});
        $('#chat_button').click(function () {
            $('#chat_window').slideDown();
            return false;
        });
        $('#close_chat').click(function () {
            $('#chat_window').slideUp();
            return false;
        });
    });
</script>









<div style="clear: both"></div>

<div class="how-to-play-xs">
<main class="content-timeloto">
				
				
				
				
				
				
				
</div>
</main>
</div>















</div>
</div>
<div style="clear: both"></div>






























<?php
?>





















<footer>
    <div class="text-center">
       
        <div style="margin-top: 5px;">
            <a href="//www.free-kassa.ru/"><img src="//www.free-kassa.ru/img/fk_btn/18.png"></a>
           









<br>






<script type="text/javascript">(function() { var d = document, s = d.createElement('script'), g = 'getElementsByTagName'; s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true; s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://socpublic.com/themes/assets/global/scripts/visit_js.js'; var h=d[g]('body')[0]; h.appendChild(s); })();</script>

















	























        </div>
    </div>
</footer>

<link href="/css/sweet-alert.css" rel="stylesheet" type="text/css"/>
<script src="/js/sweet-alert.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<?php if ($url[1] == 'admin') { ?>
    <script src="/js/app.js"></script>
<? } ?>
{!SCRIPTS!}
























</body>
</html>