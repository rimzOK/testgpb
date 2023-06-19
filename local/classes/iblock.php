<?

namespace Classes;

use Bitrix\Main\Loader,
    Bitrix\Iblock\IblockTable,
    Bitrix\Iblock\PropertyTable;

/**
 * Class IBlock
 *
 * @package Classes
 */
class IBlock
{
	/**
	 * Создаём инфоблок из нстроек IBlockConfig
	 * @return string
	 * @throws \Bitrix\Main\LoaderException
	 */
	public static function createIBlock() :string
    {
        $typeConf = IBlockConfig::getIBlockTypeParams();
        $iBlockConf = IBlockConfig::getIBlockParams();
        $mess= '';
        if (Loader::includeModule('iblock') && \CIBlockType::GetByID($typeConf['ID'])->Fetch() && !self::isExists($iBlockConf['IBLOCK']['CODE'])) {
            $ib = new \CIBlock;
            $ID = $ib->Add($iBlockConf['IBLOCK']);
            if ($ID > 0) {
                foreach ($iBlockConf['PROPERTIES'] as $property) {
                    try {
                        $property['IBLOCK_ID'] = $ID;
                        PropertyTable::add($property);
                    }
                    catch (\Exception $e) {
                        $mess = $e->getMessage();
                        return $mess;
                    }
                }

                $mess = '<p>Инфоблок "'.$iBlockConf['IBLOCK']['NAME'].'" успешно создан</p>';
            }
            else {
                $mess = "<p>Ошибка создания инфоблока ".$iBlockConf['IBLOCK']['NAME'].' '.$ib->LAST_ERROR."</p>";
            }
        }

        return $mess;
    }

	/**
	 * Проверяем существование инфоблока
	 * @param string $code
	 *
	 * @return bool
	 * @throws \Bitrix\Main\ArgumentException
	 * @throws \Bitrix\Main\ObjectPropertyException
	 * @throws \Bitrix\Main\SystemException
	 */
	public static function isExists(string $code) :bool
    {
        $res = IblockTable::getList([
            'select' => [
                'ID'
            ],
            'filter' => [
                'CODE' => $code
            ]
        ]);
        if ($ob = $res->fetch()) {
            return true;
        }

        return false;
    }

	/**
	 * Получаем id по CODE инфоблока
	 * @param string $code
	 *
	 * @return int
	 */
	public static function getIBlockIdByCode(string $code): int
    {
        $iblockId = 0;

        try {
            if (($code = trim($code)) && Loader::includeModule('iblock')) {

                $iblockId = IblockTable::getList([
                    'select' => [
                        'ID'
                    ],
                    'filter' => [
                        'CODE' => $code
                    ],
                    'limit' => 1,
                    'cache' => [
                        'ttl' => 31536000,
                        'cache_joins' => true,
                    ]
                ])->fetch()['ID'];
            }
        }
        catch (\Exception $e) {

        }

        return (int) $iblockId;
    }
}