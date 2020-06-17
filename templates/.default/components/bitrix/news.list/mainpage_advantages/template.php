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

<div class="feature-section section mb-60 hidden-xs">
    <div class="container">
        <div class="row">
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
            <div id="<?=$this->GetEditAreaId($arItem['ID']);?>" class="col-lg-4 col-md-6 col-12 mb-30">
                <!-- Feature Start -->
                <div class="feature-two" style="background-image: url(<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>)">
                    <div class="feature-wrap">
                        <div class="icon"><img src="<?=$arItem["DISPLAY_PROPERTIES"]["ICON"]["FILE_VALUE"]["SRC"]?>" alt="<?=$arItem["NAME"]?>"></div>
                        <h4><?=$arItem["NAME"]?></h4>
                        <p><?=$arItem["PREVIEW_TEXT"]?></p>
                    </div>
                </div><!-- Feature End -->
            </div>
		<?endforeach;?>    
        </div>
    </div>
</div>