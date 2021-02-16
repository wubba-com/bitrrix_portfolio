<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


<?if (!empty($arResult)):?>
<div class="col-lg-7 col-md-7 col-sm-12">
    <div class="footer-nav white-text">
        <nav>
            <ul>
<?
foreach($arResult as $arItem):
	if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
		continue;
?>
	<?if($arItem["SELECTED"]):?>
		<li><a href="<?=$arItem["LINK"]?>" style="color: #e7e7e7"><?=$arItem["TEXT"]?></a></li>
	<?else:?>
		<li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
	<?endif?>
	
<?endforeach?>

            </ul>
        </nav>
    </div>
</div>
<?endif?>


<!--<div class="col-lg-7 col-md-7 col-sm-12">-->
<!--    <div class="footer-nav white-text">-->
<!--        <nav>-->
<!--            <ul>-->
<!--                <li class="mega-parent">-->
<!--                    <a href="index.html">Главная</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="about_us.html">О нас</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="services.html">Услуги</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="portfolio.html">Портфолио</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="blog.html">Блог</a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="contacts.html">Контакты</a>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </nav>-->
<!--    </div>-->
<!--</div>-->

