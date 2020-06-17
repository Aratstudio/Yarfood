<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogElementComponent $component
 */

$dbBasketItems = CSaleBasket::GetList(
    array(
        "NAME" => "ASC",
        "ID" => "ASC"
    ),
    array(
        "FUSER_ID" => CSaleBasket::GetBasketUserID(),
        "LID" => SITE_ID,
        "PRODUCT_ID" => $arResult['ITEM']['ID'],
        "ORDER_ID" => "NULL",
        "DELAY" => "Y"
    ),
    false,
    false,
    array("PRODUCT_ID")
);
while ($arItems = $dbBasketItems->Fetch())
{
    $arResult['IS_DELAY_ITEM'] = $arItems['PRODUCT_ID'];
}
if(array_key_exists($arResult['ITEM']['ID'], $_SESSION["CATALOG_COMPARE_LIST"][CATALOG_IBLOCK_ID]['ITEMS'])) {
    $arResult['IS_COMPARED_ITEM'] = 'Y';
}
$arResult['RATING'] = $arResult['ITEM']['PROPERTIES']['RATING']['VALUE'];