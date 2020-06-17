<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));
?>
<?if (0 < $arResult["SECTIONS_COUNT"]):?>

<div class="row">
	<div class="col-md-6">
	

		<?
		$boolFirst = true;
		$secondPart = false;
		$sectionCounter = 0;
		$halfSections = $arResult["SECTIONS_COUNT"] / 1.5;
		//echo '<pre>',print_r($arResult["SECTIONS_COUNT"],1),'</pre>';
		foreach ($arResult['SECTIONS'] as &$arSection) {

			

			if ($arSection['RELATIVE_DEPTH_LEVEL'] == 1)
			{
				if(!$boolFirst)
					echo '</ul></div>';

				if($sectionCounter+5 >= $halfSections && !$secondPart) {
					echo '</div><div class="col-md-6">';
					$secondPart = true;
				}
				

				echo '<div class="category-block"><h3><a href="'.$arSection["SECTION_PAGE_URL"].'">'.$arSection["NAME"].'</a><span>'.$arSection["ELEMENT_CNT"].'</span></h3><ul>';
			}
			elseif ($arSection['RELATIVE_DEPTH_LEVEL'] == 2)
			{
				echo '<li><a href="'.$arSection["SECTION_PAGE_URL"].'">'.$arSection["NAME"].'</a></li>';
			}
			$boolFirst = false;
			$sectionCounter++;
		}
		echo '</ul></div>';?>
		
	</div>
	
</div>
<?endif;?>