<?
namespace Classes;

/**
 * Class IBlockStructure
 *
 * @package Classes
 */
class IBlockStructure
{
	/**
	 * Создаём структуру инфоблоков
	 * @return string
	 * @throws \Bitrix\Main\LoaderException
	 */
	public static function create() : string
	{
		$mess = '';
		$mess .= IBlockType::createIBlockType();
		$mess .= IBlock::createIBlock();
		$mess .= IBlockElements::createIBlockElements();

		return print_r($mess);
	}
}