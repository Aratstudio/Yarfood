<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();


/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $item
 * @var array $actualItem
 * @var array $minOffer
 * @var array $itemIds
 * @var array $price
 * @var array $measureRatio
 * @var bool $haveOffers
 * @var bool $showSubscribe
 * @var array $morePhoto
 * @var bool $showSlider
 * @var string $imgTitle
 * @var string $productTitle
 * @var string $buttonSizeClass
 * @var CatalogSectionComponent $component
 */
if ($haveOffers)
{
	$showDisplayProps = !empty($item['DISPLAY_PROPERTIES']);
	$showProductProps = $arParams['PRODUCT_DISPLAY_MODE'] === 'Y' && $item['OFFERS_PROPS_DISPLAY'];
	$showPropsBlock = $showDisplayProps || $showProductProps;
	$showSkuBlock = $arParams['PRODUCT_DISPLAY_MODE'] === 'Y' && !empty($item['OFFERS_PROP']);
}
else
{
	$showDisplayProps = !empty($item['DISPLAY_PROPERTIES']);
	$showProductProps = $arParams['ADD_PROPERTIES_TO_BASKET'] === 'Y' && !empty($item['PRODUCT_PROPERTIES']);
	$showPropsBlock = $showDisplayProps || $showProductProps;
	$showSkuBlock = false;
}
$rsSection = CIBlockSection::GetByID($item['~IBLOCK_SECTION_ID']);
if($arSection = $rsSection->GetNext())
  $sectionName = $arSection['NAME'];



  
?>

<div class="ee-product t1">

	<div class="image">


		<a href="<?=$item['DETAIL_PAGE_URL']?>" class="img"><img src="<?=$item['DETAIL_PICTURE']['SRC']?>" alt="<?=$productTitle?>"></a>

		<div class="wishlist-compare">
			<a href="#" data-tooltip="Сравнить" id="<?=$itemIds['COMPARE_LINK']?>" class="<?=($arResult['IS_COMPARED_ITEM'] == 'Y' ? 'added' : '')?>"><i class="ti-control-shuffle"></i></a>
			<a href="javascript:void(0)" class="<?=(isset($arResult['IS_DELAY_ITEM']) ? 'added' : '')?>" 
				data-tooltip="В избранное" onclick="add2wish(
				'<?=$arResult["ITEM"]["ID"]?>',
					'<?=$arResult["ITEM"]["CATALOG_PRICE_ID_1"]?>',
					'<?=$arResult["ITEM"]["CATALOG_PRICE_1"]?>',
					'<?=$arResult["ITEM"]["NAME"]?>',
					'<?=$arResult["ITEM"]["DETAIL_PAGE_URL"]?>',
					this)"
					><i class="ti-heart"></i></a>
		</div>
		<div id="<?=$itemIds['BASKET_ACTIONS']?>">
			<a id="<?=$itemIds['BUY_LINK']?>" href="javascript:void(0);" class="add-to-cart"><i class="ti-shopping-cart"></i><span>В корзину</span></a>
		</div>

	</div>

	<!-- Content -->
	<div class="content">

		<!-- Category & Title -->
		<div class="category-title">

<a href="/category/<? $res = CIBlockSection::GetByID($arResult["ITEM"]["~IBLOCK_SECTION_ID"]);
	if($ar_res = $res->GetNext()) {				  
		echo $ar_res['CODE'];
	} ?>/" class="cat"><?=$sectionName?></a>



			<h5 class="title"><a href="<?=$item['DETAIL_PAGE_URL']?>"><?=$productTitle?></a></h5>
 <span class="availability_card">Доступность: <span><?
                    if($item['CAN_BUY'] ? 'В наличии' : 'Нет в наличии');
                        if($item['CATALOG_QUANTITY']===0){
                 
                            echo("Нет в наличии");
                        }
                        else{echo("Есть в наличии");
                  
						}?></span><? 
						//echo '<pre>', print_r($arResult['PROPERTIES'],1),'</pre>';
//if($item['PROPERTIES']['PROIZVODITEL']['VALUE']=="Rational"){
//	$item['SORT']=1000;
							//$arResult['RATING']=5;
							//}
						//echo '<pre>', print_r($arResult['RATING'],1),'</pre>';
						
						?>
						
						
							</span>
		</div>

		<!-- Price & Ratting -->
		<div class="price-ratting">
			
			<h5 class="price" id="<?=$itemIds['PRICE']?>"><?=$item['MIN_PRICE']['PRINT_VALUE']?></h5>
			<?if(!empty($arResult['RATING'])):?>
			<div class="ratting">
				<?=convertRatingIntoStars($arResult['RATING']);?>
			</div>
			
			<?endif;?>

		</div>

	</div>

<? 
							//			echo '<pre>', print_r($rsSection,1),'</pre>';
							//echo '<pre>', print_r($item['SORT'],1),'</pre>';
?>

</div>		


<div class="row product-item" style="display:none;">
	<span id="<?=$itemIds['PICT_SLIDER']?>"></span>
	<span class="product-item-image-original" id="<?=$itemIds['PICT']?>"></span>
	<span class="product-item-image-alternative" id="<?=$itemIds['SECOND_PICT']?>"></span>
	<div class="product-item-image-slider-control-container" id="<?=$itemIds['PICT_SLIDER']?>_indicator"></div>
</div>