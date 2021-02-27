<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
?>
<div class="col-md-8">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <?php if(!empty($arResult['ERROR_MESSAGE'])) : ?>
                <? foreach ($arResult['ERROR_MESSAGE'] as $error) :?>
            <span class="text-danger"><?= $error; ?></span><br>
                <? endforeach ;?>
            <?php elseif (!empty($arResult['OK_MESSAGE'])) : ?>
            <span class="text-success"><?= $arResult['OK_MESSAGE'];?></span>
            <?endif;?>
        </div>
    </div>
    <br>
    <div class="row">
        <form id="contact-form" class="default-form" action="<?= POST_FORM_ACTION_URI; ?>" method="POST">
            <?=bitrix_sessid_post()?>
            <div class="col-md-4 col-sm-6">
                <input name="user_name" type="text" placeholder="Имя <?= (empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])) ? '*' : ''; ?>" value="<?=$arResult["AUTHOR_NAME"]?>"/>
            </div>
            <div class="col-md-4 col-sm-6">
                <input name="user_email" type="email <?= (empty($arParams["REQUIRED_FIELDS"]) || in_array("EMAIL", $arParams["REQUIRED_FIELDS"])) ? '*' : ''; ?>" placeholder="Email"/>
            </div>
            <div class="col-md-4 col-sm-12">
                <input name="user_phone" type="text" placeholder="Телефон <?= (empty($arParams["REQUIRED_FIELDS"]) || in_array("PHONE", $arParams["REQUIRED_FIELDS"])) ? '*' : ''; ?>"/>
            </div>
            <div class="col-md-12 col-sm-12">
                <textarea name="MESSAGE" cols="30" rows="10" placeholder="Сообщение <?= (empty($arParams["REQUIRED_FIELDS"]) || in_array("MESSAGE", $arParams["REQUIRED_FIELDS"])) ? '*' : ''; ?>"><?=$arResult["MESSAGE"]?></textarea>
                <input type="submit" class="btn mt-30" name="submit" value="<?= GetMessage("MFT_SUBMIT")?>">
                <input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
            </div>
        </form>
    </div>
</div>