<?php
namespace Bitrix\Bizproc;

use Bitrix\Main\Entity;

/**
 * Class RestActivityTable
 *
 * Fields:
 * <ul>
 * <li> ID int mandatory
 * <li> APP_ID string(128) mandatory
 * <li> APP_NAME text mandatory
 * <li> CODE string(128) mandatory
 * <li> INTERNAL_CODE(32) string mandatory
 * <li> HANDLER string(1000) mandatory
 * <li> AUTH_USER_ID int optional default 0
 * <li> USE_SUBSCRIPTION bool optional default ''
 * <li> NAME text mandatory
 * <li> DESCRIPTION text optional
 * <li> PROPERTIES text optional
 * <li> RETURN_PROPERTIES text optional
 * <li> DOCUMENT_TYPE text optional
 * <li> FILTER text optional
 * </ul>
 *
 * @package Bitrix\Bizproc
 */
class RestActivityTable extends Entity\DataManager
{
	/**
	 * Returns path to the file which contains definition of the class.
	 *
	 * @return string
	 */
	
	/**
	* <p>Статический метод возвращает путь к файлу, содержащий описание класса.</p> <p>Без параметров</p> <a name="example"></a>
	*
	*
	* @return string 
	*
	* @static
	* @link http://dev.1c-bitrix.ru/api_d7/bitrix/bizproc/restactivitytable/getfilepath.php
	* @author Bitrix
	*/
	public static function getFilePath()
	{
		return __FILE__;
	}

	/**
	 * Returns DB table name for entity
	 *
	 * @return string
	 */
	
	/**
	* <p>Статический метод возвращает имя таблицы базы данных, соответствующей данной сущности.</p> <p>Без параметров</p> <a name="example"></a>
	*
	*
	* @return string 
	*
	* @static
	* @link http://dev.1c-bitrix.ru/api_d7/bitrix/bizproc/restactivitytable/gettablename.php
	* @author Bitrix
	*/
	public static function getTableName()
	{
		return 'b_bp_rest_activity';
	}

	/**
	 * Returns entity map definition.
	 *
	 * @return array
	 */
	
	/**
	* <p>Статический метод возвращает список полей с типами.</p> <p>Без параметров</p> <a name="example"></a>
	*
	*
	* @return array 
	*
	* @static
	* @link http://dev.1c-bitrix.ru/api_d7/bitrix/bizproc/restactivitytable/getmap.php
	* @author Bitrix
	*/
	public static function getMap()
	{
		return array(
			'ID' => array(
				'data_type' => 'integer',
				'primary' => true,
				'autocomplete' => true,
			),
			'APP_ID' => array(
				'data_type' => 'string',
				'required' => true,
				'validation' => array(__CLASS__, 'validateAppId'),
			),
			'APP_NAME' => array(
				'data_type' => 'text',
				'required' => true,
				'serialized' => true,
				'save_data_modification'  => array(__CLASS__, 'getLocalizationSaveModifiers'),
			),
			'CODE' => array(
				'data_type' => 'string',
				'required' => true,
				'validation' => array(__CLASS__, 'validateCode'),
			),
			'INTERNAL_CODE' => array(
				'data_type' => 'string',
				'required' => true,
			),
			'HANDLER' => array(
				'data_type' => 'string',
				'required' => true,
				'validation' => array(__CLASS__, 'validateHandler'),
			),
			'AUTH_USER_ID' => array(
				'data_type' => 'integer',
				'default_value' => 0
			),
			'USE_SUBSCRIPTION' => array(
				'data_type' => 'string'
			),
			'NAME' => array(
				'data_type' => 'text',
				'required' => true,
				'serialized' => true,
				'save_data_modification'  => array(__CLASS__, 'getLocalizationSaveModifiers'),
			),
			'DESCRIPTION' => array(
				'data_type' => 'text',
				'serialized' => true,
				'save_data_modification'  => array(__CLASS__, 'getLocalizationSaveModifiers'),
			),
			'PROPERTIES' => array(
				'data_type' => 'text',
				'serialized' => true,
			),
			'RETURN_PROPERTIES' => array(
				'data_type' => 'text',
				'serialized' => true,
			),
			'DOCUMENT_TYPE' => array(
				'data_type' => 'text',
				'serialized' => true,
			),
			'FILTER' => array(
				'data_type' => 'text',
				'serialized' => true,
			),
		);
	}

	/**
	 * Returns validators for APP_ID field.
	 *
	 * @return array
	 */
	
	/**
	* <p>Статический метод возвращает валидаторы поля <code>APP_ID</code>.</p> <p>Без параметров</p> <a name="example"></a>
	*
	*
	* @return array 
	*
	* @static
	* @link http://dev.1c-bitrix.ru/api_d7/bitrix/bizproc/restactivitytable/validateappid.php
	* @author Bitrix
	*/
	public static function validateAppId()
	{
		return array(
			new Entity\Validator\Length(null, 128),
		);
	}

	/**
	 * Returns validators for CODE field.
	 *
	 * @return array
	 */
	
	/**
	* <p>Статический метод возвращает валидаторы поля <code>CODE</code>.</p> <p>Без параметров</p> <a name="example"></a>
	*
	*
	* @return array 
	*
	* @static
	* @link http://dev.1c-bitrix.ru/api_d7/bitrix/bizproc/restactivitytable/validatecode.php
	* @author Bitrix
	*/
	public static function validateCode()
	{
		return array(
			new Entity\Validator\Length(null, 128),
		);
	}

	/**
	 * Returns validators for HANDLER field.
	 *
	 * @return array
	 */
	
	/**
	* <p>Статический метод возвращает валидаторы для поля <code>HANDLER</code>.</p> <p>Без параметров</p> <a name="example"></a>
	*
	*
	* @return array 
	*
	* @static
	* @link http://dev.1c-bitrix.ru/api_d7/bitrix/bizproc/restactivitytable/validatehandler.php
	* @author Bitrix
	*/
	public static function validateHandler()
	{
		return array(
			new Entity\Validator\Length(null, 1000),
		);
	}

	/**
	 * @return array Array of callbacks.
	 */
	public static function getLocalizationSaveModifiers()
	{
		return array(array(__CLASS__, 'prepareLocalization'));
	}

	/**
	 * @param mixed $value Original value.
	 * @return array Array to serialize.
	 */
	public static function prepareLocalization($value)
	{
		if (!is_array($value))
			$value = array('*' => (string) $value);
		return $value;
	}

	/**
	 * @param mixed $field Activity field value.
	 * @param string $langId Language ID.
	 * @return string
	 */
	public static function getLocalization($field, $langId)
	{
		$result = '';
		$langId = strtoupper($langId);
		if (is_string($field))
			$result = $field;
		elseif (!empty($field[$langId]))
			$result = $field[$langId];
		elseif ($langId == 'UA' && !empty($field['RU']))
			$result = $field['RU'];
		elseif (!empty($field['EN']))
			$result = $field['EN'];
		elseif (!empty($field['*']))
			$result = $field['*'];
		return $result;
	}
}
