<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("TITLE", "31");
$APPLICATION->SetTitle("test31");
?><?$APPLICATION->IncludeComponent(
	"bitrix:search.form",
	"",
	Array(
		"PAGE" => "#SITE_DIR#search/index.php",
		"USE_SUGGEST" => "Y"
	)
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>