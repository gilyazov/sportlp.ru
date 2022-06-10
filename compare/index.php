<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Сравнение");
?>
<?
//echo "<pre>";
//print_r($_SESSION['COMPARE_LIST']);
//echo "</pre>";
?>

<?$APPLICATION->IncludeComponent("bitrix:catalog.compare.list", "comparison-page", Array(
	"ACTION_VARIABLE" => "action",	// Название переменной, в которой передается действие
		"AJAX_MODE" => "N",	// Включить режим AJAX
		"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
		"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
		"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
		"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
		"COMPARE_URL" => "/compare/",	// URL страницы с таблицей сравнения
		"COMPONENT_TEMPLATE" => ".default",
		"DETAIL_URL" => "",	// URL, ведущий на страницу с содержимым элемента раздела
		"IBLOCK_ID" => "2",	// Инфоблок
		"IBLOCK_TYPE" => "products",	// Тип инфоблока
		"NAME" => "COMPARE_LIST",	// Уникальное имя для списка сравнения
		"POSITION" => "top left",	// Положение на странице
		"POSITION_FIXED" => "Y",	// Отображать список сравнения поверх страницы
		"PRODUCT_ID_VARIABLE" => "id",	// Название переменной, в которой передается код товара для покупки
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>