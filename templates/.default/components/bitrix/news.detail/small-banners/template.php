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
$this->setFrameMode(true);
?>
<div class="banner">
	<?if(!empty($arResult['PROPERTIES']['LINK']['VALUE'])):?>
	<a href="#">
	<?endif;?>
		<img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="$arResult["NAME"]">
	<?if(!empty($arResult['PROPERTIES']['LINK']['VALUE'])):?>
	</a>
	<?endif;?>
</div>