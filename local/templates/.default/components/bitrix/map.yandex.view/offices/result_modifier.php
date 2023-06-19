<?
use Bitrix\Iblock\Elements\ElementofficeslistTable;

$elements = ElementofficeslistTable::getList([
    'select' => ['ID', 'NAME' ,'PREVIEW_PICTURE' ,'CORDS_' => 'CORDS', 'EMAIL_' => 'EMAIL', 'PHONE_' => 'PHONE', 'CITY_' => 'CITY'],
    'filter' => ['=ACTIVE' => 'Y'],
    'cache' => [
        'ttl' => 36000000,
        'cache_joins' => true,
    ]
])->fetchAll();
foreach ($elements as $element) {
    $arTmp = explode(',', $element['CORDS_VALUE']);
    $arResult['POSITION']['PLACEMARKS'][] = [
        'LON' => $arTmp[1],
        'LAT' => $arTmp[0],
        'TEXT' => $element['NAME'],
        'PREVIEW_PICTURE' => \CFile::GetPath($element['PREVIEW_PICTURE']),
        'EMAIL' => $element['EMAIL_VALUE'],
        'PHONE' => $element['PHONE_VALUE'],
        'CITY' => $element['CITY_VALUE']
    ];
}

$arResult['OFFICE'] = $elements;