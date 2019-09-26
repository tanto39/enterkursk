<?php
 /**
 * Template for Joomla by Gutnev Andrey
 * @author     Gutnev Andrey
 * @copyright  Copyright (c) 2013
 * @license    GNU GPL
 */
 defined('_JEXEC') or die('Restricted access');
$mytitle = JFactory::getDocument()->getTitle();
$myurl = JURI::current();
 ?>
 <?php $uri = preg_replace("/\?.*/i",'', $_SERVER['REQUEST_URI']);
 
if ((!strpos($uri, 'administrator'))  && (strlen($uri)>1)) {
  if (rtrim($uri,'/')!=$uri) {
    header("HTTP/1.1 301 Moved Permanently");
    header('Location: https://'.$_SERVER['SERVER_NAME'].str_replace($uri, rtrim($uri,'/'), $_SERVER['REQUEST_URI']));
    exit();    
  }
}

if (isset($this->_script['text/javascript'])) {
 $this->_script['text/javascript'] = preg_replace('%jQuery\(window\)\.on\(\'load\',\s*function\(\)\s*{\s*new\s*JCaption\(\'img.caption\'\);\s*}\);\s*%', '', $this->_script['text/javascript']); //ищем и заменяем наш скрипт на дырку от бублика
 if (empty($this->_script['text/javascript']))
     unset($this->_script['text/javascript']); //если кроме нашего скрипта ничего нет, то убираем тег script
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
<meta content="telephone=no" name="format-detection">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<?php
unset($this->_generator); 
  $this->setGenerator('Дизайн, верстка, натяжка на CMS Гутнев Андрей - enterkursk.ru');
?>

<jdoc:include type="head" />
  <link rel="stylesheet" type="text/css" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/style.css"/>
  <script defer src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/jquery-3.1.1.min.js"></script>
  <script defer src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/myscripts.js"></script>
  
  <!--[if IE]>
    <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/iehtmlfix.js"></script>
<![endif]-->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-43331430-2', 'auto');
  ga('send', 'pageview');

</script>
</head>

<body>

<div class="wrapper">

	<header class="header">
		<div class="center-header">
        	
        	<nav class="topmenu">
                <jdoc:include type="modules" name="topmenu"/>
			</nav>
            
            <div class="top-box">
				<?php if ($uri != "/protsess-sozdaniya-sajta"):?>
					<a class="top-box1" href="/protsess-sozdaniya-sajta"><span>Создание сайта</span></a>
				<?php else:?>
					<a class="top-box1" href="#"><span>Создание сайта</span></a>
				<?php endif;?>	
				
				<?php if ($uri != "/chto-takoe-seo"):?>
					<a class="top-box2" href="/chto-takoe-seo"><span>Продвижение сайта</span></a>
				<?php else:?>
					<a class="top-box2" href="#"><span>Продвижение сайта</span></a>
				<?php endif;?>
				
				<?php if ($uri != "/svyazhites-s-nami"):?>
					<a class="top-box3" href="/svyazhites-s-nami"><span>Прибыль</span></a>
				<?php else:?>
					<a class="top-box3" href="#"><span>Прибыль</span></a>
				<?php endif;?>
            </div>
            
            <div class="logo"><div class="logo-wrap">8(920)721-33-46</div></div>
        </div>
        
	</header><!-- .header-->

	<div class="middle">

		
			<main class="content">
			<jdoc:include type="component" />

			</main><!-- .content -->
		

		<aside class="left-sidebar">
			<div class="leftmenu">
			<div class="left-title">Полезная информация:</div>
				<jdoc:include type="modules" name="left" style="xhtml"/>
			</div>
           
            <div id="info">
				<div id="beget"><p>Мы рекомендуем хостинг</p><a target="_blank" href="http://www.beget.ru/order?id=64352" ><img src="images/beget.png" alt="beget.ru" title="beget.ru"></a></div>
			</div>
            
            <div class="bannerCalc">			
				<a href="/kalculator-uslug">Рассчитайте стоимость сайта с помощью калькулятора услуг</a>
			</div>
        
			<!-- VK Widget 
			<div id="vk_groups"></div>
			<script type="text/javascript">
			VK.Widgets.Group("vk_groups", {mode: 0, width: "215", height: "200", color1: 'BDFFB5', color2: '2B587A', color3: '51D253'}, 110358948);
			</script> -->
			
		</aside><!-- .left-sidebar -->

	</div><!-- .middle-->

	<footer class="footer">
		<div class="footer-center">
        
        <div class="contact" itemscope itemtype="https://schema.org/LocalBusiness">
					<div class="fn org" itemprop="name"><span class="category">Веб-студия </span>EnterKursk - Создание сайтов <span itemprop="address">Курск</span></div><div class="tel" itemprop="telephone">+7 920 721-33-46</div><div class="email" itemprop="email">info@enterkursk.ru</div>
				        <p>Время, в которое рекомендуется делать звонок:</p><div class="workhours" itemprop="openingHours">Круглосуточно 10:00 - 22:00</div>
		</div>
        
        <div class="metrika">
		<!-- Yandex.Metrika informer
<a href="http://metrika.yandex.ru/stat/?id=23785942&amp;from=informer"
target="_blank" rel="nofollow"><img src="//bs.yandex.ru/informer/23785942/3_1_FFFFFFFF_EFEFEFFF_0_pageviews"
style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" onclick="try{Ya.Metrika.informer({i:this,id:23785942,lang:'ru'});return false}catch(e){}"/></a>
 /Yandex.Metrika informer -->

<!-- Yandex.Metrika counter -->
<script>
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter23785942 = new Ya.Metrika({id:23785942,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
        } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/23785942" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</div>

        </div>   
	</footer><!-- .footer -->

</div><!-- .wrapper -->
<div class="socbuttons">
				<div class="vk">
				<!-- noindex --><a rel="nofollow" target="_blank" href="https://vkontakte.ru/share.php?url=<?php echo($myurl)?>"></a><!--/ noindex -->
				</div>
				
				<div class="twitter">
				<!-- noindex --><a rel="nofollow" target="_blank" href="https://twitter.com/intent/tweet?text=Создать%20сайт:<?php echo($myurl);?>"></a><!--/ noindex -->
				</div>
				
				<div class="facebook">
				<!-- noindex --><a rel="nofollow" target="_blank" href="https://www.facebook.com/sharer.php?u=<?php echo($myurl);?>"></a><!--/ noindex -->
				</div>
				
				<div class="mail">
				<!-- noindex --><a rel="nofollow" target="_blank" href="https://connect.mail.ru/share?share_url=<?php echo($myurl);?>"></a><!--/ noindex -->
				</div>
				
				<div class="google">
				<!-- noindex --><a rel="nofollow" target="_blank" href="https://plus.google.com/share?url=<?php echo($myurl);?>"></a><!--/ noindex -->
				</div>
				
				<div class="odnoclassniki">
				<!-- noindex --><a rel="nofollow" target="_blank" href="https://www.odnoklassniki.ru/dk?st.cmd=addShare&amp;st.s=1&amp;st._surl=<?php echo($myurl);?>"></a><!--/ noindex -->
				</div>
			</div>
			
			<div class="scroll">Наверх</div>
			
</body>
</html>