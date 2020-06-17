<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<ul id="mx_dropdown__mobile">

<?
$previousLevel = 0;
foreach($arResult as $arItem):?>
<?//d($arItem["MENU_PICTURE"])?>
	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>

	<?if ($arItem["IS_PARENT"]):?>

		<?if ($arItem["DEPTH_LEVEL"] == 1):?>
			<li class="m_li_lvl_<?=$arItem["DEPTH_LEVEL"]?>"><a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?> parent_a <?=$arItem["UF_HIDE"] === "1" ? "mx_menu_hide": ""?>"><?=$arItem["TEXT"]?></a>
				<ul class="m_ul_lvl_<?=$arItem["DEPTH_LEVEL"]?> root-item">
					<a href="" class="mx_dropdown__mobile__back">Назад</a>
					<div class="mx_dropdown__mobile__title"><?=$arItem["TEXT"]?></div>
		<?else:?>
			<li class="m_li_lvl_<?=$arItem["DEPTH_LEVEL"]?>"><a href="<?=$arItem["LINK"]?>" class="parent<?if ($arItem["SELECTED"]):?> item-selected<?endif?> parent_a <?=$arItem["UF_HIDE"] === "1" ? "mx_menu_hide": ""?>"><?=$arItem["TEXT"]?></a>
				<ul class="m_ul_lvl_<?=$arItem["DEPTH_LEVEL"]?>">
					<div class="mx_dropdown__mobile__title"><?=$arItem["TEXT"]?></div>
		<?endif?>

	<?else:?>


		<?if ($arItem["DEPTH_LEVEL"] == 1):?>
			<li class="m_li_lvl_<?=$arItem["DEPTH_LEVEL"]?>">
				<a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?> <?=$arItem["UF_HIDE"] === "1" ? "mx_menu_hide": ""?>"><?=$arItem["TEXT"]?></a>
			</li>
		<?else:?>
			<li class="m_li_lvl_<?=$arItem["DEPTH_LEVEL"]?>">
				<a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?> item-selected<?endif?> <?=$arItem["UF_HIDE"] === "1" ? "mx_menu_hide": ""?>"><?=$arItem["TEXT"]?></a>
			</li>
		<?endif?>


	<?endif?>

	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
<?endif?>

</ul>
<?endif?>