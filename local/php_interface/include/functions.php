<?php
use Bitrix\Iblock\IblockTable;
use Bitrix\Main\Loader;

/**
 * Возвращает ID инфоблока по его коду
 *
 * @param string $code - код ИБ
 *
 * @return int - ID найденного ИБ
 * @throws Exception
 */

function getIBlockIdByCode(string $code) : int {
    Loader::includeModule('iBlock');

    $iBlock = IblockTable::getList([
        'filter' => [
            'CODE' => $code,
        ],
        'select' => [
            'ID',
            'CODE'
        ],
    ])->fetch();

    if (!isset($iBlock['ID'])) {
        throw new Exception("Не найден инфоблок с кодом {$code}");
    }
    return (int) $iBlock['ID'];
}