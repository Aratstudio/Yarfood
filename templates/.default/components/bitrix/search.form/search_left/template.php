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
$this->setFrameMode(true);?>


	<div class="menu-search">
		<form action="<?=$arResult["FORM_ACTION"]?>">
			<div class="input"><input type="text" name="q" value="" class="form-control" placeholder="Поиск товара..."></div>
			
			<div class="submit"><button class="btn btn-small btn-square hover-theme" name="s"><i class="fa fa-search" aria-hidden="true"></i></button></div>
		</form>
		
	</div>
