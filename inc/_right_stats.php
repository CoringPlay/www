<div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
    <div class="side-bar">
        <div class="side-title">
            <b><span>Статистика</span>
        </div>
        <div class="side-panel">
            <div class="stats">
                <div class="stats__amount"><?=$data['users'];?></div>
                <div class="stats__caption">ВСЕГО ПОЛЬЗОВАТЕЛЕЙ</div>
                <div class="stats__change">
                    <div class="stats__value stats__value--positive"><i class="fa fa-users" style="color: #f2dc5d;"></i></div>
                </div>
            </div>
			
            <div class="stats">
                <div class="stats__amount"><?=$online;?></div>
                <div class="stats__caption">СЕЙЧАС ОНЛАЙН</div>
                <div class="stats__change">
                    <div class="stats__value stats__value--positive"><i class="fa fa-bullseye" style="color: #f2dc5d;"></i></div>
                </div>
            </div>
			
            <div class="stats">
                <div class="stats__amount"><?=sprintf("%.0f",$data['pay']);?> <small>RUB</small></div>
                <div class="stats__caption">ВСЕГО ВЫПЛАЧЕНО</div>
                <div class="stats__change">
                    <div class="stats__value stats__value--positive"><i class="fa fa-credit-card" style="color: #f2dc5d;"></i></div>
                </div>
            </div>
			
            <div class="stats">
                <div class="stats__amount"><?=$data['lot'];?></div>
                <div class="stats__caption">ЗАВЕРШЕНО ЛОТЕРЕЙ</div>
                <div class="stats__change">
                    <div class="stats__value stats__value--positive"><i class="fa fa-gavel" style="color: #f2dc5d;"></i></div>
                </div>
            </div>
			
 <div class="stats">
                <div class="stats__amount">05/03/2019</div>
                <div class="stats__caption">СТАРТ ПРОЕКТА</div>
                <div class="stats__change">
                    <div class="stats__value stats__value--positive"><i class="fa fa-calendar" style="color: #f2dc5d;"></i></div>
                </div>
            </div></b>


        </div>


</div>


<!-- Rating@Mail.ru counter -->
<script type="text/javascript">
var _tmr = window._tmr || (window._tmr = []);
_tmr.push({id: "2946294", type: "pageView", start: (new Date()).getTime()});
(function (d, w, id) {
  if (d.getElementById(id)) return;
  var ts = d.createElement("script"); ts.type = "text/javascript"; ts.async = true; ts.id = id;
  ts.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//top-fwz1.mail.ru/js/code.js";
  var f = function () {var s = d.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ts, s);};
  if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); }
})(document, window, "topmailru-code");
</script><noscript><div>
<img src="//top-fwz1.mail.ru/counter?id=2946294;js=na" style="border:0;position:absolute;left:-9999px;" alt="" />
</div></noscript>
<!-- //Rating@Mail.ru counter -->


<!-- Rating@Mail.ru logo -->
<a href="https://top.mail.ru/jump?from=2946294">
<img src="//top-fwz1.mail.ru/counter?id=2946294;t=479;l=1" 
style="border:0;" height="0" width="0" alt="Рейтинг@Mail.ru" /></a>
<!-- //Rating@Mail.ru logo -->
