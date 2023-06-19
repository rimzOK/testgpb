<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Офисы");
?>
<?
$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view",
	"offices",
	array(
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:3:{s:10:\"yandex_lat\";d:54.749124522655336;s:10:\"yandex_lon\";d:56.001591847515265;s:12:\"yandex_scale\";i:11;}",
		"MAP_WIDTH" => "100%",
		"MAP_HEIGHT" => "500",
		"CONTROLS" => array(
			0 => "ZOOM",
			1 => "SMALLZOOM",
			2 => "SCALELINE",
		),
		"OPTIONS" => array(
			0 => "ENABLE_DRAGGING",
		),
		"MAP_ID" => "ymap",
		"COMPONENT_TEMPLATE" => "offices",
		"API_KEY" => ""
	),
	false
);
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>