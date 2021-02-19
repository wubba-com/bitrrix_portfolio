<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
    die();
?>

<!-- Футер -->
<footer class="footer-style-2">
    <div class="footer-top-area brand-bg pad-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="footer-widget footer-widget-center text-center">
                        <!-- Лого + текст -->
                        <div class="footer-logo">
                            <a href="#">
                                <?$APPLICATION->IncludeComponent(
                                    "bitrix:main.include",
                                    "",
                                    Array(
                                        "AREA_FILE_SHOW" => "file",
                                        "AREA_FILE_SUFFIX" => "inc",
                                        "EDIT_TEMPLATE" => "",
                                        "PATH" => SITE_TEMPLATE_PATH . "/includes/footer_logo.php"
                                    )
                                );?>
                            </a>
                        </div>
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => SITE_TEMPLATE_PATH . "/includes/footer_text.php"
                            )
                        );?>

                        <!-- Соц. сети -->
                        <div class="social-icon">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- нижнее меню -->
    <div class="footer-bottom-area pad-20 brand-bg footer-border">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12">
                    <div class="copyright white-text">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => SITE_TEMPLATE_PATH . "/includes/footer_copyright.php"
                            )
                        );?>
                    </div>
                </div>


                <?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"bottom_manu", 
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"DELAY" => "N",
		"MAX_LEVEL" => "1",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_USE_GROUPS" => "N",
		"ROOT_MENU_TYPE" => "bottom",
		"USE_EXT" => "N",
		"COMPONENT_TEMPLATE" => "bottom_manu",
		"CHILD_MENU_TYPE" => "left"
	),
	false
);?>
            </div>
        </div>
    </div>
</footer>

<!-- JS (скрипты) -->
<!-- jquery js -->
<script src="/local/templates/main/assets/js/vendor/jquery-1.12.0.min.js"></script>
<!-- bootstrap js -->
<script src="/local/templates/main/assets/js/bootstrap.min.js"></script>
<!-- owl.carousel js -->
<script src="/local/templates/main/assets/js/owl.carousel.min.js"></script>
<!-- counterup js -->
<script src="/local/templates/main/assets/js/jquery.counterup.min.js"></script>
<script src="/local/templates/main/assets/js/waypoints.min.js"></script>
<!-- magnific-popup js -->
<script src="/local/templates/main/assets/js/jquery.magnific-popup.min.js"></script>
<!-- mixitup js -->
<script src="/local/templates/main/assets/js/jquery.mixitup.min.js"></script>
<!-- mixitup js -->
<script src="/local/templates/main/assets/js/jquery.meanmenu.js"></script>
<!-- jquery.nav js -->
<script src="/local/templates/main/assets/js/jquery.nav.js"></script>
<!-- jquery.nav js -->
<script src="/local/templates/main/assets/js/jquery.parallax-1.1.3.js"></script>
<!-- animate text js -->
<script src="/local/templates/main/assets/js/animate-text.js"></script>
<!-- plugins js -->
<script src="/local/templates/main/assets/js/plugins.js"></script>
<!-- main js -->
<script src="/local/templates/main/assets/js/main.js"></script>
</body>
</html>