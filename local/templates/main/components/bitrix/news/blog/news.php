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
			<div class="col-md-8 col-sm-12 col-xs-12">
				<?$APPLICATION->IncludeComponent(
					"bitrix:news.list",
					"blogList",
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
				<!-- Пагинация (постраничная навигация) -->

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