<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Главная'); ?>

    <!-- Слайдер -->
<?$APPLICATION->IncludeComponent("bitrix:news.list", "top_slider", Array(
    "COMPONENT_TEMPLATE" => ".default",
    "IBLOCK_TYPE" => "content",	// Тип информационного блока (используется только для проверки)
    "IBLOCK_ID" =>  getIBlockIdByCode('main_slider '),	// Код информационного блока
    "NEWS_COUNT" => "3",	// Количество новостей на странице
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
        0 => "link",
        1 => "",
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
    "PARENT_SECTION_CODE" => "",	// Код раздела
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
),
    false
);?>


    <!-- О нас -->
<section class="who-area-are pad-90" id="about_us">
    <div class="container">
        <h2 class="title-1"><?$APPLICATION->IncludeComponent(
                "bitrix:main.include",
                "",
                Array(
                    "AREA_FILE_SHOW" => "page",
                    "AREA_FILE_SUFFIX" => "about_title",
                )
            );?>
        </h2>
        <div class="row">
            <div class="col-md-7">
                <div class="who-we">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                            "AREA_FILE_SHOW" => "page",
                            "AREA_FILE_SUFFIX" => "about_text",
                        )
                    );?>
                </div>
            </div>
            <div class="col-md-5">
                <div class="about-bg">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                            "AREA_FILE_SHOW" => "page",
                            "AREA_FILE_SUFFIX" => "about_image",
                        )
                    );?>
                </div>
            </div>
        </div>
    </div>
</section>


    <!-- Основные направления -->
    <?$APPLICATION->IncludeComponent("bitrix:news.list", "main_activities", Array(
            "COMPONENT_TEMPLATE" => ".default",
    "IBLOCK_TYPE" => "content",	// Тип информационного блока (используется только для проверки)
    "IBLOCK_ID" => getIBlockIdByCode('main_activities'),	// Код информационного блока
    "NEWS_COUNT" => "3",	// Количество новостей на странице
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
    "PARENT_SECTION_CODE" => "main_page_activities",	// Код раздела
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


    <!-- Инфографика -->
<?$APPLICATION->IncludeComponent("bitrix:news.list", "infographics", Array(
    "COMPONENT_TEMPLATE" => ".default",
    "IBLOCK_TYPE" => "content",	// Тип информационного блока (используется только для проверки)
    "IBLOCK_ID" => getIBlockIdByCode('infographics'),	// Код информационного блока
    "NEWS_COUNT" => "4",	// Количество новостей на странице
    "SORT_BY1" => "ID",	// Поле для первой сортировки новостей
    "SORT_ORDER1" => "ASC",	// Направление для первой сортировки новостей
    "SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
    "SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
    "FILTER_NAME" => "",	// Фильтр
    "FIELD_CODE" => array(	// Поля
        0 => "NAME",
        1 => "PREVIEW_TEXT",
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
    "PARENT_SECTION_CODE" => "",	// Код раздела
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

<?$APPLICATION->IncludeComponent("bitrix:news", "portfolio_main_page", Array(
    "ADD_ELEMENT_CHAIN" => "N",	// Включать название элемента в цепочку навигации
    "ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
    "AJAX_MODE" => "N",	// Включить режим AJAX
    "AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
    "AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
    "AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
    "AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
    "BROWSER_TITLE" => "-",	// Установить заголовок окна браузера из свойства
    "CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
    "CACHE_GROUPS" => "Y",	// Учитывать права доступа
    "CACHE_TIME" => "36000000",	// Время кеширования (сек.)
    "CACHE_TYPE" => "A",	// Тип кеширования
    "CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
    "DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
    "DETAIL_DISPLAY_BOTTOM_PAGER" => "N",	// Выводить под списком
    "DETAIL_DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
    "DETAIL_FIELD_CODE" => array(	// Поля
        0 => "CODE",
        1 => "NAME",
        2 => "",
    ),
    "DETAIL_PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
    "DETAIL_PAGER_TEMPLATE" => "",	// Название шаблона
    "DETAIL_PAGER_TITLE" => "Страница",	// Название категорий
    "DETAIL_PROPERTY_CODE" => array(	// Свойства
        0 => "add_info",
        1 => "detail_title",
        2 => "description",
        3 => "link",
        4 => "gallery",
        5 => "",
    ),
    "DETAIL_SET_CANONICAL_URL" => "N",	// Устанавливать канонический URL
    "DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
    "DISPLAY_DATE" => "N",	// Выводить дату элемента
    "DISPLAY_NAME" => "Y",	// Выводить название элемента
    "DISPLAY_PICTURE" => "N",	// Выводить изображение для анонса
    "DISPLAY_PREVIEW_TEXT" => "N",	// Выводить текст анонса
    "DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
    "HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
    "IBLOCK_ID" => "7",	// Инфоблок
    "IBLOCK_TYPE" => "content",	// Тип инфоблока
    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
    "LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
    "LIST_FIELD_CODE" => array(	// Поля
        0 => "CODE",
        1 => "NAME",
        2 => "PREVIEW_PICTURE",
        3 => "",
    ),
    "LIST_PROPERTY_CODE" => array(	// Свойства
        0 => "",
        1 => "",
    ),
    "MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
    "META_DESCRIPTION" => "-",	// Установить описание страницы из свойства
    "META_KEYWORDS" => "-",	// Установить ключевые слова страницы из свойства
    "NEWS_COUNT" => "20",	// Количество новостей на странице
    "PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
    "PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
    "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
    "PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
    "PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
    "PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
    "PAGER_TITLE" => "Новости",	// Название категорий
    "PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
    "SEF_FOLDER" => "/portfolio/",	// Каталог ЧПУ (относительно корня сайта)
    "SEF_MODE" => "Y",	// Включить поддержку ЧПУ
    "SEF_URL_TEMPLATES" => array(
        "detail" => "#SECTION_CODE#/#ELEMENT_CODE#/",
        "news" => "",
        "section" => "",
    ),
    "SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
    "SET_STATUS_404" => "Y",	// Устанавливать статус 404
    "SET_TITLE" => "Y",	// Устанавливать заголовок страницы
    "SHOW_404" => "N",	// Показ специальной страницы
    "SORT_BY1" => "SORT",	// Поле для первой сортировки новостей
    "SORT_BY2" => "ACTIVE_FROM",	// Поле для второй сортировки новостей
    "SORT_ORDER1" => "ASC",	// Направление для первой сортировки новостей
    "SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
    "STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела
    "USE_CATEGORIES" => "N",	// Выводить материалы по теме
    "USE_FILTER" => "N",	// Показывать фильтр
    "USE_PERMISSIONS" => "N",	// Использовать дополнительное ограничение доступа
    "USE_RATING" => "N",	// Разрешить голосование
    "USE_REVIEW" => "N",	// Разрешить отзывы
    "USE_RSS" => "N",	// Разрешить RSS
    "USE_SEARCH" => "N",	// Разрешить поиск
    "USE_SHARE" => "N",	// Отображать панель соц. закладок
),
    false
);?>

    <!-- Отзывы клиентов -->
<?$APPLICATION->IncludeComponent("bitrix:news.list", "reviews", Array(
    "COMPONENT_TEMPLATE" => ".default",
    "IBLOCK_TYPE" => "content",	// Тип информационного блока (используется только для проверки)
    "IBLOCK_ID" => getIBlockIdByCode('reviews'),	// Код информационного блока
    "NEWS_COUNT" => "3",	// Количество новостей на странице
    "SORT_BY1" => "ID",	// Поле для первой сортировки новостей
    "SORT_ORDER1" => "ASC",	// Направление для первой сортировки новостей
    "SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
    "SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
    "FILTER_NAME" => "",	// Фильтр
    "FIELD_CODE" => array(	// Поля
        0 => "NAME",
        1 => "PREVIEW_TEXT",
        3 => "DETAIL_TEXT",
        4 => "",
    ),
    "PROPERTY_CODE" => array(	// Свойства
        0 => "author",
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
    "PARENT_SECTION_CODE" => "reviews-on-mainpage",	// Код раздела
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
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>