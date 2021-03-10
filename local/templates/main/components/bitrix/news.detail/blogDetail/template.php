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

<!-- Форма для ввода комментария -->
<div class="comments-form mt-40">
    <div class="row">
		<form action="/blog/add_form_result.php" method="post">
		<?php bitrix_sessid_post(); ?>
			<div class="col-md-6 mb-30">
                <input type="text" name = "name" placeholder="Ваше имя"/>
            </div>
            <div class="col-md-6 mb-30">
                <input type="email" name = "email" placeholder="Email"/>
            </div>
            <div class="col-md-12">
            	<textarea name="message" cols="30" rows="3" placeholder="Комментарий"></textarea>
				<input type="hidden" name="id_element" value="<?= $arResult["ID"]; ?>">
				<input type="submit" name="send" class="btn btn-lg mt-30" value="Отправить"/>
        	</div>
        </form>
    </div>
</div>
<br>

<!-- Комментарии -->
<!-- <h3 class="total-comments mb-30 pb-15">4 комментария</h3>
    <ul class="media-list comment-list mt-30">

    <!-- Коммент -->
        <!-- <li class="media">
            <div class="media-body">
                <div class="comment-info">
                    <h4 class="author-name">Алексей Потапов</h4>
            	</div>
            	<p>
					Система управления содержимым веб-сайтов Битрикс (с 2007 года используется название "1С-Битрикс") выпущена как 	отчуждаемый от разработчиков продукт в 2002 году.
            		30 мая 2018 года выпущена последняя на данный момент версия ядра под номером 18.0.0.
				</p>
            </div>
        </li> -->
    <!-- </ul> -->
<?endif; ?>