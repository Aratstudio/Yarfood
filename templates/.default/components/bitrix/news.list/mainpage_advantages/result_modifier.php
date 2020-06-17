<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

foreach($arResult['ITEMS'] as $key => $item)
{
    $arResult[$key]['ICON'] = CFile::GetPath($item['PROPERTIES']['ICON']['VALUE']);
}