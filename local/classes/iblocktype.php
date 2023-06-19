<?

namespace Classes;

use Bitrix\Main\Loader;

/**
 * Class IBlockType
 *
 * @package Classes
 */
class IBlockType
{
	/**
	 * Создаём новый тип инфоблока
	 * @return string
	 * @throws \Bitrix\Main\LoaderException
	 */
	public static function createIBlockType() :string
    {
        $message = '';

        if (Loader::IncludeModule('iblock')) {

            $conf = IBlockConfig::getIBlockTypeParams();

            if(!\CIBlockType::GetByID($conf['ID'])->Fetch()){

                $obIBlockType = new \CIBlockType;
                $res = $obIBlockType->Add($conf);

                if(!$res){
                    $message = '<p>'.$obIBlockType->LAST_ERROR.'</p><br>';
                }
                else{
                    $message = '<p>Создан тип инфоблока "'.$conf['LANG']['ru']['NAME'].'": '.$conf['ID'] . '</p>';
                }
            }

        }
        return $message;
    }
}