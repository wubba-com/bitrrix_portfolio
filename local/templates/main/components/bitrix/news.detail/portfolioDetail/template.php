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

<?php if (!empty($arResult['ID'])) : ?>
<div class="single-portfolio-area pt-90 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="portfolio-details">
                    <h3><?= $arResult['PROPERTIES']['detail_title']['VALUE'] ? : ''; ?></h3>
                    <?php if (!empty($arResult['PROPERTIES']['description']['VALUE'])) :?>
                        <?php foreach ($arResult['PROPERTIES']['description']['DESCRIPTION'] as $key_description => $value_description) : ?>
                            <span class="text-colort-blue"><?= $value_description ?></span>
                            <p><?= $arResult['PROPERTIES']['description']['VALUE'][$key_description]['TEXT'];?></p>
                        <?endforeach; ?>
                    <?endif;?>
                </div>
            </div>
            <?php if (!empty($arResult['DISPLAY_PROPERTIES']['add_info']['VALUE'])) : ?>
            <div class="col-md-5">
                <div class="portfolio-meta">
                    <ul>
                        <?php foreach ($arResult['DISPLAY_PROPERTIES']['add_info']['VALUE'] as $keyValue => $arValue) : ?>
                        <li><span><b><?= $arValue?></b></span><?= $arResult['DISPLAY_PROPERTIES']['add_info']['DESCRIPTION'][$keyValue] ? : ''; ?></li>
                        <?endforeach; ?>
                    </ul>
                    <?php if (!empty($arResult['PROPERTIES']['link']['DESCRIPTION'])) : ?>
                    <a href="<?= $arResult['PROPERTIES']['link']['DESCRIPTION'] ;?>" class="btn mt-30"><?= $arResult['PROPERTIES']['link']['VALUE'] ;?></a>
                    <?endif;?>
                </div>
            </div>
            <?endif; ?>
        </div>
    </div>
</div>


<!-- Фотогалерея -->
    <?php if (!empty($arResult['PROPERTIES']['gallery']['VALUE'])): ?>
        <div class="img-gallery-area pt-30 pb-60">
            <div class="container">
                <div class="row">
                    <?php foreach ($arResult['PROPERTIES']['photos'] as $photo): ?>
                        <div class="col-md-6 col-sm-4">
                            <div class="img-gallery hover-bg-opacity mb-30">
                                <a class="image-link" href="<?= $photo['SRC']; ?>">
                                    <img src="<?= $photo['SRC'] ?>" alt="" /></a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?else :?>
// Если неправильный URL
    <div>
        <p style="color: red">Элемент не найден</p>
    </div>
<?endif;?>