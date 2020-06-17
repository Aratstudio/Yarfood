<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

	//echo 1; 
	
/*
	$rsmResult = CIBlockSection::GetList(array("SORT"=>"ASC"), array("IBLOCK_ID"=>58), false, Array("PICTURE", "CODE", "NAME", "UF_HIDE"));
	while($armResult = $rsmResult->Fetch()) {
		d($armResult);
	}
*/

	$sections_code = array();
		
	$rsmResult = CIBlockSection::GetList(array("SORT"=>"ASC"), array("IBLOCK_ID"=>58), false, Array("UF_HIDE"));
while($armResult = $rsmResult->Fetch()) {
		$sections_code[$armResult["CODE"]]["UF_HIDE"] = $armResult['UF_HIDE'];
		
}
//d($sections_code);
	

	
	
	foreach($arResult as $k => $arItem) {
	if (CModule::IncludeModule("iblock")){
	//d($arItem);
		
		$t = explode('/', $arItem['LINK']);
		array_pop($t);
		$y = array_pop($t);

		$arResult[$k]['UF_HIDE'] = $sections_code[$y]["UF_HIDE"];


	}
		
}
	
//d($sections_name);

	
	//d($arPictures);


/*
foreach($arResult as $k => $arItem) {
	if (CModule::IncludeModule("iblock")){
		$link = explode('/', $arItem["LINK"]);
		$rlink = array_reverse($link);
		$firtsLink = $rlink[1];
		$arResult[$k]["MENU_PICTURE"] = $sections_name[$firtsLink]["PICTURE"];
	}
		
}
*/
?>