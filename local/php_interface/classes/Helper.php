<?php

use Bitrix\Main\Loader;
use Bitrix\Main\Mail\Event;
use \Bitrix\Highloadblock as HL;

class Helper
{
	public static function getUser($userId, array $fields, $fullName = false)
	{
		$userBy = "id";
		$userOrder = "desc";

		$userFilter = [
			'ID'     => $userId,
			'ACTIVE' => 'Y'
		];

		$userParams = [
			'FIELDS' => $fields
		];

		$dbUser = Bitrix\Main\UserTable ::getByPrimary($userId, [
			'select' => $fields,
			'filter' => $userFilter,
		]);

		if ($arUser = $dbUser -> Fetch()) {
			if ($arUser['PERSONAL_PHOTO']) {
				$arUser['PERSONAL_PHOTO'] = self ::getResizeImageFile($arUser['PERSONAL_PHOTO'], ['width' => 96, 'height' => 96]);
			} else {
				$arUser['PERSONAL_PHOTO']['SRC'] = '/local/templates/main/images/user-profile.png';
			}
			if ($fullName) {
				$arUser['FULL_NAME'] = $arUser['LAST_NAME'] . ' ' . $arUser['NAME'] . ' ' . $arUser['SECOND_NAME'];
			} else {
				$arUser['FULL_NAME'] = self ::getUserFullName($arUser['LAST_NAME'], $arUser['NAME'], $arUser['SECOND_NAME']);
			}
		}
		return $arUser;
	}

	public static function getUserFullName($lastName, $name, $secondName = false)
	{
		$initials[] = $name ? substr($name, 0, 1) : false;
		$initials[] = $secondName ? substr($secondName, 0, 1) : false;
		if ($secondName) {
			$initials[] = '';
		}
		return $lastName . ' ' . implode('.', $initials);
	}

	public static function cropText($text, $length, $clearTags = true)
	{
		$text = trim($text);
		if ($clearTags === true) {
			$text = strip_tags($text);
		}
		if ($length <= 0 || strlen($text) <= $length) {
			return $text;
		}
		$out = mb_substr($text, 0, $length);
		$pos = mb_strrpos($out, ' ');
		if ($pos) {
			$out = mb_substr($out, 0, $pos);
		}
		return $out . '…';
	}

	/**
	 * Вспомогательная ф-ия getDetailResizeImage. Создает уменьшенную копию файла, если её нет.
	 * @param $fileSrc - путь к исходному файлу
	 * @param $params - параметры
	 * @return string - путь к созданному файлу
	 */
	public static function getResizeImageFile($fileSrc, $params = [])
	{
		$url = '';
		$pic = \CFile ::GetFileArray($fileSrc);
		$image = CFile ::MakeFileArray($pic['SRC']);

		$image_src = $_SERVER['DOCUMENT_ROOT'] . '/' . $pic['SRC'];

		$nextFileName = $image['name'];
		$nextFileName = substr(md5($image_src), 0, 5) . substr(md5(serialize($params)), 0, 5) . '_w' . $params['width'] . 'h' . $params['height'] . '_' . $nextFileName;
		$nextFileSrc = '/upload/resize_temp/' . $nextFileName;

		$tmp_image = $_SERVER['DOCUMENT_ROOT'] . $nextFileSrc;

		if (!file_exists($tmp_image)) {
			$res = CFile ::ResizeImageFile(
				$image_src,
				$tmp_image,
				['width' => $params['width'], 'height' => $params['height']],
				//,
				$params['BX_RESIZE'] ?: BX_RESIZE_IMAGE_EXACT,
				[],
				$params['JPG_QUALITY'] ?: 95
			);
			if ($res) {
				$url = $nextFileSrc;
			}
		} else {
			$url = $nextFileSrc;
		}
		$pic["SRC"] = $url;
		return $pic;
	}

	//    CFileMan::AddHTMLEditorFrame()
//    /bitrix/modules/fileman/fileman.php:1300

	public static function AddHTMLEditorFrame(
		$strTextFieldName,
		$strTextValue,
		$strTextTypeFieldName,
		$strTextTypeValue,
		$arSize = ["height" => 350],
		$CONVERT_FOR_WORKFLOW = "N",
		$WORKFLOW_DOCUMENT_ID = 0,
		$NEW_DOCUMENT_PATH = "",
		$textarea_field = "",
		$site = false,
		$bWithoutPHP = true,
		$arTaskbars = false,
		$arAdditionalParams = []
	)
	{
		// We have to avoid of showing HTML-editor with probably unsecure content when loosing the session [mantis:#0007986]
		if ($_SERVER["REQUEST_METHOD"] == "POST" && !check_bitrix_sessid())
			return;

		global $htmled, $usehtmled;
		$strTextFieldName = preg_replace("/[^a-zA-Z0-9_:\.]/is", "", $strTextFieldName);

		if (is_array($arSize))
			$iHeight = $arSize["height"];
		else
			$iHeight = $arSize;

		$strTextValue = htmlspecialcharsback($strTextValue);
		$dontShowTA = isset($arAdditionalParams['dontshowta']) ? $arAdditionalParams['dontshowta'] : false;
		if ($arAdditionalParams['hideTypeSelector']) {
			$textType = $strTextTypeValue == 'html' ? 'editor' : 'text';
			?><input type="hidden" name="<?= $strTextTypeFieldName ?>" value="<?= $strTextTypeValue ?>"/><?
		} else {
			$textType = CFileMan ::ShowTypeSelector([
				'name'                 => $strTextFieldName,
				'key'                  => $arAdditionalParams['saveEditorKey'],
				'strTextTypeFieldName' => $strTextTypeFieldName,
				'strTextTypeValue'     => $strTextTypeValue,
				'bSave'                => $arAdditionalParams['saveEditorState'] !== false
			]);
		}

		$curHTMLEd = $textType == 'editor';
		setEditorEventHandlers($strTextFieldName);
		?>
		<textarea class="typearea"
				  style="<? echo(($curHTMLEd || $dontShowTA) ? 'display:none;' : ''); ?>width:100%;height:<?= $iHeight ?>px;"
				  name="<?= $strTextFieldName ?>" id="bxed_<?= $strTextFieldName ?>"
				  wrap="virtual" <?= $textarea_field ?>><?= htmlspecialcharsbx($strTextValue) ?></textarea>
		<?

		if ($bWithoutPHP)
			$arTaskbars = ["BXPropertiesTaskbar", "BXSnippetsTaskbar"];
		else if (!$arTaskbars)
			$arTaskbars = ["BXPropertiesTaskbar", "BXSnippetsTaskbar", "BXComponents2Taskbar"];

		$minHeight = $arAdditionalParams['minHeight'] ? intval($arAdditionalParams['minHeight']) : 450;
		$arParams = [
			"bUseOnlyDefinedStyles" => COption ::GetOptionString("fileman", "show_untitled_styles", "N") != "Y",
			"bFromTextarea"         => true,
			"bDisplay"              => $curHTMLEd,
			"bWithoutPHP"           => $bWithoutPHP,
			"arTaskbars"            => $arTaskbars,
			"height"                => max($iHeight, $minHeight)
		];

		if (isset($arAdditionalParams['use_editor_3']))
			$arParams['use_editor_3'] = $arAdditionalParams['use_editor_3'];

		$arParams['site'] = ($site == '' ? LANG : $site);
		if (isset($arSize["width"]))
			$arParams["width"] = $arSize["width"];

		if (isset($arAdditionalParams))
			$arParams["arAdditionalParams"] = $arAdditionalParams;

		if (isset($arAdditionalParams['limit_php_access']))
			$arParams['limit_php_access'] = $arAdditionalParams['limit_php_access'];

		if (isset($arAdditionalParams['toolbarConfig']))
			$arParams['toolbarConfig'] = $arAdditionalParams['toolbarConfig'];

		if (isset($arAdditionalParams['componentFilter']))
			$arParams['componentFilter'] = $arAdditionalParams['componentFilter'];

		$arParams['setFocusAfterShow'] = isset($arParams['setFocusAfterShow']) ? $arParams['setFocusAfterShow'] : false;

		CFileman ::ShowHTMLEditControl($strTextFieldName, $strTextValue, $arParams);
	}

	/**
	 * Получение ID highloadBlock
	 *
	 * @param $tableName - название highloadBlock
	 *
	 * @return int ID highloadBlock
	 */
	public static function getHighLoadBlockID($tableName)
	{
		$id = 0;
		try {
			if (CModule ::IncludeModule('highloadblock')) {
				$rsData = \Bitrix\Highloadblock\HighloadBlockTable ::getList(['filter' => ['TABLE_NAME' => $tableName]]);
				$hldata = $rsData -> fetch();
				if ($hldata["ID"]) {
					$id = $hldata["ID"];
				}
			}
		} catch (\Exception $ex) {

		}
		return $id;
	}

	/**
	 * Получение значений highloadblock
	 *
	 * @param $highloadblock_id - ID highloadblock
	 * @param array $arOrder - массив сортировки, по умолчанию пуст
	 * @param array $arFilter - массив фильтрации, по умолчанию пуст
	 * @param array $arSelect - массив полей для выбора, по умолчанию все ('*')
	 *
	 * @param bool $xmlIdKey
	 * @return array
	 */
	public static function getItemsInHighLoadBlock($highloadblock_id, $arOrder = [], $arFilter = [], $xmlIdKey = false, $arSelect = ['*'])
	{
		$arResult = [];
		if ($highloadblock_id) {
			try {
				if (CModule ::IncludeModule("highloadblock")) {
					$hlblock = \Bitrix\Highloadblock\HighloadBlockTable ::getById($highloadblock_id) -> fetch();
					$entity = \Bitrix\Highloadblock\HighloadBlockTable ::compileEntity($hlblock);
					$entity_data_class = $entity -> getDataClass();
					$entity_table_name = $hlblock['TABLE_NAME'];

					$sTableID = 'tbl_' . $entity_table_name;

					$ar_getList = ["select" => ['*']];

					if ($arFilter) $ar_getList["filter"] = $arFilter;
					if ($arOrder) $ar_getList["order"] = $arOrder;
					if ($arSelect) $ar_getList["select"] = $arSelect;
					$rsData = $entity_data_class ::getList($ar_getList);
					$rsData = new CDBResult($rsData, $sTableID);
					while ($arRes = $rsData -> Fetch()) {
						if ($xmlIdKey) {
							$arResult[$arRes['UF_XML_ID']] = $arRes; //если нужен массив с ключами xml_id
						} else {
							$arResult[] = $arRes;
						}
					}
				}
			} catch (\Exception $ex) {
			}
		}
		return $arResult;
	}

	public static function updateHighLoadBlockElement($tableName, $elementId, $fields = [])
	{
		$response = [];
		if ($tableName) {
			try {
				if (CModule ::IncludeModule("highloadblock")) {
					$highloadblock_id = self ::getHighLoadBlockID($tableName);
					$hlblock = \Bitrix\Highloadblock\HighloadBlockTable ::getById($highloadblock_id) -> fetch();
					$entity = \Bitrix\Highloadblock\HighloadBlockTable ::compileEntity($hlblock);
					$entity_data_class = $entity -> getDataClass();
					$entity_table_name = $hlblock['TABLE_NAME'];
					$result = $entity_data_class ::update($elementId, $fields);
					if (!$result -> isSuccess()) {
						$response['ERRORS'] = $result -> getErrorMessages();
					} else {
						$response['ID'] = $result -> getId();
					}
				}
			} catch (\Exception $ex) {
			}
		}
		return $response;
	}

	public static function addHighLoadBlockElement($tableName, $fields = [])
	{
		$response = [];
		if ($tableName) {
			try {
				if (CModule ::IncludeModule("highloadblock")) {
					$highloadblock_id = self ::getHighLoadBlockID($tableName);
					$hlblock = \Bitrix\Highloadblock\HighloadBlockTable ::getById($highloadblock_id) -> fetch();
					$entity = \Bitrix\Highloadblock\HighloadBlockTable ::compileEntity($hlblock);
					$entity_data_class = $entity -> getDataClass();
					$entity_table_name = $hlblock['TABLE_NAME'];
					$result = $entity_data_class ::add($fields);
					if (!$result -> isSuccess()) {
						$response['ERRORS'] = $result -> getErrorMessages();
					} else {
						$response['ID'] = $result -> getId();
					}
				}
			} catch (\Exception $ex) {
			}
		}
		return $response;
	}

	public static function deleteHighLoadBlockElement($tableName, $id)
	{
		$response = [];
		if ($tableName) {
			try {
				if (CModule ::IncludeModule("highloadblock")) {
					$highloadblock_id = self ::getHighLoadBlockID($tableName);
					$hlblock = \Bitrix\Highloadblock\HighloadBlockTable ::getById($highloadblock_id) -> fetch();
					$entity = \Bitrix\Highloadblock\HighloadBlockTable ::compileEntity($hlblock);
					$entity_data_class = $entity -> getDataClass();
					$result = $entity_data_class ::delete($id);
					if (!$result -> isSuccess()) {
						$response['ERRORS'] = $result -> getErrorMessages();
					} else {
						$response['STATUS'] = 'Элемент удален!';
					}
				}
			} catch (\Exception $ex) {
			}
		}
		return $response;
	}

	public static function getBitrixUserManager($user_id)
	{
		$managers = '';
		$sections = CIntranetUtils ::GetUserDepartments($user_id);
		foreach ($sections as $section) {
			$manager = CIntranetUtils ::GetDepartmentManagerID($section);
			while (empty($manager)) {
				$res = CIBlockSection ::GetByID($section);
				if ($sectionInfo = $res -> GetNext()) {
					$manager = CIntranetUtils ::GetDepartmentManagerID($section);
					$section = $sectionInfo['IBLOCK_SECTION_ID'];
					if ($section < 1) break;
				} else break;
			}
			if ($manager > 0) $managers = $manager;
		}
		return $managers;

	}

	/**
	 * Транслит имени в символьный код (для ЧПУ)
	 * @param $string - строка замены
	 * @param $replace_space - указать знак на который заменить пробелы
	 * @param $replace_other - меняем плохие символы на указанный
	 * @return string
	 */
	public static function slugTranslit($string, $replace_space = "", $replace_other = "")
	{
		$arParams = [
			"replace_space" => $replace_space, // меняем пробелы на тире
			"replace_other" => $replace_other, // меняем плохие символы на тире
		];
		return \Cutil ::translit($string, "ru", $arParams);
	}

	/**
	 * Транслит имени в символьный код (для ЧПУ)
	 * @param $string - строка замены
	 * @param $replace_space - указать знак на который заменить пробелы
	 * @param $replace_other - меняем плохие символы на указанный
	 * @param $str_length
	 * @return string
	 */
	public static function generateRandomString($string, $replace_space, $replace_other, $str_length)
	{
		$translit = self ::slugTranslit($string, $replace_space, $replace_other);
		return substr(str_shuffle($translit), 0, $str_length);
	}

	/**
	 * @param $hlTableName
	 * @param string $text
	 * @param int $step
	 * @return mixed
	 */
	public static function generateUniqueCodeHLB($hlTableName, $text = '')
	{
		if ($text) {
			$xmlId = self ::generateRandomString($text, '', '', 10);
		} else {
			$xmlId = (string)time() . (string)rand(1,1000);
		}

		$highLoadBlockId = Helper ::getHighLoadBlockID($hlTableName);
		$highLoadBlockList = Helper ::getItemsInHighLoadBlock($highLoadBlockId, [], ['=UF_XML_ID' => $xmlId]);
		if (!empty($highLoadBlockList)) {
			$xmlId = self ::generateUniqueCodeHLB($hlTableName, $text);
		}
		return $xmlId;
	}

	/**
	 * @return bool
	 */
	public static function isAjaxRequest()
	{
		//return ($_REQUEST["AJAX_PAGE"] == "Y");
		$request = \Bitrix\Main\Application ::getInstance() -> getContext() -> getRequest();
		return $request -> isAjaxRequest();
	}

	/**
	 *
	 */
	public static function ajaxContentBefore()
	{
		if (self ::isAjaxRequest()) {
			global $APPLICATION;
			$APPLICATION -> RestartBuffer();
		}
	}

	/**
	 *
	 */
	public static function ajaxContentAfter()
	{
		if (self ::isAjaxRequest()) {
			\CMain ::FinalActions();
			//require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php" );
			die();
		}
	}

	public static function updateUserFields($userID, $userFields = [], $fullName = false)
	{
		$res = [];
		if (empty($fullName)) {
			$arUser = self ::getUser(
				$userID,
				[
					'LAST_NAME',
					'NAME',
					'SECOND_NAME',
				]
			);

			$fullName = $arUser['FULL_NAME'];
		}
		if (empty($userFields['PERSONAL_BIRTHDAY'])) {
			$errors[] = 'Введите дату рождения у пользователя ' . $fullName;
		}

		if (empty($userFields['UF_EXPERIENCE'])) {
			$errors[] = 'Введите стаж у пользователя ' . $fullName;
		}

		if ($userFields && empty($errors)) {
			$user = new CUser;
			$user -> Update($userID, $userFields);
			if ($user -> LAST_ERROR) {
				$errors[] = $user -> LAST_ERROR . ' у пользователя ' . $fullName;
			}
		}

		if ($errors) {
			$res['ERRORS'] = $errors;
		} else {
			$res['SUCCESS'] = 'Y';
		}
		return $res;
	}

	public static function clearText($string)
	{
		$text = '';
		$clearTextTag = strip_tags($string);
		$clearTextSpec = str_replace('&nbsp;', '', $clearTextTag);
		$text = preg_replace('/\s+/', ' ', $clearTextSpec);
		return $text;
	}

    public static function getDictionaryProp($sTableName) : array {
        $values = array();
        if (Loader::IncludeModule('highloadblock') && !empty($sTableName))
        {
            $hlblock = HL\HighloadBlockTable::getRow([
                'filter' => [
                    '=TABLE_NAME' => $sTableName
                ],
            ]);

            if ($hlblock)
            {
                $entity = HL\HighloadBlockTable::compileEntity($hlblock);
                $entityClass = $entity->getDataClass();
                $arRecords = $entityClass::getList([
                    "order" => array("ID" => "ASC"),
                    'filter' => array()
                ]);
                foreach ($arRecords as $record)
                {
                    $values[] = $record;
                }
            }
        }
        return $values;
    }
}
