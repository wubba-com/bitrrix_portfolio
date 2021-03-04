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
<?php if(!empty($arResult['ITEMS'])) :?>

    <?php foreach ($arResult['ITEMS'] as $arItem) : ?>
        <div class="col-lg-3 col-md-3 col-sm-6">
            <div class="single-pricing text-center mb-30">
                <div class="pricing-head">
                    <h2 class="pricing-title text-uppercase"><?= $arItem['NAME'] ? : '' ?></h2>
                    <span><?= $arItem['PREVIEW_TEXT'] ? : '</br>' ?></span>
                </div>
                <div class="pricing-plan-price basic-bg">
                    <span><span>от </span><?= $arItem['PROPERTIES']['price']['VALUE'] ? : 0; ?><span> ₽</span></span>
                </div>
                <div class="pricing-plan-list">
                    <?php if (!empty($arItem['PROPERTIES']['pricing_plan']['VALUE'])) : ?>
                        <ul>
                            <?php foreach ($arItem['PROPERTIES']['pricing_plan']['DESCRIPTION'] as $keyProp => $valProp) : ?>
                                <li><?= $arItem['PROPERTIES']['pricing_plan']['VALUE'][$keyProp]; ?></li>
                            <?endforeach; ?>
                        </ul>
                    <?endif; ?>
                </div>
                <?php if (!empty($arItem['DETAIL_PAGE_URL'])) : ?>
                    <div class="get-started">
                        <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>" class="btn"><?= $arItem['PROPERTIES']['name_link']['VALUE'] ? : '' ?></a>
                    </div>
                <?endif;?>
            </div>
        </div>
    <?endforeach; ?>
<?endif; ?>