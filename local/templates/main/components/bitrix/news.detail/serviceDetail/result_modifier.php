<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* @var array $arParams */
/* @var array $arResult */
/* @global CMain $APPLICATION */
/* @global CUser $USER */
/* @global CDatabase $DB */
/* @var CBitrixComponentTemplate $this */
/* @var string $templateName */
/* @var string $templateFile */
/* @var string $templateFolder */
/* @var string $componentPath */
/* @var CBitrixComponent $component */

if(!empty($arResult['PROPERTIES']['step_developer_2']['VALUE'])) {
    $arResult['PROPERTIES']['step_developer_2']['LIST'] = Helper::getDictionaryProp($arResult['PROPERTIES']['step_developer_2']['USER_TYPE_SETTINGS']['TABLE_NAME']);
}