<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Услуги");
?>

<?php

    function getIncludesComponents(string $name_file) {
        global $APPLICATION;
        return $APPLICATION->IncludeComponent(
            "bitrix:main.include",
            "",
            Array(
                "AREA_FILE_SHOW" => "file",
                "AREA_FILE_SUFFIX" => "inc",
                "EDIT_TEMPLATE" => "",
                "PATH" => "/services/includes/" . $name_file
            )
        );
    }
?>

    <!-- Текстовый блок + скилы -->
<section class="who-area-are bg-color pad-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="who-we">
                    <h2 class="title-1">
                        <?php getIncludesComponents("team_title.php"); ?>
                    </h2>
                    <p>
                        <?php getIncludesComponents("team_paragraph_1.php")?>
                    </p>
                    <p>
                        <?php getIncludesComponents("team_paragraph_2.php") ?>
                    </p>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="our-skill">
                    <h2 class="title-1">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "/services/includes/skills_title.php"
                            )
                        );?>
                    </h2>
                    <div class="progress-list">
                        <div class="progress">
                            <div class="lead">Web-дизайн</div>
                            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                 style="width: <?php getIncludesComponents("progress_web.php")?>%;">
                                <span><?php getIncludesComponents("progress_web.php")?>%</span>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="lead">PHP (Bitrix / Laravel / Symfony)</div>
                            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                 style="width: <?php getIncludesComponents("progress_php.php")?>%;">
                                <span><?php getIncludesComponents("progress_php.php")?>%</span>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="lead">Node.js</div>
                            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                                 aria-valuemax="100" style="width: <?php getIncludesComponents("progress_nodejs.php")?>%;">
                                <span><?php getIncludesComponents("progress_nodejs.php")?>%</span>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="lead">JavaScript (Angular / React)</div>
                            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                 style="width: <? getIncludesComponents("progress_javascript.php")?>%;">
                                <span><?php getIncludesComponents("progress_javascript.php")?>%</span>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="lead">CSS (LESS)</div>
                            <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0"
                                 aria-valuemax="100" style="width: <?php getIncludesComponents("progress_css.php")?>%;">
                                <span><?php getIncludesComponents("progress_css.php") ?>%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>