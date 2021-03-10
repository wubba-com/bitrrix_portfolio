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
<!-- Блог -->
<div class="blog-area ptb-90">
    <div class="container">
        <div class="row">
            <!-- Контент материала -->
            <div class="col-md-8 col-sm-12 col-xs-12">
				<?$ElementID = $APPLICATION->IncludeComponent(
					"bitrix:news.detail",
					"blogDetail",
					Array(
						"DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
						"DISPLAY_NAME" => $arParams["DISPLAY_NAME"],
						"DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
						"DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
						"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
						"IBLOCK_ID" => $arParams["IBLOCK_ID"],
						"FIELD_CODE" => $arParams["DETAIL_FIELD_CODE"],
						"PROPERTY_CODE" => $arParams["DETAIL_PROPERTY_CODE"],
						"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
						"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
						"META_KEYWORDS" => $arParams["META_KEYWORDS"],
						"META_DESCRIPTION" => $arParams["META_DESCRIPTION"],
						"BROWSER_TITLE" => $arParams["BROWSER_TITLE"],
						"SET_CANONICAL_URL" => $arParams["DETAIL_SET_CANONICAL_URL"],
						"DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
						"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
						"SET_TITLE" => $arParams["SET_TITLE"],
						"MESSAGE_404" => $arParams["MESSAGE_404"],
						"SET_STATUS_404" => $arParams["SET_STATUS_404"],
						"SHOW_404" => $arParams["SHOW_404"],
						"FILE_404" => $arParams["FILE_404"],
						"INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
						"ADD_SECTIONS_CHAIN" => $arParams["ADD_SECTIONS_CHAIN"],
						"ACTIVE_DATE_FORMAT" => $arParams["DETAIL_ACTIVE_DATE_FORMAT"],
						"CACHE_TYPE" => $arParams["CACHE_TYPE"],
						"CACHE_TIME" => $arParams["CACHE_TIME"],
						"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
						"USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
						"GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
						"DISPLAY_TOP_PAGER" => $arParams["DETAIL_DISPLAY_TOP_PAGER"],
						"DISPLAY_BOTTOM_PAGER" => $arParams["DETAIL_DISPLAY_BOTTOM_PAGER"],
						"PAGER_TITLE" => $arParams["DETAIL_PAGER_TITLE"],
						"PAGER_SHOW_ALWAYS" => "N",
						"PAGER_TEMPLATE" => $arParams["DETAIL_PAGER_TEMPLATE"],
						"PAGER_SHOW_ALL" => $arParams["DETAIL_PAGER_SHOW_ALL"],
						"CHECK_DATES" => $arParams["CHECK_DATES"],
						"ELEMENT_ID" => $arResult["VARIABLES"]["ELEMENT_ID"],
						"ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],
						"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
						"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
						"IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
						"USE_SHARE" => $arParams["USE_SHARE"],
						"SHARE_HIDE" => $arParams["SHARE_HIDE"],
						"SHARE_TEMPLATE" => $arParams["SHARE_TEMPLATE"],
						"SHARE_HANDLERS" => $arParams["SHARE_HANDLERS"],
						"SHARE_SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
						"SHARE_SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
						"ADD_ELEMENT_CHAIN" => (isset($arParams["ADD_ELEMENT_CHAIN"]) ? $arParams["ADD_ELEMENT_CHAIN"] : ''),
						'STRICT_SECTION_CHECK' => (isset($arParams['STRICT_SECTION_CHECK']) ? $arParams['STRICT_SECTION_CHECK'] : ''),
					),
					$component
				);?>
				<br>
            </div>

            <!-- Правая колонка -->
            <div class="col-md-4 col-sm-12 col-xs-12 mt-sm-40 mt-xs-40">

                <!-- Поиск -->
                <div class="widget mb-60">
				<?$APPLICATION->IncludeComponent("bitrix:search.form", "searchForm", Array(
						"PAGE" => "#SITE_DIR#search/index.php",	// Страница выдачи результатов поиска (доступен макрос 	#SITE_DIR#)
						"USE_SUGGEST" => "Y",	// Показывать подсказку с поисковыми фразами
					),
					false
					);?>
                </div>

                <!-- Категории -->
                <div class="widget mb-60">
                    <h4 class="sidebar-title text-uppercase mb-35 pb-10">Категории</h4>
                    <?$APPLICATION->IncludeComponent(
						"bitrix:catalog.section.list",
						"blogSections",
						array(
							"ADD_SECTIONS_CHAIN" => "Y",
							"CACHE_FILTER" => "N",
							"CACHE_GROUPS" => "N",
							"CACHE_TIME" => "36000000",
							"CACHE_TYPE" => "N",
							"COUNT_ELEMENTS" => "Y",
							"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
							"FILTER_NAME" => "sectionsFilter",
							"IBLOCK_ID" => "9",
							"IBLOCK_TYPE" => "content",
							"SECTION_CODE" => "",
							"SECTION_FIELDS" => array(
								0 => "",
								1 => "",
							),
							"SECTION_ID" => $_REQUEST["SECTION_ID"],
							"SECTION_URL" => "#SECTION_CODE#/",
							"SECTION_USER_FIELDS" => array(
								0 => "",
								1 => "",
							),
							"SHOW_PARENT_NAME" => "Y",
							"TOP_DEPTH" => "1",
							"VIEW_MODE" => "LINE",
							"COMPONENT_TEMPLATE" => "blogSections"
						),
						false
					);?>
                </div>

                <!-- Популярные теги -->
                <div class="widget mb-60">
                    <h4 class="sidebar-title text-uppercase mb-35 pb-10">Популярные теги</h4>
                    <ul class="tag">
                        <li>
                            <a href="#">PHP</a>
                        </li>
                        <li>
                            <a href="#">UI/UX</a>
                        </li>
                        <li>
                            <a href="#">Дизайн</a>
                        </li>
                        <li class="active">
                            <a href="#">Портфолио</a>
                        </li>

                        <li>
                            <a href="#">UI & UX</a>
                        </li>
                        <li>
                            <a href="#">Html5</a>
                        </li>
                        <li>
                            <a href="#">Css3</a>
                        </li>
                    </ul>
                </div>

			</div>
		</div>
	</div>
</div>

