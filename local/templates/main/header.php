<?php
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
    die();
use Bitrix\Main\Page\Asset;
?>
<head>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><? $APPLICATION->ShowTitle(); ?></title>

    <link rel="shortcut icon" type="image/x-icon" href="/local/templates/main/assets/img/favicon.png">

    <!-- Шрифты -->
    <!-- google fonts -->

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">

    <!-- modernizr js -->
    <script src="/local/templates/main/assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <!-- Стили (CSS) -->
<?php
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/assets/css/bootstrap.min.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/assets/css/owl.carousel.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/assets/css/animate-text.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/assets/css/magnific-popup.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/assets/css/et-line.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/assets/css/pe-icon-7-stroke.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/assets/css/shortcode/shortcodes.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/assets/css/meanmenu.min.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/assets/css/font-awesome.min.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/style.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . '/assets/css/css/responsive.css');
//    ?>
    <?php $APPLICATION->ShowHead(); ?>
</head>
<body>
<div id="panel">
    <?$APPLICATION->ShowPanel();?>
</div>

<!--[if lt IE 8]>
<p class="browserupgrade">Вы используете <strong>устаревший</strong> браузер. Пожалуйста
    <a href="http://browsehappy.com/">обновите его</a>
</p>
<![endif]-->

<!-- Линия с контактами -->
<div class="header-top-area bg-color ptb-10 hidden-xs">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="welcome">
                    <span>
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => SITE_TEMPLATE_PATH . "/includes/header_email.php"
                            )
                        );?>
                    </span>
                    <span>
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => SITE_TEMPLATE_PATH . "/includes/header_phone.php"
                            )
                        );?>
                    </span>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="social-icon-header text-right">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                    <a href="#"><i class="fa fa-google-plus"></i></a>
                    <a href="#"><i class="fa fa-youtube"></i></a>
                    <a href="#"><i class="fa fa-dribbble"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Шапка сайта (меню) -->
<header id="sticky-header" class="header-area header-wrapper <?= ($APPLICATION->GetCurDir() === '/') ? 'transparent-header' :  'white-bg'; ?>">
    <!-- Меню (для десктопа) -->
    <div class="header-middle-area full-width">
        <div class="container">
            <div class="full-width-mega-dropdown">
                <div class="row">
                    <!-- Логотип -->
                    <div class="col-md-2 col-sm-3 col-xs-8">
                        <div class="logo ptb-22">
                            <a href="index.html">
                                <img src="/local/templates/main/assets/img/logo/logo.png" alt="main logo">
                            </a>
                        </div>
                    </div>

                    <div class="col-md-10 col-sm-9 col-xs-4 text-right dark-menu">
                        <?$APPLICATION->IncludeComponent("bitrix:menu", "main_menu", Array(
	"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
		"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
		"DELAY" => "N",	// Откладывать выполнение шаблона меню
		"MAX_LEVEL" => "2",	// Уровень вложенности меню
		"MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
			0 => "",
		),
		"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
		"MENU_CACHE_TYPE" => "N",	// Тип кеширования
		"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
		"ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
		"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
	),
	false
);?>

                        <!-- Поиск -->
                        <div class="header-right">
                            <div class="header-search">
                                <div class="search-wrapper">
                                    <a href="javascript:void(0);" class="search-open">
                                        <i class="pe-7s-search"></i>
                                    </a>
                                    <div class="search-inside animated bounceInUp">
                                        <i class="icon-close search-close fa fa-times"></i>
                                        <div class="search-overlay"></div>
                                        <div class="position-center-center">
                                            <div class="search">
                                                <form>
                                                    <input type="search" placeholder="Поиск по сайту">
                                                    <button type="submit"><i class="fa fa-search"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Меню (для мобилки) -->
                    <?$APPLICATION->IncludeComponent("bitrix:menu", "mobile_menu", Array(
                        "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
                        "CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
                        "DELAY" => "N",	// Откладывать выполнение шаблона меню
                        "MAX_LEVEL" => "2",	// Уровень вложенности меню
                        "MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
                            0 => "",
                        ),
                        "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
                        "MENU_CACHE_TYPE" => "N",	// Тип кеширования
                        "MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
                        "ROOT_MENU_TYPE" => "mobile",	// Тип меню для первого уровня
                        "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
                    ),
                        false
                    );?>
</header>
<?php
if($APPLICATION->GetCurDir() !== '/') : ?>
<!-- Хлебные крошки (навигация) -->
<div class="breadcrumb-area brand-bg ptb-100">
    <div class="container width-100">
        <div class="row z-index">
            <div class="col-md-7 col-sm-6">
                <div class="breadcrumb-title">
                    <h2 class="white-text"><?= $APPLICATION->ShowTitle(false); ?></h2>
                </div>
            </div>
            <div class="col-md-5 col-sm-6">
                <div class="breadcrumb-menu">
                    <ol class="breadcrumb text-right">
                        <li>
                            <a href="index.html">Главная</a>
                        </li>
                        <li>
                            <a href="#">О нас</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<?endif; ?>
