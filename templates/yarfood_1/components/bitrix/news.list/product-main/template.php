<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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


<div class="product-slider-wrap product-slider-arrow-two">
    <div class="product-slider product-slider-3">


        <? foreach ($arResult["ITEMS"] as $arItem) : ?>
            <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>

            <div class="col pb-20 pt-10" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                <!-- Product Start -->
                <div class="ee-product">

                    <!-- Image -->
                    <div class="image">

                        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="img"><img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"></a>

                        <div class="wishlist-compare">
                            <a href="#" data-tooltip="Сравнить"><i class="ti-control-shuffle"></i></a>
                            <a href="#" data-tooltip="В избранное"><i class="ti-heart"></i></a>
                        </div>

                        <a href="#" class="add-to-cart"><i class="ti-shopping-cart"></i>В Корзину</a>

                    </div>

                    <!-- Content -->
                    <div class="content">

                        <!-- Category & Title -->
                        <div class="category-title">
                     
                            <a href="#" class="cat"><?=$sectionName?></a>
                            <h5 class="title"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a></h5>
                            <p class="cat availability"><span class="availability_card">Доступность: <span><?
                    if($aritem['CAN_BUY'] ? 'В наличии' : 'Нет в наличии');
                        if($aritem['CATALOG_QUANTITY']===0){
                 
                            echo("Нет в наличии");
                        }
                        else{echo("Есть в наличии");
                            
                  
                        }?></span></span></p>
                        </div>

                        <!-- Price & Ratting -->
                        <div class="price-ratting">

                        <h5 class="price" id="<?=$itemIds['PRICE']?>"><?=$aritem['MIN_PRICE']['PRINT_VALUE']?></h5>
                       


                        </div>

                    </div>

                </div><!-- Product End -->
            </div>


        <? endforeach; ?>

    </div>
</div>