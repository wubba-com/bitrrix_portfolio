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
<section class="project-count-area brand-bg pad-90">
    <div class="container">
        <div class="row">
            <?php
                foreach ($arResult['ITEMS'] as $arItem) :
            ?>
            <?php
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <div class="col-md-3 col-sm-3" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                <div class="single-count white-text text-center">
                    <?= $arItem['DETAIL_TEXT'] ? : '' ?>
                    <h2 class="counter"><?= $arItem['PREVIEW_TEXT'] ? : '' ?></h2>
                    <p><?= $arItem['NAME']; ?></p>
                </div>
            </div>
            <?endforeach;?>
        </div>

    </div>
</section>
<?endif; ?>


