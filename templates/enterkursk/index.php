<?php
 /**
 * Template for Joomla by Gutnev Andrey
 * @author     Gutnev Andrey
 * @copyright  Copyright (c) 2013
 * @license    GNU GPL
 */
 defined('_JEXEC') or die('Restricted access');
$doc = JFactory::getDocument();
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

    <nav class="topmenu flex">
        <jdoc:include type="modules" name="topmenu"/>
    </nav>

	<header class="header">
		<div class="center-header">

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

	<div class="middle flex">

		
			<div class="content">
			<jdoc:include type="component" />
			
			    <div class="video boxcontent">
			        <h3 class="doptitle">Видео</h3>
			        <p>Посмотрите небольшой видеоролик, в котором в общих чертах рассказано об основных этапах задания, разработки и продвижения, а также показан пример типового сайта-каталога.</p>
			        <iframe width="560" height="315" src="https://www.youtube.com/embed/7uThyW47rSg" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			    </div>

                <div class="form-wrap">
                <h3 class="center-title form-title">Форма заказа</h3>
                    <div class="flex form-cat">
                        <div class="cat">
                            <img src="/landing/images/kot.png" alt="Создание сайта" title="Создание сайта">
                            <div class="cat-title">Не огорчай котика, закажи сайт!</div>
                        </div>
                        <div class="form-zakaz"><form action="mail.php" method="post">
                                <div class="form-input"><label>Ваше имя:</label><input class="form-name" type="text" placeholder="Введите имя" required="" name="name" size="16" /></div>
                                <div class="form-input"><label>Ваш телефон:</label><input class="form-phone" type="tel" placeholder="8**********" required="" pattern="(\+?\d[- .]*){7,13}" title="Международный, государственный или местный телефонный номер" name="phone" size="16" /></div>
                                <div class="form-input"><label>Ваш e-mail:</label><input class="form-mail" type="email" placeholder="email@email" required="" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" name="email" size="16" /></div>
                                <div class="form-input form-massage-wrap"><label>Сообщение:</label><textarea name="mess" class="form-massage" cols="23" rows="8"></textarea></div>
                                <div class="form-input"><label>Защита от спама: введите сумму 2+2:</label><input id="form-capcha" type="number" required="" name="capcha" /></div>
                                <div class="form-input form-pd"><label>Даю согласие на обработку <a href="#" target="_blank" rel="noopener noreferrer">персональных данных</a>:</label><input id="form-pd" type="checkbox" required="" name="pd" /></div>
                                <input class="form-submit" type="submit" name="submit" value="Заказать сайт" />
                            </form>
                        </div>
                    </div>
                    <div class="message-form">
                        <p>Загрузка...</p>
                    </div>
                </div>
			</div><!-- .content -->
		

		<aside class="left-sidebar">
			<div class="leftmenu">
			<div class="left-title close-toggle">Полезная информация</div>
				<jdoc:include type="modules" name="left" style="xhtml"/>
			</div>
			
		</aside><!-- .left-sidebar -->

	</div><!-- .middle-->

	<footer class="footer">
		<div class="footer-center">
        
        <div class="contact" itemscope itemtype="https://schema.org/LocalBusiness">
					<div class="fn org" itemprop="name"><span class="category">Веб-студия </span>EnterKursk - Создание сайтов <span itemprop="address">Курск</span></div><div class="tel" itemprop="telephone">+7 920 721-33-46</div><div class="email" itemprop="email">info@enterkursk.ru</div>
				        <p>Время, в которое рекомендуется делать звонок:</p><div class="workhours" itemprop="openingHours">Круглосуточно 10:00 - 22:00</div>
		</div>
        
        <div class="metrika">
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
    <script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
    <script src="//yastatic.net/share2/share.js"></script>
    <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir,gplus,twitter"></div>
</div>
			
<div class="scroll">Наверх</div>
			
</body>
</html>