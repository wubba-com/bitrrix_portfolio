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
$this->setFrameMode(true);?>

<form class="search-form" action="<?=$arResult["FORM_ACTION"]?>">
	<input type="text" name="q"  placeholder="Поиск" value="" size="15" maxlength="50" />
	<button name = "s"><i class="fa fa-search"></i></button>
</form>
