<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Услуги");
?>

<?php

    function getIncludesComponents(string $name_file) {
        global $APPLICATION;
        return $APPLICATION->IncludeComponent(
            "bitrix:main.include",
            "",
            Array(
                "AREA_FILE_SHOW" => "file",
                "AREA_FILE_SUFFIX" => "inc",
                "EDIT_TEMPLATE" => "",
                "PATH" => "/services/includes/" . $name_file
            )
        );
    }
?>

    <!-- Текстовый блок + скилы -->
<section class="who-area-are bg-color pad-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="who-we">
                    <h2 class="title-1">
                        <?php getIncludesComponents("team_title.php"); ?>
                    </h2>
                    <p>
                        <?php getIncludesComponents("team_paragraph_1.php")?>
                    </p>
                    <p>
                        <?php getIncludesComponents("team_paragraph_2.php") ?>
                    </p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="our-skill">
                    <h2 class="title-1">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "/services/includes/skills_title.php"
                            )
                        );?>
                    </h2>
                    <div class="progress-list">
                        <div class="progress">
                            <div class="lead">Web-дизайн</div>
                            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                 style="width: <?php getIncludesComponents("progress_web.php")?>%;">
                                <span><?php getIncludesComponents("progress_web.php")?>%</span>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="lead">PHP (Bitrix / Laravel / Symfony)</div>
                            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                 style="width: <?php getIncludesComponents("progress_php.php")?>%;">
                                <span><?php getIncludesComponents("progress_php.php")?>%</span>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="lead">Node.js</div>
                            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                                 aria-valuemax="100" style="width: <?php getIncludesComponents("progress_nodejs.php")?>%;">
                                <span><?php getIncludesComponents("progress_nodejs.php")?>%</span>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="lead">JavaScript (Angular / React)</div>
                            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                 style="width: <? getIncludesComponents("progress_javascript.php")?>%;">
                                <span><?php getIncludesComponents("progress_javascript.php")?>%</span>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="lead">CSS (LESS)</div>
                            <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0"
                                 aria-valuemax="100" style="width: <?php getIncludesComponents("progress_css.php")?>%;">
                                <span><?php getIncludesComponents("progress_css.php") ?>%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Направления -->
<?$APPLICATION->IncludeComponent("bitrix:news.list", "main_activities_on_services", Array(
    "COMPONENT_TEMPLATE" => ".default",
    "IBLOCK_TYPE" => "content",	// Тип информационного блока (используется только для проверки)
    "IBLOCK_ID" => getIBlockIdByCode('main_activities'),	// Код информационного блока
    "NEWS_COUNT" => "6",	// Количество новостей на странице
    "SORT_BY1" => "ID",	// Поле для первой сортировки новостей
    "SORT_ORDER1" => "ASC",	// Направление для первой сортировки новостей
    "SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
    "SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
    "FILTER_NAME" => "",	// Фильтр
    "FIELD_CODE" => array(	// Поля
        0 => "NAME",
        1 => "PREVIEW_TEXT",
        2 => "PREVIEW_PICTURE",
        3 => "DETAIL_TEXT",
        4 => "",
    ),
    "PROPERTY_CODE" => array(	// Свойства

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
    "PARENT_SECTION_CODE" => "service",	// Код раздела
    "INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
    "STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
    "DISPLAY_DATE" => "N",	// Выводить дату элемента
    "DISPLAY_NAME" => "N",	// Выводить название элемента
    "DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
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
),     false
);?>

<?$APPLICATION->IncludeComponent(
    "bitrix:news",
    "services_company",
    Array(
        "ADD_ELEMENT_CHAIN" => "N",
        "ADD_SECTIONS_CHAIN" => "N",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "Y",
        "BROWSER_TITLE" => "-",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "N",
        "CACHE_TIME" => "36000000",
        "CACHE_TYPE" => "A",
        "CHECK_DATES" => "Y",
        "DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
        "DETAIL_DISPLAY_BOTTOM_PAGER" => "N",
        "DETAIL_DISPLAY_TOP_PAGER" => "N",
        "DETAIL_FIELD_CODE" => array("",""),
        "DETAIL_PAGER_SHOW_ALL" => "N",
        "DETAIL_PAGER_TEMPLATE" => "",
        "DETAIL_PAGER_TITLE" => "Страница",
        "DETAIL_PROPERTY_CODE" => array("",""),
        "DETAIL_SET_CANONICAL_URL" => "N",
        "DISPLAY_BOTTOM_PAGER" => "N",
        "DISPLAY_DATE" => "N",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "N",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "DISPLAY_TOP_PAGER" => "N",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "IBLOCK_ID" => "8",
        "IBLOCK_TYPE" => "content",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "LIST_ACTIVE_DATE_FORMAT" => "d.M.y g:i A",
        "LIST_FIELD_CODE" => array("NAME","PREVIEW_TEXT",""),
        "LIST_PROPERTY_CODE" => array("price","pricing_plan","link",""),
        "MESSAGE_404" => "",
        "META_DESCRIPTION" => "-",
        "META_KEYWORDS" => "-",
        "NEWS_COUNT" => "4",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => ".default",
        "PAGER_TITLE" => "Новости",
        "PREVIEW_TRUNCATE_LEN" => "",
        "SEF_FOLDER" => "/services/",
        "SEF_MODE" => "Y",
        "SEF_URL_TEMPLATES" => Array("detail"=>"#SECTION_CODE#/#ELEMENT_CODE#/","news"=>"","section"=>"#SECTION_CODE#/"),
        "SET_LAST_MODIFIED" => "N",
        "SET_STATUS_404" => "Y",
        "SET_TITLE" => "N",
        "SHOW_404" => "N",
        "SORT_BY1" => "SORT",
        "SORT_BY2" => "SORT",
        "SORT_ORDER1" => "ASC",
        "SORT_ORDER2" => "ASC",
        "STRICT_SECTION_CHECK" => "N",
        "USE_CATEGORIES" => "N",
        "USE_FILTER" => "N",
        "USE_PERMISSIONS" => "N",
        "USE_RATING" => "N",
        "USE_REVIEW" => "N",
        "USE_RSS" => "N",
        "USE_SEARCH" => "N",
        "USE_SHARE" => "N"
    )
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>