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
<section class="who-area-are pad-90" id="about_us">
    <div class="container">
        <h2 class="title-1"><?= $arResult['PROPERTIES']['title']['VALUE'] ? : $arResult['NAME']; ?></h2>
        <div class="row">
            <div class="col-md-7">
                <div class="who-we">
                    <p>
                        <?= $arResult['PROPERTIES']['text']['~VALUE']['TEXT'] ? : ''; ?>
                    </p>

                    <p><?= $arResult['DETAIL_TEXT'] ? : ''; ?></p>
                </div>
            </div>
            <?php if (!empty($arResult['FIELDS']['DETAIL_PICTURE']['SRC'])) : ?>
                <div class="col-md-5">
                    <div class="about-bg">
                        <img src="<?= $arResult['FIELDS']['DETAIL_PICTURE']['SRC'] ?>" alt="<?= $arResult['FIELDS']['DETAIL_PICTURE']['ALT'] ?>" />
                    </div>
                </div>
            <?endif; ?>
        </div>
    </div>
</section>

    <!-- Доп. контент об услуге -->
<div class="pb-60">
    <div class="container">
        <div class="row">
            <?php if (!empty($arResult['PROPERTIES']['question_answer']['DESCRIPTION'])) : ?>
            <div class="col-md-6">
                <h3 class="mb-30">Вопросы и ответы</h3>
                <div class="brand-accordion">
                    <div class="panel-group icon angle-icon" id="accordion" role="tablist" aria-multiselectable="true">
                        <?php foreach ($arResult['PROPERTIES']['question_answer']['DESCRIPTION'] as $keyProp => $valProp) : ?>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="<?= $arResult['PROPERTIES']['aria_labelledby']['VALUE'][$keyProp] ? : '';?>">
                                    <h4 class="panel-title">
                                        <a class="<?= $keyProp == 0 ? '' : 'collapsed'; ?>" role="button" data-toggle="collapse" data-parent="#accordion" href="#<?= $arResult['PROPERTIES']['id']['VALUE'][$keyProp] ? : '';?>" aria-expanded="true" aria-controls="<?= $arResult['PROPERTIES']['id']['VALUE'][$keyProp] ? : '';?>">
                                            <?= $valProp ?>
                                        </a>
                                    </h4>
                                </div>
                                <div id="<?= $arResult['PROPERTIES']['id']['VALUE'][$keyProp] ? : '';?>" class="<?= $keyProp == 0 ? 'panel-collapse collapse in' : 'panel-collapse collapse'; ?>" role="tabpanel" aria-labelledby="<?= $arResult['PROPERTIES']['aria_labelledby']['VALUE'][$keyProp] ? : '';?>">
                                    <div class="panel-body">
                                        <?= $arResult['PROPERTIES']['question_answer']['~VALUE'][$keyProp]['TEXT'] ? : ''; ?>
                                    </div>
                                </div>
                            </div>
                        <?endforeach; ?>
                    </div>
                </div>
            </div>
            <?endif; ?>
            <?php if (!empty($arResult['PROPERTIES']['step_developer']['VALUE'])) : ?>
                <div class="col-lg-6 col-md-6">
                    <h3 class="mb-30">Этапы разработки</h3>
                    <div class="my-tab">
                        <!-- Nav tabs -->
                        <ul class="custom-tab mb-15" role="tablist">
                            <? foreach ($arResult['PROPERTIES']['step_developer_2']['LIST'] as $key => $value) :?>
                                <li role="presentation" class="<?= $key == 0 ? 'active' : '' ?>"><a href="#<?= $value['UF_XML_ID']; ?>" aria-controls="<?= $value['UF_XML_ID']; ?>" role="tab" data-toggle="tab"><?= $value['UF_NAME'] ?></a></li>
                            <? endforeach ;?>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <? foreach ($arResult['PROPERTIES']['step_developer_2']['LIST'] as $key => $value) :?>
                                <div role="tabpanel" class="tab-pane fade<?= $key == 0 ? ' in active' : '' ?>" id="<?= $value['UF_XML_ID']; ?>">
                                    <p><?= $value['UF_FULL_DESCRIPTION']; ?></p>
                                </div>
                            <? endforeach ;?>
                        </div>
                    </div>
                </div>
            <?endif; ?>
        </div>
    </div>
</div>

<?endif; ?>
