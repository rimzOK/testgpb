<?
namespace Classes;

/**
 * Class IBlockConfig
 *
 * @package Classes
 */
class IBlockConfig
{
	/**
	 * Параметры для создания типа инфоблока
	 * @return array
	 */
	public static function getIBlockTypeParams() :array
    {
        return [
            "ID" => "content",
            "SORT" => 500,
            "SECTIONS" => "Y",
            "LANG" => Array(
                "ru" => Array(
                    "NAME" => "Контент",
                ),
                "en" => Array(
                    "NAME" => "Сontent",
                ),
            )
        ];
    }

	/**
	 * Параметры для создания инфоблока
	 * @return array
	 */
	public static function getIBlockParams() :array
    {
        return [

            "IBLOCK" => [
                "SITE_ID" => 's1',
                "IBLOCK_TYPE_ID" => self::getIBlockTypeParams()['ID'],
                "ACTIVE" => "Y",
                "NAME" => "Список офисов",
                "CODE" => "offices_list",
                "API_CODE" => "officeslist",
                "SORT" => 500,
                "DETAIL_PAGE_URL" => "#SITE_DIR#/ofisy/#ELEMENT_CODE#",
                "GROUP_ID" => ["1"=>"X", "2"=>"R"]
            ],

            "PROPERTIES" => [
                0 => [
                    "NAME" => "Телефон",
                    "ACTIVE" => "Y",
                    "SORT" => 100,
                    "CODE" => "PHONE",
                    "PROPERTY_TYPE" => "S"
                ],
                1 => [
                    "NAME" => "Email",
                    "ACTIVE" => "Y",
                    "SORT" => 200,
                    "CODE" => "EMAIL",
                    "PROPERTY_TYPE" => "S"
                ],
                2 => [
                    "NAME" => "Координаты",
                    "ACTIVE" => "Y",
                    "SORT" => 300,
                    "CODE" => "CORDS",
                    "PROPERTY_TYPE" => "S"
                ],
                3 => [
                    "NAME" => "Город",
                    "ACTIVE" => "Y",
                    "SORT" => 400,
                    "CODE" => "CITY",
                    "PROPERTY_TYPE" => "S"
                ],

            ]
        ];
    }

	/**
	 * Параметры для создания элементов инфоблока
	 * @return array|array[]
	 */
	public static function getIBlockElementsParams() :array
    {
        return [
            0 => [
                "NAME" => "Газпромбанк. Первомайская, д 43",
				"PREVIEW_PICTURE" => \CFile::MakeFileArray("https://im.kommersant.ru/gboxtexts/sp_com/logos/016.jpg"),
				"PROPERTY_VALUES" => [
                    "PHONE" => "8 (800) 100-07-01",
                    "EMAIL" => "1@mail.ru",
                    "CORDS" => "54.81471706141589,56.08715686773671",
                    "CITY" => "Уфа"
                ]
            ],
            1 => [
                "NAME" => "Газпромбанк. просп. Октября, 148",
				"PREVIEW_PICTURE" => \CFile::MakeFileArray("https://im.kommersant.ru/gboxtexts/sp_com/logos/016.jpg"),
                "PROPERTY_VALUES" => [
                    "PHONE" => "8 (800) 100-07-01",
                    "EMAIL" => "2@mail.ru",
                    "CORDS" => "54.78413556988767,56.03410450000001",
                    "CITY" => "Уфа"
                ]
            ],
            2 => [
                "NAME" => "Газпромбанк. просп. Октября, 15",
				"PREVIEW_PICTURE" => \CFile::MakeFileArray("https://im.kommersant.ru/gboxtexts/sp_com/logos/016.jpg"),
                "PROPERTY_VALUES" => [
                    "PHONE" => "8 (800) 100-07-01",
                    "EMAIL" => "3@mail.ru",
                    "CORDS" => "54.74463806993342,55.990231",
                    "CITY" => "Уфа"
                ]
            ],
            3 => [
                "NAME" => "Газпромбанк. ул. Ленина, 5/4",
				"PREVIEW_PICTURE" => \CFile::MakeFileArray("https://im.kommersant.ru/gboxtexts/sp_com/logos/016.jpg"),
                "PROPERTY_VALUES" => [
                    "PHONE" => "8 (800) 100-07-01",
                    "EMAIL" => "4@mail.ru",
                    "CORDS" => "54.725040569971405,55.94565649999994",
                    "CITY" => "Уфа"
                ]
            ],
            4 => [
                "NAME" => "Газпромбанк. ул. Менделеева, 138",
				"PREVIEW_PICTURE" => \CFile::MakeFileArray("https://im.kommersant.ru/gboxtexts/sp_com/logos/016.jpg"),
                "PROPERTY_VALUES" => [
                    "PHONE" => "8 (800) 100-07-01",
                    "EMAIL" => "5@mail.ru",
                    "CORDS" => "54.71933156995671,56.009104499999935",
                    "CITY" => "Уфа"
                ]
            ],

        ];
    }
}