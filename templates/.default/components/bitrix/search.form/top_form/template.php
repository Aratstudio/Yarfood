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

<div class="col">
	<div class="header-search-container">
		<form action="<?=$arResult["FORM_ACTION"]?>" class="header-search-form">
			<input type="text" name="q" value="" placeholder="Введите название товара и нажмите Enter...">
		</form>
	</div>
</div>