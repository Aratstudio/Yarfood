<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogTopComponent $component
 */

use \Bitrix\Main\Data\Cache;

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();

$cache = Cache::createInstance();

foreach ($arResult['ITEMS'] as $itemKey => $item) {
    $cacheKey = 'ib_' . $item['IBLOCK_ID'] . '_section_' . $item['IBLOCK_SECTION_ID'];
    if ($cache->initCache(86400, $cacheKey)) {
        $arResult['ITEMS'][$itemKey]['SECTION_NAME'] = $cache->getVars();
    }
    elseif ($cache->startDataCache()) {
        $dbSection = CIBlockSection::GetList(
            ["SORT"=>"ASC"],
            [
                'IBLOCK_ID' => $item['IBLOCK_ID'],
                'ID' => $item['IBLOCK_SECTION_ID']
            ],
            false,
            [
                'NAME'
            ],
            false
        );
    
        $arSection = $dbSection->fetch();

        $arResult['ITEMS'][$itemKey]['SECTION_NAME'] = $arSection['NAME'];

        $cache->endDataCache(array($cacheKey => $arSection['NAME']));
    }
}