<?
namespace Classes;

use Bitrix\Iblock\ElementTable;
use Bitrix\Main\Loader;
use Bitrix\Iblock\Elements\ElementofficeslistTable;

/**
 * Class IBlockElements
 *
 * @package Classes
 */
class IBlockElements
{
	/**
	 * Добавление элементов инфоблока из параметров IBlockConfig
	 * @return string
	 * @throws \Bitrix\Main\LoaderException
	 */
	public static function createIBlockElements() :string
    {
        $mess = '';

        if (Loader::includeModule('iblock') && !self::isExists(IBlock::getIBlockIdByCode('offices_list'))) {
            $arElements = IBlockConfig::getIBlockElementsParams();
            foreach ($arElements as $arElement) {
                $arElement['IBLOCK_ID'] = IBlock::getIBlockIdByCode('offices_list');
                $el = new \CIBlockElement;
                if($iBId = $el->Add($arElement))
                    $mess .= 'Добавлен новый элемент: '.$iBId.'<br>';
                else
                    $mess .= 'Error: '.$el->LAST_ERROR;
            }
        }

        return $mess;
    }

	/**
	 * Проверка на существование элементов в инфоблоке
	 * @param string $id
	 *
	 * @return bool
	 * @throws \Bitrix\Main\ArgumentException
	 * @throws \Bitrix\Main\ObjectPropertyException
	 * @throws \Bitrix\Main\SystemException
	 */
	//TODO тут конечно можно было бы сделать проверку каждого элемента из параметров, но думаю пока это не нужно
	public static function isExists(string $id) :bool
    {
        $res = ElementTable::getList([
            'select' => [
                'ID'
            ],
            'filter' => [
                'IBLOCK_ID' => $id
            ]
        ]);
        if ($ob = $res->fetch()) {
            return true;
        }

        return false;
    }
}