<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

if(!empty($_POST['email']) && !empty($_POST['name']) && !empty($_POST['message'])) {
    // Создаем объект
    $comment = new CIBlockElement;

    // Указываем с каким инфоблоком работем
    $iblock_ID = 10;

    // Создаем массив где свяжем свойства инфоблока дынными из формы
    $PROP = [];

    $PROP['name'] = $_POST['name'];
    $PROP['email'] = $_POST['email'];
    $PROP['id_element'] = $_POST['id_element'];

    // Поля которые будут сохраненны (здесь нужно правильно настроить инблок) 
    $fields = [
        "DATE_CREATE" => date("d.m.Y H:i:s"),
        "CREATED_BY" => $USER->GetID(),
        "IBLOCK_ID" => $iblock_ID,
        "PROPERTY_VALUES" => $PROP,
        "ACTIVE" => "Y",
        "NAME" => strip_tags($_POST['name']),
        "DETAIL_TEXT" => $_POST['message']
    ];

    // Сохраняем
    if($ID = $comment->Add($fields)) {
        echo 'Save ' . $ID;
        LocalRedirect("");
    } else {

        echo 'Error ' . $comment->LAST_ERROR;
    }
} else {

    echo 'Заполните все поля';

}


require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>