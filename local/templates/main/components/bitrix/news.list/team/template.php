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
//debug($arResult['ITEMS']);
?>
<?php if (!empty($arResult['ITEMS'])) : ?>
<div class="row">
    <?php foreach ($arResult['ITEMS'] as $arItem) : ?>
    <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="single-team mb-30">
            <?php if (!empty($arItem['PREVIEW_PICTURE']['SRC'])) : ?>
            <div class="team-img">
                <img src="<?= $arItem['PREVIEW_PICTURE']['SRC']; ?>" alt=""/>
                <div class="team-text">
                    <?= $arItem['PREVIEW_TEXT'] ? : ''; ?>
                    <p><?= $arItem['DETAIL_TEXT'] ? : ''; ?></p>
                    <div class="team-icon">
                        <a href="<?= $arItem['PROPERTIES']['LINK_FACEBOOK']['VALUE'] ? : '#' ?>"><i class="fa fa-facebook"></i></a>
                        <a href="<?= $arItem['PROPERTIES']['LINK_TWITTER']['VALUE'] ? : '#' ?>"><i class="fa fa-twitter"></i></a>
                        <a href="<?= $arItem['PROPERTIES']['LINK_LINKEDIN']['VALUE'] ? : '#' ?>"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
            <?endif; ?>
            <div class="team-name text-center">
                <h4><?= $arItem['NAME']; ?></h4>
                <h5><?= $arItem['PROPERTIES']['POST']['VALUE']; ?></h5>
            </div>
        </div>
    </div>
    <?endforeach;?>
</div>
<?endif; ?>

