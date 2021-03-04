<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?>

<!-- Контакты + ФОС -->
<div class="contact-form pt-90 pb-30">
    <div class="container">
        <div class="row">
            <div class="section-heading text-center mb-70">
                <h2>Нужен классный сайт?</h2>
                <p>Оставьте заявку в форме ниже и мы всё сделаем!</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="contact-info">
                    <address>
                        <ul>
                            <li>
                                <i aria-hidden="true" class="fa fa-map-marker brand-color"></i>
                                <div class="address">
                                    Мы находимся по адресу:
                                    <hr>
                                    <p>
                                    <?$APPLICATION->IncludeComponent(
                                    "bitrix:main.include",
                                    "",
                                    Array(
                                        "AREA_FILE_SHOW" => "file",
                                        "AREA_FILE_SUFFIX" => "inc",
                                        "EDIT_TEMPLATE" => "",
                                        "PATH" => "/contact/includes/contact_addres.php"
                                    )
                                );?>
                                </p>
                                </div>
                            </li>
                            <li>
                                <i aria-hidden="true" class="fa fa-phone brand-color"></i>
                                <div class="phone">
                                    <p>
                                    <?$APPLICATION->IncludeComponent(
                                    "bitrix:main.include",
                                    "",
                                    Array(
                                        "AREA_FILE_SHOW" => "file",
                                        "AREA_FILE_SUFFIX" => "inc",
                                        "EDIT_TEMPLATE" => "",
                                        "PATH" => "/contact/includes/contact_phone.php"
                                    )
                                );?>
                                </p>
                                </div>
                            </li>
                            <li>
                                <i class="fa fa-envelope brand-color"></i>
                                <div class="mail">
                                    <p>
                                        <a href="mailto:wecoders@wecodres.com"><?$APPLICATION->IncludeComponent(
                                    "bitrix:main.include",
                                    "",
                                    Array(
                                        "AREA_FILE_SHOW" => "file",
                                        "AREA_FILE_SUFFIX" => "inc",
                                        "EDIT_TEMPLATE" => "",
                                        "PATH" => "/contact/includes/contact_email.php"
                                    )
                                );?></a>
                                    </p>
                                </div>
                            </li>
                            <li></li>
                        </ul>
                    </address>
                </div>
            </div>
            <?$APPLICATION->IncludeComponent("myfeedback:main.feedback", "feedback", Array(
                    "EMAIL_TO" => "eng.ise8@gmail.com",	// E-mail, на который будет отправлено письмо
                "EVENT_MESSAGE_ID" => array(	// Почтовые шаблоны для отправки письма
                    0 => "7",
                ),
                "OK_TEXT" => "Спасибо, ваше сообщение принято.",	// Сообщение, выводимое пользователю после отправки
                "REQUIRED_FIELDS" => array(	// Обязательные поля для заполнения
                    0 => "NAME",
                    1 => "EMAIL",
                ),
                "USE_CAPTCHA" => "Y",	// Использовать защиту от автоматических сообщений (CAPTCHA) для неавторизованных пользователей
                "COMPONENT_TEMPLATE" => ".default"
            ),
                false
            );?>
            <!--            <p class="form-messege"></p>-->
        </div>
    </div>
</div>

<!-- Карта -->
<div class="map-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="map" class="mtb-90"></div>
            </div>
        </div>
    </div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>