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
        "PRODUCT_ID" => $arResult['ID'],
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

if(array_key_exists($arResult['ID'], $_SESSION["CATALOG_COMPARE_LIST"][$arParams['IBLOCK_ID']]['ITEMS'])) {
    $arResult['IS_COMPARED_ITEM'] = 'Y';
}

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();


$arResult["MORE_PHOTO"] = array(); 
 if(isset($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"]) && is_array($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"])) 
 { 
 foreach($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"] as $FILE) 
 { 
 $FILE = CFile::GetFileArray($FILE); 
 if(is_array($FILE)) 
 $arResult["MORE_PHOTO"][]=$FILE; 
 } 
} 


/*
$arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM","XML_ID");
$arFilter = Array("IBLOCK_ID"=>IntVal($arResult["IBLOCK_ID"]), "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y","SECTION_ID"=>$arResult["IBLOCK_SECTION_ID"]);
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>10), $arSelect);
while($ob = $res->GetNextElement())
{
 $arFields = $ob->GetFields();

 $arResult["FAKE_RECOMMEND"][] = $arFields["XML_ID"];
}
*/
