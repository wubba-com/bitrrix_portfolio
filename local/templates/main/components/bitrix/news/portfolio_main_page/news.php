<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>


<section class="pt-90 pb-60" id="portfolio"">
    <div class="container">
        <div class="row">
            <div class="section-heading text-center mb-70">
                <h2>Портфолио</h2>
                <p>Лучший способ найти хорошую команду - это посмотреть результаты её работы</p>
            </div>
        </div>
        <div class="row">

            <?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "portfolioSectionList", Array(
                "ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
                "CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
                "CACHE_GROUPS" => "Y",	// Учитывать права доступа
                "CACHE_TIME" => "36000000",	// Время кеширования (сек.)
                "CACHE_TYPE" => "N",	// Тип кеширования
                "COUNT_ELEMENTS" => "Y",	// Показывать количество элементов в разделе
                "COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",	// Показывать количество
                "FILTER_NAME" => "sectionsFilter",	// Имя массива со значениями фильтра разделов
                "IBLOCK_ID" => $arParams['IBLOCK_ID'],	// Инфоблок
                "IBLOCK_TYPE" => $arParams['IBLOCK_TYPE'],	// Тип инфоблока
                "SECTION_CODE" => "",	// Код раздела
                "SECTION_FIELDS" => array(	// Поля разделов
                    0 => "CODE",
                    1 => "NAME",
                    2 => "",
                ),
                "SECTION_ID" => "",	// ID раздела
                "SECTION_URL" => "",	// URL, ведущий на страницу с содержимым раздела
                "SECTION_USER_FIELDS" => array(	// Свойства разделов
                    0 => "",
                    1 => "",
                ),
                "SHOW_PARENT_NAME" => "Y",	// Показывать название раздела
                "TOP_DEPTH" => "1",	// Максимальная отображаемая глубина разделов
                "VIEW_MODE" => "LINE",	// Вид списка подразделов
            ),
                false
            );?>

            <?$APPLICATION->IncludeComponent(
                "bitrix:news.list",
                "portfolioElementsList",
                Array(
                    "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                    "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                    "NEWS_COUNT" => $arParams["NEWS_COUNT"],
                    "SORT_BY1" => $arParams["SORT_BY1"],
                    "SORT_ORDER1" => $arParams["SORT_ORDER1"],
                    "SORT_BY2" => $arParams["SORT_BY2"],
                    "SORT_ORDER2" => $arParams["SORT_ORDER2"],
                    "FIELD_CODE" => $arParams["LIST_FIELD_CODE"],
                    "PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
                    "DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
                    "SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
                    "IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
                    "DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
                    "SET_TITLE" => $arParams["SET_TITLE"],
                    "SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
                    "MESSAGE_404" => $arParams["MESSAGE_404"],
                    "SET_STATUS_404" => $arParams["SET_STATUS_404"],
                    "SHOW_404" => $arParams["SHOW_404"],
                    "FILE_404" => $arParams["FILE_404"],
                    "INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
                    "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                    "CACHE_TIME" => $arParams["CACHE_TIME"],
                    "CACHE_FILTER" => $arParams["CACHE_FILTER"],
                    "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                    "DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
                    "DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
                    "PAGER_TITLE" => $arParams["PAGER_TITLE"],
                    "PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
                    "PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
                    "PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
                    "PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
                    "PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
                    "PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
                    "PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
                    "PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
                    "DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
                    "DISPLAY_NAME" => "Y",
                    "DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
                    "DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
                    "PREVIEW_TRUNCATE_LEN" => $arParams["PREVIEW_TRUNCATE_LEN"],
                    "ACTIVE_DATE_FORMAT" => $arParams["LIST_ACTIVE_DATE_FORMAT"],
                    "USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
                    "GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
                    "FILTER_NAME" => $arParams["FILTER_NAME"],
                    "HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
                    "CHECK_DATES" => $arParams["CHECK_DATES"],
                ),
                $component
            );?>
        </div>
    </div>
</section>
