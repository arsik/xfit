<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!doctype html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Introducing Lollipop, a sweet new take on Android.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <!-- Page styles -->
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/nlform.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">

    <div class="header mdl-layout__header mdl-layout__header--waterfall">
        <div class="mdl-layout__header-row">
          <span class="title mdl-layout-title">
            <img class="logo-image" src="/images/logo.png">
          </span>
            <!-- Add spacer, to align navigation to the right in desktop -->
            <div class="header-spacer mdl-layout-spacer"></div>
            <!-- Navigation -->
            <div class="navigation-container">
                <nav class="navigation mdl-navigation">
                    <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Сеть X-FIT</a>
                    <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Клубы</a>
                    <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Услуги</a>
                    <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Акции</a>
                    <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">Франчайзинг</a>
                    <a class="mdl-navigation__link mdl-typography--text-uppercase" href="">XFIT - PRO</a>
                    <div class="mmenu">
                        <div class="call">
                            <a href="#">Перезвоните мне<br>обратная связь</a>
                            <p>8-800-333-52-52</p>
                        </div>
                        <div id="ttip" class="title">
				<span>
				    <span class="city">Ваш город</span> 
				    <span class="quest-ico">?</span>
				    <span class="ttip" style="display:none;">Вы находитесь в г.Самара.<br>Вам показывается информация, актуальная для данного региона. Для просмотра клубов в других городах необходимо открыть страницу <a href="/club/">«Клубы»</a> и выбрать соответствующий регион.</span>
				    <strong>Самара</strong>
				</span>
                            <ul id="drop-down-menu">
                                <li><a href="#" id="52">Москва</a></li>
                                <li><a href="#" id="63">Волгоград</a></li>
                                <li><a href="#" id="57">Воронеж</a></li>
                                <li><a href="#" id="54">Казань</a></li>
                                <li><a href="#" id="55">Краснодар</a></li>
                                <li><a href="#" id="59">Новосибирск</a></li>
                                <li><a href="#" id="11715">Пермь</a></li>
                                <li><a href="#" id="64">Ростов-на-Дону</a></li>
                                <li><a href="#" id="61">Самара</a></li>
                                <li><a href="#" id="58">Брянск</a></li>
                                <li><a href="#" id="38957">Нижний Новгород</a></li>
                                <li><a href="#" id="112637">Норильск</a></li>
                                <li><a href="#" id="83117">Чита</a></li>
                                <li><a href="#" id="83118">Магадан</a></li>
                                <li><a href="#" id="83119">Ангарск</a></li>
                                <li><a href="#" id="83120">Владикавказ</a></li>
                                <li><a href="#" id="12088">Астрахань</a></li>
                                <li><a href="#" id="33952">Балезино</a></li>
                                <li><a href="#" id="12090">Кстово</a></li>
                                <li><a href="#" id="1026">Магнитогорск</a></li>
                                <li><a href="#" id="56">Новороссийск</a></li>
                                <li><a href="#" id="33954">Рубцовск</a></li>
                                <li><a href="#" id="11711">Сухум</a></li>
                                <li><a href="#" id="13555">Саратов</a></li>
                                <li><a href="#" id="14657">Саров</a></li>
                                <li><a href="#" id="33958">Сыктывкар</a></li>
                                <li><a href="#" id="12266">Тюмень</a></li>
                                <li><a href="#" id="52047">Уфа</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>

            <!--<button class="more-button mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="more-button">
              <i class="material-icons">more_vert</i>
            </button>
            <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right mdl-js-ripple-effect" for="more-button">
              <li class="mdl-menu__item">link</li>
            </ul>-->
          <span class="mobile-title mdl-layout-title">
            <img class="logo-image" src="/images/logo.png">
          </span>
        </div>
    </div>

    <div class="drawer mdl-layout__drawer">
        <span class="mdl-layout-title">
          <img class="logo-image" src="/images/logo.png">
        </span>
        <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="">Сеть X-FIT</a>
            <a class="mdl-navigation__link" href="">Клубы</a>
            <a class="mdl-navigation__link" href="">Услуги</a>
            <a class="mdl-navigation__link" href="">Акции</a>
            <a class="mdl-navigation__link" href="">Франчайзинг</a>
            <a class="mdl-navigation__link" href="">XFIT - PRO</a>

        </nav>
    </div>

    <div class="content mdl-layout__content">
        <?= $content ?>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        var ddm = false;
        $("#drop-down-menu").niceScroll({
            cursorcolor: "#68b44a",
            background: "#565656",
            autohidemode: false,
            cursorborder: "none",
        });
        $('#cards-menu li').on('click', function(e){
            $('#cards-menu li').removeClass('active');
            $(this).addClass('active');
        });
        $('#ttip').on('click', function(e){
            if(!ddm) { $('#drop-down-menu').css('display','block');ddm = true; }
            else { $('#drop-down-menu').css('display','none');ddm = false; }
        });
    });

</script>
<script src="/js/material.min.js"></script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
