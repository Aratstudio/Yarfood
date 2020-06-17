<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
use Bitrix\Main\Loader;
use Bitrix\Main\ModuleManager;
use Bitrix\Main\Application; 

$this->setFrameMode(true);
$this->addExternalCss("/bitrix/css/main/bootstrap.css");

if (!isset($arParams['FILTER_VIEW_MODE']) || (string)$arParams['FILTER_VIEW_MODE'] == '')
	$arParams['FILTER_VIEW_MODE'] = 'VERTICAL';
$arParams['USE_FILTER'] = (isset($arParams['USE_FILTER']) && $arParams['USE_FILTER'] == 'Y' ? 'Y' : 'N');

$isVerticalFilter = ('Y' == $arParams['USE_FILTER'] && $arParams["FILTER_VIEW_MODE"] == "VERTICAL");
$isSidebar = ($arParams["SIDEBAR_SECTION_SHOW"] == "Y" && isset($arParams["SIDEBAR_PATH"]) && !empty($arParams["SIDEBAR_PATH"]));
$isFilter = ($arParams['USE_FILTER'] == 'Y');

if ($isFilter)
{
	$arFilter = array(
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"ACTIVE" => "Y",
		"GLOBAL_ACTIVE" => "Y",
	);
	if (0 < intval($arResult["VARIABLES"]["SECTION_ID"]))
		$arFilter["ID"] = $arResult["VARIABLES"]["SECTION_ID"];
	elseif ('' != $arResult["VARIABLES"]["SECTION_CODE"])
		$arFilter["=CODE"] = $arResult["VARIABLES"]["SECTION_CODE"];

	$obCache = new CPHPCache();
	if ($obCache->InitCache(36000, serialize($arFilter), "/iblock/catalog"))
	{
		$arCurSection = $obCache->GetVars();
	}
	elseif ($obCache->StartDataCache())
	{
		$arCurSection = array();
		if (Loader::includeModule("iblock"))
		{
			$dbRes = CIBlockSection::GetList(array(), $arFilter, false, array("ID"));

			if(defined("BX_COMP_MANAGED_CACHE"))
			{
				global $CACHE_MANAGER;
				$CACHE_MANAGER->StartTagCache("/iblock/catalog");

				if ($arCurSection = $dbRes->Fetch())
					$CACHE_MANAGER->RegisterTag("iblock_id_".$arParams["IBLOCK_ID"]);

				$CACHE_MANAGER->EndTagCache();
			}
			else
			{
				if(!$arCurSection = $dbRes->Fetch())
					$arCurSection = array();
			}
		}
		$obCache->EndDataCache($arCurSection);
	}
	if (!isset($arCurSection))
		$arCurSection = array();
}

if(!empty($_REQUEST['show'])) {
	$arParams["PAGE_ELEMENT_COUNT"] = $_REQUEST['show'];
}
$arParams["VIEW_TYPE"] = 'CARD';
if(!empty($_REQUEST['view'])) {
	if($_REQUEST['view'] == 'grid')
		$arParams["VIEW_TYPE"] = 'CARD';
	if($_REQUEST['view'] == 'list')
		$arParams["VIEW_TYPE"] = 'LINE';
}
if(!empty($_REQUEST['sort'])) {
	if($_REQUEST['sort'] == 'price_asc') {
		$arParams["ELEMENT_SORT_FIELD"] = 'catalog_PRICE_1';
		$arParams["ELEMENT_SORT_ORDER"] = 'ASC';
	} elseif($_REQUEST['sort'] == 'price_desc') {
		$arParams["ELEMENT_SORT_FIELD"] = 'catalog_PRICE_1';
		$arParams["ELEMENT_SORT_ORDER"] = 'DESC';
	} elseif($_REQUEST['sort'] == 'rating_asc') {

	} elseif($_REQUEST['sort'] == 'rating_desc') {

	} elseif($_REQUEST['sort'] == 'available'){
	$arParams["ELEMENT_SORT_FIELD"] = 'CATALOG_QUANTITY';
	$arParams["ELEMENT_SORT_ORDER"] = 'DESC';
	}
	elseif($_REQUEST['sort'] == 'nobody') {
	
	}
	 else {
		$arParams["ELEMENT_SORT_FIELD"] = 'CATALOG_QUANTITY';
		$arParams["ELEMENT_SORT_ORDER"] = 'DESC';
	}
	
} else {
	//  $_REQUEST['sort'] == 'nobody';
	//  $arParams["ELEMENT_SORT_FIELD"] = '';
	//  $arParams["ELEMENT_SORT_ORDER"] = 'DESC';
	
}

?>

<?php

$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"section-list-custom",
	array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
		"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
		"TOP_DEPTH" => $arParams["SECTION_TOP_DEPTH"],
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"],
		"SHOW_PARENT_NAME" => $arParams["SECTIONS_SHOW_PARENT_NAME"],
		"HIDE_SECTION_NAME" =>  "Y",
		"ADD_SECTIONS_CHAIN" =>  "N"
	),
	$component,
	array("HIDE_ICONS" => "Y")
);




?>

<div class="row mb-50">
	<div class="col">
		<div class="shop-top-bar with-sidebar">
			<div class="product-view-mode">
				<a class="<?=(isset($_REQUEST['view']) ? ($_REQUEST['view'] == 'grid' ? 'active' : '') : 'active')?>" href="<?=$APPLICATION->GetCurPageParam('view=grid', array('view'))?>" data-target="grid"><i class="fa fa-th"></i></a>
				<a class="<?=(isset($_REQUEST['view']) ? ($_REQUEST['view'] == 'list' ? 'active' : '') : '')?>" href="<?=$APPLICATION->GetCurPageParam('view=list', array('view'))?>" data-target="list"><i class="fa fa-list"></i></a>
			</div>

			<div class="product-showing">
				<p>Выводить по</p>
				<select name="showing" class="nice-select">
					<option <?=($arParams["PAGE_ELEMENT_COUNT"] == 8 ? 'selected' : '')?> value="8">8</option>
					<option <?=($arParams["PAGE_ELEMENT_COUNT"] == 12 ? 'selected' : '')?> value="12">12</option>
					<option <?=($arParams["PAGE_ELEMENT_COUNT"] == 16 ? 'selected' : '')?>  value="16">16</option>
					<option <?=($arParams["PAGE_ELEMENT_COUNT"] == 20 ? 'selected' : '')?> value="20">20</option>
					<option <?=($arParams["PAGE_ELEMENT_COUNT"] == 24 ? 'selected' : '')?> value="24">24</option>
				</select>
			</div>

			<div class="product-short">
				<p>Сортировать по</p>
				<select name="sortby" class="nice-select">
					<option <?=($_REQUEST['sort'] == 'nobody' ? 'selected' : '')?> value="nobody" >Без фильтра</option>
					<option <?=($_REQUEST['sort'] == 'price_asc' ? 'selected' : '')?> value="price_asc">Цена &uarr;</option>
					<option <?=($_REQUEST['sort'] == 'price_desc' ? 'selected' : '')?> value="price_desc">Цена &darr;</option>
					<!--<option <?=($_REQUEST['sort'] == 'rating_asc' ? 'selected' : '')?> value="rating_asc">Рейтинг &uarr;</option>
					<option <?=($_REQUEST['sort'] == 'rating_desc' ? 'selected' : '')?> value="rating_desc">Рейтинг &darr;</option>-->
					<option <?=($_REQUEST['sort'] == 'available' ? 'selected' : '')?> value="available">Товары в наличии</option>
				</select>
			</div>

			<div class="product-pages">
				<p>Страница <?=($_REQUEST['PAGEN_1'] ? $_REQUEST['PAGEN_1'] : '1')?> из <span id="sectionNavPageCount">1</span></p>
			</div>
		</div>	
	</div>
</div>


<?


if ($isVerticalFilter)
	include($_SERVER["DOCUMENT_ROOT"]."/".$this->GetFolder()."/section_vertical.php");
else
	include($_SERVER["DOCUMENT_ROOT"]."/".$this->GetFolder()."/section_horizontal.php");
?>