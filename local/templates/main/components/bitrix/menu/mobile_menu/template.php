<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>


<?if (!empty($arResult)):?>
    <!-- Меню (для мобилки) -->
<div class="mobile-menu-area visible-xs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul>
                            <?
                            foreach($arResult as $arItem):
                                if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
                                    continue;
                                ?>

                                <?if($arItem["SELECTED"]):?>
                                <li><a href="<?=$arItem["LINK"]?>" style="color: #00a9da"><?=$arItem["TEXT"]?></a></li>
                            <?else:?>
                                <li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
                            <?endif?>

                            <?endforeach?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<?endif?>



<!--<div class="mobile-menu">-->
<!--    <nav id="dropdown">-->
<!--        <ul>-->
<!--            <li>-->
<!--                <a href="index.html">Главная</a>-->
<!--            </li>-->
<!--            <li>-->
<!--                <a href="about_us.html">О нас</a>-->
<!--            </li>-->
<!--            <li>-->
<!--                <a href="services.html">Услуги</a>-->
<!--                <ul>-->
<!--                    <li>-->
<!--                        <a href="services_landing.html">Лендинг</a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="services_online_shop.html">Интернет-магазин</a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </li>-->
<!--            <li>-->
<!--                <a href="portfolio.html">Портфолио</a>-->
<!--            </li>-->
<!---->
<!--            <li>-->
<!--                <a href="blog.html">Блог</a>-->
<!--            </li>-->
<!--            <li>-->
<!--                <a href="contacts.html">Контакты</a>-->
<!--            </li>-->
<!--        </ul>-->
<!--    </nav>-->
<!--</div>-->

