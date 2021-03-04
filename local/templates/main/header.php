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
            <?$APPLICATION->IncludeComponent("bitrix:news.list", "social_network", Array(
                "COMPONENT_TEMPLATE" => ".default",
                "IBLOCK_TYPE" => "content",	// Тип информационного блока (используется только для проверки)
                "IBLOCK_ID" => getIBlockIdByCode('social'),	// Код информационного блока
                "NEWS_COUNT" => "7",	// Количество новостей на странице
                "SORT_BY1" => "ID",	// Поле для первой сортировки новостей
                "SORT_ORDER1" => "ASC",	// Направление для первой сортировки новостей
                "SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
                "SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
                "FILTER_NAME" => "",	// Фильтр
                "FIELD_CODE" => array(	// Поля
                    0 => "NAME",
                    1 => "PREVIEW_TEXT",
                ),
                "PROPERTY_CODE" => array(	// Свойства
                    0 => "LINK",
                ),
                "CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
                "DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
                "AJAX_MODE" => "N",	// Включить режим AJAX
                "AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
                "AJAX_OPTION_STYLE" => "N",	// Включить подгрузку стилей
                "AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
                "AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
                "CACHE_TYPE" => "N",	// Тип кеширования
                "CACHE_TIME" => "36000000",	// Время кеширования (сек.)
                "CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
                "CACHE_GROUPS" => "Y",	// Учитывать права доступа
                "PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
                "ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
                "SET_TITLE" => "N",	// Устанавливать заголовок страницы
                "SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
                "SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
                "SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
                "SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
                "INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
                "ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
                "HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
                "PARENT_SECTION" => "",	// ID раздела
                "PARENT_SECTION_CODE" => "icon-for-header",	// Код раздела
                "INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
                "STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
                "DISPLAY_DATE" => "N",	// Выводить дату элемента
                "DISPLAY_NAME" => "N",	// Выводить название элемента
                "DISPLAY_PICTURE" => "N",	// Выводить изображение для анонса
                "DISPLAY_PREVIEW_TEXT" => "N",	// Выводить текст анонса
                "PAGER_TEMPLATE" => "",	// Шаблон постраничной навигации
                "DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
                "DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
                "PAGER_TITLE" => "Новости",	// Название категорий
                "PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
                "PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
                "PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
                "PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
                "SET_STATUS_404" => "N",	// Устанавливать статус 404
                "SHOW_404" => "N",	// Показ специальной страницы
                "MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
            ),
                false
            );?>
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
	"ALLOW_MULTI_SELECT" => "Y",	// Разрешить несколько активных пунктов одновременно
		"CHILD_MENU_TYPE" => "subtop",	// Тип меню для остальных уровней
		"DELAY" => "N",	// Откладывать выполнение шаблона меню
		"MAX_LEVEL" => "2",	// Уровень вложенности меню
		"MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
			0 => "",
		),
		"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
		"MENU_CACHE_TYPE" => "N",	// Тип кеширования
		"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
		"ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
		"USE_EXT" => "Y",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
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
            <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "topNavigate", Array(
	"PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
		"SITE_ID" => "s1",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
		"START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
	),
	false
);?>
        </div>
    </div>
</div>
<?endif; ?>
