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

<?php if (!empty($arResult)) : ?>
<article class="post-wrapper mb-60">
	<h3 class="text-blue"><?= $arResult['NAME']; ?></h3>

	<?php if (!empty($arResult['PROPERTIES']['LINK_VIDEO']['VALUE'])) : ?>
		<div class="embed-responsive embed-responsive-16by9">
            <iframe src="<?= $arResult['PROPERTIES']['LINK_VIDEO']['VALUE']; ?>"></iframe>
        </div>
	<?php else: ?>
		<div class="post-img hover-bg-opacity">
			<img src="<?= $arResult["DETAIL_PICTURE"]["SRC"]; ?>" alt="" />
		</div>
	<?endif; ?>

	<div class="post-content">

		<div class="post-meta">
			<?php if(!empty($arResult['SECTION']['PATH'][0]['NAME'])) : ?>
				<?php foreach ($arResult['SECTION']['PATH'] as  $valuePath) : ?>
					<span><a href="<?= $valuePath['SECTION_PAGE_URL'] ;?>"><?= $valuePath['NAME']; ?></a></span>
				<?endforeach; ?>
				
			<?endif; ?>
		</div>
		<p>
			<?= $arResult['DETAIL_TEXT'] ? : '';?>
		</p>
		<blockquote>
			<p>
				<?= $arResult['PROPERTIES']['DEFINITION']['VALUE']['TEXT'] ? : ''; ?>
			</p>
		</blockquote>
		<p>
			<?= $arResult['PROPERTIES']['SUBTEXT']['VALUE']['TEXT'] ? : ''; ?>
		</p>

	</div>
</article>
<?endif; ?>