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
<?php //debug($arResult['ITEMS']); ?>
<?php if (!empty($arResult['ITEMS'])) : ?>
<section class="testimonial-area bg-color pad-90">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="testimonial-active dots-style">
                    <?php foreach ($arResult['ITEMS'] as $arItem) :?>
                        <?php
                            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                        ?>
                    <div class="single-testimonial black-text text-center" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                        <div class="testimonial-title">
                            <?= $arItem['PREVIEW_TEXT'] ? : ''; ?>
                            <h3 class="black-text"><?= $arItem['NAME'] ? : ''; ?></h3>
                        </div>
                        <p><span>"</span><?= $arItem['DETAIL_TEXT'] ? : ''; ?><span>"</span>
                        </p>
                        <?php if(!empty($arItem['PROPERTIES']['author']['VALUE'])) :?>
                        <div class="testimonial-author text-uppercase">
                            <span>- <?= $arItem['PROPERTIES']['author']['VALUE']; ?></span>
                        </div>
                        <?endif; ?>
                    </div>
                    <? endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<? endif; ?>


