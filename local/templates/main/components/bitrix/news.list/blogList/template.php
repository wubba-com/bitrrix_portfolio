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
<?php if (!empty($arResult['ITEMS'])) : ?>
<!-- Запись блога -->
<?php foreach ($arResult['ITEMS'] as $arItem) :?>
	<?php
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<article class="post-wrapper mb-60" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
		<?if(!empty($arItem["PROPERTIES"]["LINK_VIDEO"]["VALUE"])) :?>
			<div class="embed-responsive embed-responsive-16by9">
				<iframe src="<?= $arItem["PROPERTIES"]["LINK_VIDEO"]["~VALUE"]; ?>"></iframe>
            </div>
		<?else :?>
			<div class="post-img hover-bg-opacity">
				<a href="blog_detail1.html">
					<img src="<?= $arItem["PREVIEW_PICTURE"]["SRC"]; ?>" alt="" />
				</a>
			</div>
		<?endif; ?>
		<div class="post-content">
			<h3>
				<a href="<?= $arItem["DETAIL_PAGE_URL"]; ?>"><?= $arItem['NAME'] ? : '';?></a>
			</h3>
			<div class="post-meta">
			<?if(!empty($arItem["FIELDS"]["DATE_CREATE"])) : ?>
				<span><a href="#"><i class="fa fa-clock-o"></i> <?= $arItem["FIELDS"]["DATE_CREATE"]; ?> </a></span> -
			<?endif?>
				<?php if(!empty($arItem['SECTION_NAME'])) : ?>
					<span><?= $arItem['SECTION_NAME']; ?></span> -
				<?endif; ?>
				<span><a href="#"><i class="fa fa-comments"></i> 1 Комментарий</a></span>
			</div>
			<p>
				<?= $arItem["PREVIEW_TEXT"] ? : ''; ?>
			</p>
			<a class="read-more btn btn-small" href="<?= $arItem["DETAIL_PAGE_URL"]; ?>"><?= $arItem['PROPERTIES']['LINK']['VALUE'] ? : ''; ?>
				<i class="fa fa-arrow-right"></i></a>
			</div>
		</article>
<?endforeach; ?>
<?endif; ?>
