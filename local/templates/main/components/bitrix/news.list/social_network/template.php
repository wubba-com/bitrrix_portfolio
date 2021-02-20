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

?>
<?php if (!empty($arResult['ITEMS'])) : ?>
    <div class="col-md-6 col-sm-6">
        <div class="social-icon-header text-right">
            <?php foreach ($arResult['ITEMS'] as $arItem) :?>
            <a href="<?= $arItem['PROPERTIES']['LINK']['VALUE'] ? : ''?>" target="_blank"><?= $arItem['PREVIEW_TEXT'] ? : '' ;?></a>
            <?endforeach;?>
        </div>
    </div>
<?endif;?>


