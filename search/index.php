<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Поиск");
?>
<div class="blog-area ptb-90">
	<div class="container">
        <div class="row">
			<div class="col-md-8 col-sm-12 col-xs-12">
					<?$APPLICATION->IncludeComponent("bitrix:search.page", "search_page", Array(
						"AJAX_MODE" => "N",	// Включить режим AJAX
							"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
							"AJAX_OPTION_HISTORY" => "Y",	// Включить эмуляцию навигации браузера
							"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
							"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
							"CACHE_TIME" => "3600",	// Время кеширования (сек.)
							"CACHE_TYPE" => "A",	// Тип кеширования
							"CHECK_DATES" => "Y",	// Искать только в активных по дате документах
							"DEFAULT_SORT" => "rank",	// Сортировка по умолчанию
							"DISPLAY_BOTTOM_PAGER" => "N",	// Выводить под результатами
							"DISPLAY_TOP_PAGER" => "N",	// Выводить над результатами
							"FILTER_NAME" => "",	// Дополнительный фильтр
							"NO_WORD_LOGIC" => "N",	// Отключить обработку слов как логических операторов
							"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
							"PAGER_TEMPLATE" => "",	// Название шаблона
							"PAGER_TITLE" => "Результаты поиска",	// Название результатов поиска
							"PAGE_RESULT_COUNT" => "50",	// Количество результатов на странице
							"RESTART" => "N",	// Искать без учета морфологии (при отсутствии результата поиска)
							"SHOW_WHEN" => "N",	// Показывать фильтр по датам
							"SHOW_WHERE" => "N",	// Показывать выпадающий список "Где искать"
							"USE_LANGUAGE_GUESS" => "Y",	// Включить автоопределение раскладки клавиатуры
							"USE_SUGGEST" => "Y",	// Показывать подсказку с поисковыми фразами
							"USE_TITLE_RANK" => "N",	// При ранжировании результата учитывать заголовки
							"arrFILTER" => "",	// Ограничение области поиска
							"arrWHERE" => ""
						),
						false
					);?>
			</div>
			<div class="col-md-4 col-sm-12 col-xs-12 mt-sm-40 mt-xs-40">
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
			</div>
		</div>
	</div>
</div>
<br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>