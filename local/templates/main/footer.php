<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
    die();
?>

<!-- Футер -->
<footer class="footer-style-2">
    <div class="footer-top-area brand-bg pad-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="footer-widget footer-widget-center text-center">
                        <!-- Лого + текст -->
                        <div class="footer-logo">
                            <a href="#">
                                <?$APPLICATION->IncludeComponent(
                                    "bitrix:main.include",
                                    "",
                                    Array(
                                        "AREA_FILE_SHOW" => "file",
                                        "AREA_FILE_SUFFIX" => "inc",
                                        "EDIT_TEMPLATE" => "",
                                        "PATH" => SITE_TEMPLATE_PATH . "/includes/footer_logo.php"
                                    )
                                );?>
                            </a>
                        </div>
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => SITE_TEMPLATE_PATH . "/includes/footer_text.php"
                            )
                        );?>


                        <!-- Соц. сети -->
                        <?$APPLICATION->IncludeComponent("bitrix:news.list", "social_network_for_footer", Array(
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
                            "PARENT_SECTION_CODE" => "icon-for-footer",	// Код раздела
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
        </div>
    </div>

    <!-- нижнее меню -->
    <div class="footer-bottom-area pad-20 brand-bg footer-border">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12">
                    <div class="copyright white-text">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => SITE_TEMPLATE_PATH . "/includes/footer_copyright.php"
                            )
                        );?>
                    </div>
                </div>


                <?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"bottom_manu", 
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_USE_GROUPS" => "N",
		"ROOT_MENU_TYPE" => "bottom",
		"USE_EXT" => "N",
		"COMPONENT_TEMPLATE" => "bottom_manu",
		"CHILD_MENU_TYPE" => "left"
	),
	false
);?>
            </div>
        </div>
    </div>
</footer>

<!-- JS (скрипты) -->
<!-- jquery js -->
<script src="/local/templates/main/assets/js/vendor/jquery-1.12.0.min.js"></script>
<!-- bootstrap js -->
<script src="/local/templates/main/assets/js/bootstrap.min.js"></script>
<!-- owl.carousel js -->
<script src="/local/templates/main/assets/js/owl.carousel.min.js"></script>
<!-- counterup js -->
<script src="/local/templates/main/assets/js/jquery.counterup.min.js"></script>
<script src="/local/templates/main/assets/js/waypoints.min.js"></script>
<!-- magnific-popup js -->
<script src="/local/templates/main/assets/js/jquery.magnific-popup.min.js"></script>
<!-- mixitup js -->
<script src="/local/templates/main/assets/js/jquery.mixitup.min.js"></script>
<!-- mixitup js -->
<script src="/local/templates/main/assets/js/jquery.meanmenu.js"></script>
<!-- jquery.nav js -->
<script src="/local/templates/main/assets/js/jquery.nav.js"></script>
<!-- jquery.nav js -->
<script src="/local/templates/main/assets/js/jquery.parallax-1.1.3.js"></script>
<!-- animate text js -->
<script src="/local/templates/main/assets/js/animate-text.js"></script>
<!-- plugins js -->
<script src="/local/templates/main/assets/js/plugins.js"></script>
<!-- main js -->
<script src="/local/templates/main/assets/js/main.js"></script>
</body>
</html>