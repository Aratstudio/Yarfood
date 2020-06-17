<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

$this->IncludeLangFile('template.php');

$cartId = $arParams['cartId'];

if ($arParams["SHOW_PRODUCTS"] == "Y" && ($arResult['NUM_PRODUCTS'] > 0 || !empty($arResult['CATEGORIES']['DELAY'])))
{
?>
	<div class="mini-cart-top">    
		<button class="close-cart">Закрыть корзину<i class="icofont icofont-close"></i></button>
	</div>

	<ul class="mini-cart-products" id="<?=$cartId?>products">
	<?foreach ($arResult["CATEGORIES"] as $category => $items):
		if (empty($items))
		continue;?>
		<?foreach ($items as $v):?>
		<li>
			<a class="image"><img src="<?=$v["PICTURE_SRC"]?>" alt="<?=$v["NAME"]?>"></a>
			<div class="content">
				<a href="<?=$v["DETAIL_PAGE_URL"]?>" class="title"><?=$v["NAME"]?></a>
				<span class="price"><?=GetMessage("TSB1_PRICE")?> <?=$v["FULL_PRICE"]?></span>
				<span class="qty"><?=GetMessage("TSB1_QUANTITY")?> <?=$v["QUANTITY"]?></span>
			</div>
			<button class="remove" onclick="<?=$cartId?>.removeItemFromCart(<?=$v['ID']?>)"><i class="fa fa-trash-o"></i></button>
		</li>
		<?endforeach?>
	<?endforeach?>
	</ul>

	<div class="mini-cart-bottom">    

		<h4 class="sub-total"><?=GetMessage("TSB1_TOTAL")?> <span><?=$arResult['TOTAL_PRICE']?></span></h4>

		<div class="button">
			<a href="<?=$arParams["PATH_TO_ORDER"]?>"><?=GetMessage("TSB1_2ORDER")?></a>
		</div>
		
	</div>

	<script>
		BX.ready(function(){
			<?=$cartId?>.fixCart();
		});
	</script>
<?
}