<?
if(!$isIndexPage && !$isContactsPage && !CATALOG_ELEMENT_PAGE && !$isWishlistPage):?>            </div>
            <?if($APPLICATION->GetPageProperty('HIDE_LEFT_BLOCK') != 'Y'):?>
            <div class="shop-sidebar-wrap col-xl-3 col-lg-4 col-12 order-lg-1 mb-15 order-1">

                <?if($isAboutPage):?>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "left_menu",
                    Array(
                        "ALLOW_MULTI_SELECT" => "N",
                        "CHILD_MENU_TYPE" => "left",
                        "DELAY" => "N",
                        "MAX_LEVEL" => "1",
                        "MENU_CACHE_GET_VARS" => array(""),
                        "MENU_CACHE_TIME" => "3600000",
                        "MENU_CACHE_TYPE" => "A",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "CACHE_SELECTED_ITEMS" => "N",
                        "ROOT_MENU_TYPE" => "left",
                        "USE_EXT" => "Y",
                        "MENU_TITLE" => ""
                    )
                );?>
                <?endif;?>


				<div style="display: none;">

				<?$APPLICATION->IncludeComponent(
					"bitrix:menu", 
					"vertical_multilevel", 
					array(
						"ALLOW_MULTI_SELECT" => "N",
						"CHILD_MENU_TYPE" => "left",
						"DELAY" => "N",
						"MAX_LEVEL" => "3",
						"MENU_CACHE_GET_VARS" => array(
						),
						"MENU_CACHE_TIME" => "3600",
						"MENU_CACHE_TYPE" => "N",
						"MENU_CACHE_USE_GROUPS" => "Y",
						"ROOT_MENU_TYPE" => "left",
						"USE_EXT" => "Y",
						"COMPONENT_TEMPLATE" => "vertical_multilevel"
					),
					false
				);?>
				</div>
                
                <!-- Sidebar -->
                <div class="shop-sidebar mb-35">
                   
                    <h4 class="title">Каталог</h4>
					<?$APPLICATION->IncludeComponent(
						"bitrix:search.form", 
						"search_left", 
						array(
							"COMPONENT_TEMPLATE" => "search_left",
							"PAGE" => "#SITE_DIR#search/index.php",
							"USE_SUGGEST" => "N"
						),
						false
					);?>

                    
                    <ul class="sidebar-category">
                        <li class="mx_drop"><a href="/category/">Оборудование</a>
                        
                        <?$APPLICATION->IncludeComponent("bitrix:menu", "mx_multilevel", Array(
							"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
								"CHILD_MENU_TYPE" => "equip",	// Тип меню для остальных уровней
								"DELAY" => "N",	// Откладывать выполнение шаблона меню
								"MAX_LEVEL" => "2",	// Уровень вложенности меню
								"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
								"MENU_CACHE_TYPE" => "N",	// Тип кеширования
								"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
								"ROOT_MENU_TYPE" => "equip",	// Тип меню для первого уровня
								"USE_EXT" => "Y",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
								"COMPONENT_TEMPLATE" => "vertical_multilevel",
								"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
							),
							false
						);?>
                        
							<!--
                            <ul class="children">
                                <li><a href="/category/teplovoe_oborudovanie/">Тепловое</a></li>
								<li><a href="/category/kholodilnoe_oborudovanie/">Холодильное</a></li>
								<li><a href="/category/elektromekhanicheskoe_oborudovanie/">Электромеханическое</a></li>
								<li><a href="/category/neytralnoe_oborudovanie/">Нейтральное</a></li>
								<li><a href="/category/khlebopekarnoe_oborudovanie/">Хлебопекарное</a></li>
								<li><a href="/category/konditerskoe_oborudovanie/">Кондитерское</a></li>
								<li><a href="/category/posudomoechnoe_oborudovanie/">Посудомоечное</a></li>
								<li><a href="/category/prachechnoe_oborudovanie/">Прачечное</a></li>
								<li><a href="/category/barnoe_oborudovanie/">Барное</a></li>
								<li><a href="/category/kofevarki_i_kofe_mashiny/">Кофеварки и кофе машины</a></li>
								<li><a href="/category/vesovoe_i_upakovochnoe_oborudovanie/">Весовое и упаковочное</a></li>
								<li><a href="/category/ventilyatsionnoe_oborudovanie/">Вентиляционное</a></li>
								<li><a href="/category/sanitarno_gigienicheskoe_oborudovanie/">Санитарно-гигиеническое</a></li>
                            </ul>
							-->
                        </li>

						
						<li class="mx_drop">
							<a href="/category/liniya_razdachi_1/">Линия раздачи</a>
							<ul class="mx_root">
								<li>
									<a href="/category/abat_asta_/" class="root-item">Abat "Аста"</a>
								</li>
								<li>
									<a href="/category/abat_patsha/" class="root-item">Abat "Патша"</a>
								</li>
								<li>
									<a href="/category/abat_premer/" class="root-item">Abat "Премьер"</a>
								</li>
								<li>
									<a href="/category/atesy_rivera/	" class="root-item">Atesy "Ривьера"</a>
								</li>
								<li>
									<a href="/category/tekhno_tt_viola/" class="root-item">Техно-ТТ "Виола"</a>
								</li>
							</ul>
						</li>  


						<li class="mx_drop">
							<a href="/category/posuda/">Посуда</a>
							<ul class="mx_root">
								<li>
									<a href="/category/gastroemkosti/" class="root-item">Гастроемкости</a>
								</li>
								<li>
									<a href="/category/predmety_servirovki/" class="root-item">Предметы сервировки</a>
								</li>
								<li>
									<a href="/category/inventar/" class="root-item">Инвентарь</a>
								</li>
								<li>
									<a href="/category/steklo_farfor_keramika/" class="root-item">Стекло, фарфор, керамика</a>
								</li>
								<li>
									<a href="/category/konteynery/	" class="root-item">Контейнеры</a>
								</li>
								<li>
									<a href="/category/professionalnye_nozhi/" class="root-item">Профессиональные ножи</a>
								</li>
								<li>
									<a href="/category/naplitnaya_posuda/" class="root-item">Наплитная посуда</a>
								</li>
							</ul>
						</li>  


                        <li class="mx_drop">
							<a href="/category/professionalnaya_khimiya/">Проф.химия</a>
							<ul class="mx_root">
								<li>
									<a href="/category/gigiena_kukhni/" class="root-item">Гигиена кухни</a>
								</li>
								<li>
									<a href="/category/lichnaya_gigiena/" class="root-item">Личная гигиена</a>
								</li>
								<li>
									<a href="/category/prachechnaya/	" class="root-item">Прачечная</a>
								</li>
								<li>
									<a href="/category/sredstva_dlya_posudomoechnykh_mashin/" class="root-item">Средства для посудомоечных машин</a>
								</li>
								<li>
									<a href="/category/uborka_zdaniy/" class="root-item">Уборка зданий</a>
								</li>
							</ul>
						</li>  


						<li class="mx_drop">
							<a href="/category/zapchasti/">Запчасти</a>
							<ul class="mx_root">
								<li>
									<a href="/category/teplovoe_oborudovanie_1/" class="root-item">Тепловое оборудование</a>
								</li>
								<li>
									<a href="/category/kholodilnoe_oborudovanie_/" class="root-item">Холодильное оборудование</a>
								</li>
								<li>
									<a href="/category/mekhanicheskoe_oborudovanie/" class="root-item">Механическое оборудование</a>
								</li>
								<li>
									<a href="/category/neytralnoe_oborudovanie_1/" class="root-item">Нейтральное оборудование</a>
								</li>
								<li>
									<a href="/category/prachechnoe_oborudovanie_1/	" class="root-item">Прачечное оборудование</a>
								</li>
								<li>
									<a href="/category/posudomoechnoe_oborudovanie_1/" class="root-item">Посудомоечное оборудование</a>
								</li>
								<li>
									<a href="/category/vesovoe_i_upakovochnoe_oborudovanie_1/" class="root-item">Весовое и упаковочное оборудование</a>
								</li>
								<li>
									<a href="/category/raznoe/" class="root-item">Разное</a>
								</li>
							</ul>
						</li>  


                        <li><a href="/category/tovary_so_skidkoy/">Товары со скидкой</a></li>
                        <li><a href="/actions/">Акции</a></li>   
                        
		                        
	                      </ul>               
                    
                </div>
				<?if(CSite::InDir('/service/') ):?>
				<div class="shop-sidebar left-action mb-35 d-none d-sm-block">
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					Array(
						"AREA_FILE_SHOW" => "file",
						"AREA_FILE_SUFFIX" => "inc",
						"EDIT_TEMPLATE" => "",
						"PATH" => "/include/left-action.php"
					)
				);?>

				</div>
 				<?endif?>

                <?$APPLICATION->ShowViewContent('left_filter');?>
				<div class="hidden-xs">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => "/include/footer_sidebar_schedule.php"
                    )
                );?>
				</div>
                
            </div>
            <?endif;?>
        </div>
    </div>
</div><!-- Blog Section End -->
<?endif;?>
<?
if($isClientsPage):?>
<div class="clients-logo section">
	<div class="container">

<?$APPLICATION->IncludeComponent("bitrix:news.list", "clients-logo", Array(
	"ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
		"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
		"AJAX_MODE" => "N",	// Включить режим AJAX
		"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
		"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
		"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
		"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
		"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
		"CACHE_GROUPS" => "Y",	// Учитывать права доступа
		"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
		"CACHE_TYPE" => "A",	// Тип кеширования
		"CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
		"DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
		"DISPLAY_BOTTOM_PAGER" => "N",	// Выводить под списком
		"DISPLAY_DATE" => "N",	// Выводить дату элемента
		"DISPLAY_NAME" => "N",	// Выводить название элемента
		"DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
		"DISPLAY_PREVIEW_TEXT" => "N",	// Выводить текст анонса
		"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
		"FIELD_CODE" => array(	// Поля
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",	// Фильтр
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
		"IBLOCK_ID" => "30",	// Код информационного блока
		"IBLOCK_TYPE" => "content",	// Тип информационного блока (используется только для проверки)
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
		"INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
		"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
		"NEWS_COUNT" => "20",	// Количество новостей на странице
		"PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
		"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
		"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
		"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
		"PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
		"PAGER_TITLE" => "Новости",	// Название категорий
		"PARENT_SECTION" => "",	// ID раздела
		"PARENT_SECTION_CODE" => "",	// Код раздела
		"PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
		"PROPERTY_CODE" => array(	// Свойства
			0 => "",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
		"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
		"SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
		"SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
		"SET_STATUS_404" => "N",	// Устанавливать статус 404
		"SET_TITLE" => "N",	// Устанавливать заголовок страницы
		"SHOW_404" => "N",	// Показ специальной страницы
		"SORT_BY1" => "ACTIVE_FROM",	// Поле для первой сортировки новостей
		"SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
		"SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
		"SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
		"STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
	),
	false
);?>
	</div>
</div>
<?endif;?>

<?if($APPLICATION->GetPageProperty('HIDE_FOOTER_MAP') == 'N'):?>
<div class="section contacts-map">
    <div class="contacts-section">
        <div class="map-text"> ООО «Яр-Фуд Сервис»
            <hr/>
            660048, г. Красноярск, ул. Брянская, <br>
            д.139, оф. 1-04 
        </div>
    </div>
    <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A09f0c55cae16d91e26b430c85eac52a90df112d816ab8acfaf7ad7e64aeb9a9b&amp;width=100%25&amp;height=400&amp;lang=ru_RU&amp;scroll=false"></script>
</div>
<?endif;?>

<?if($isIndexPage):?>
<?$APPLICATION->IncludeComponent(
	"altasib:feedback.form", 
	"fb_footer", 
	array(
		"ACTIVE_ELEMENT" => "Y",
		"ADD_EVENT_FILES" => "N",
		"ADD_HREF_LINK" => "Y",
		"ADD_LEAD" => "N",
		"ALX_IBLOCK_ELEMENT_LINK" => "",
		"ALX_LINK_POPUP" => "N",
		"ALX_LOAD_PAGE" => "N",
		"ALX_NAME_LINK" => "Напишите нам",
		"ALX_POPUP_TITLE" => "",
		"BBC_MAIL" => "",
		"CAPTCHA_TYPE" => "recaptcha",
		"CATEGORY_SELECT_NAME" => "Выберите категорию",
		"CHANGE_CAPTCHA" => "Y",
		"CHECKBOX_TYPE" => "CHECKBOX",
		"CHECK_ERROR" => "Y",
		"COLOR_OTHER" => "#009688",
		"COLOR_SCHEME" => "BRIGHT",
		"COLOR_THEME" => "",
		"COMPONENT_TEMPLATE" => "fb_footer",
		"EVENT_TYPE" => "ALX_FEEDBACK_FORM",
		"FB_TEXT_NAME" => "",
		"FB_TEXT_SOURCE" => "PREVIEW_TEXT",
		"FORM_ID" => "1",
		"IBLOCK_ID" => "18",
		"IBLOCK_TYPE" => "altasib_feedback",
		"INPUT_APPEARENCE" => array(
			0 => "DEFAULT",
		),
		"JQUERY_EN" => "jquery",
		"LINK_SEND_MORE_TEXT" => "Отправить ещё одно сообщение",
		"LOCAL_REDIRECT_ENABLE" => "N",
		"MASKED_INPUT_PHONE" => array(
			0 => "PHONE",
		),
		"MESSAGE_OK" => "Ваше сообщение было успешно отправлено",
		"NAME_ELEMENT" => "USER_ID",
		"NOT_CAPTCHA_AUTH" => "Y",
		"POPUP_ANIMATION" => "0",
		"PROPERTY_FIELDS" => array(
			0 => "PHONE",
			1 => "FIO",
			2 => "EMAIL",
			3 => "FEEDBACK_TEXT",
		),
		"PROPERTY_FIELDS_REQUIRED" => array(
		),
		"PROPS_AUTOCOMPLETE_EMAIL" => array(
			0 => "EMAIL",
		),
		"PROPS_AUTOCOMPLETE_NAME" => array(
			0 => "FIO",
		),
		"PROPS_AUTOCOMPLETE_PERSONAL_PHONE" => array(
			0 => "PHONE",
		),
		"PROPS_AUTOCOMPLETE_VETO" => "N",
		"REQUIRED_SECTION" => "N",
		"SECTION_FIELDS_ENABLE" => "N",
		"SECTION_MAIL_ALL" => "115@yar-food.ru",
		"SEND_IMMEDIATE" => "N",
		"SEND_MAIL" => "N",
		"SHOW_LINK_TO_SEND_MORE" => "Y",
		"SHOW_MESSAGE_LINK" => "Y",
		"SPEC_CHAR" => "Y",
		"USERMAIL_FROM" => "N",
		"USER_CONSENT" => "N",
		"USER_CONSENT_ID" => "0",
		"USER_CONSENT_INPUT_LABEL" => "",
		"USER_CONSENT_IS_CHECKED" => "Y",
		"USER_CONSENT_IS_LOADED" => "N",
		"USE_CAPTCHA" => "Y",
		"WIDTH_FORM" => "50%",
		"LOCAL_REDIRECT_URL" => "<?=\$APPLICATION->GetCurDir();?>",
		"RECAPTCHA_THEME" => "light",
		"RECAPTCHA_TYPE" => "image",
		"SPEC_CHAR_LIST" => "@/<>\""
	),
	false
);?>
<?endif;?>

<!-- Footer Section Start -->
<div class="footer-section section bg-ivory">

<div class="phone-call visible-xs d-block d-sm-none">
	<a href="callto:+73912191500">
		<i class="icofont-phone-circle icofont"></i>
	</a>
</div>
   
    <!-- Footer Top Section Start -->
    <div class="footer-top-section section pt-90 pb-50">
        <div class="container">
            
            <div class="row">
                
                <!-- Footer Widget Start -->
                <div class="col-lg-3 col-md-6 col-12 mb-40">
                    <div class="footer-widget">
                       
                        <h4 class="widget-title">КОНТАКТЫ</h4>
                        
                        <p class="contact-info">
                            <span>Адрес</span>
                            <?$APPLICATION->IncludeComponent(
                                "bitrix:main.include",
                                "",
                                Array(
                                    "AREA_FILE_SHOW" => "file",
                                    "AREA_FILE_SUFFIX" => "inc",
                                    "EDIT_TEMPLATE" => "",
                                    "PATH" => "/include/footer_adress.php"
                                )
                            );?>
                        </p>
                        
                        <p class="contact-info">
                            <span>Телефон</span>
                            <?$APPLICATION->IncludeComponent(
                                "bitrix:main.include",
                                "",
                                Array(
                                    "AREA_FILE_SHOW" => "file",
                                    "AREA_FILE_SUFFIX" => "inc",
                                    "EDIT_TEMPLATE" => "",
                                    "PATH" => "/include/footer_phone.php"
                                )
                            );?>
                        </p>
                        
                        <p class="contact-info">
                            <span>Мы в соцсетях</span>
                            <?$APPLICATION->IncludeComponent(
                                "bitrix:main.include",
                                "",
                                Array(
                                    "AREA_FILE_SHOW" => "file",
                                    "AREA_FILE_SUFFIX" => "inc",
                                    "EDIT_TEMPLATE" => "",
                                    "PATH" => "/include/footer_social.php"
                                )
                            );?>
                        </p>

                        <a href="#" class="btn btn-small btn-square hover-theme mb-30" data-toggle="modal" data-target="#callback"><i class="fa fa-phone" aria-hidden="true"></i> Обратный звонок</a>

                        
                    </div>
                </div><!-- Footer Widget End -->
                
                <!-- Footer Widget Start -->
                <div class="col-lg-3 col-md-6 col-12 mb-40 hidden-xs d-none d-sm-block">
                    <div class="footer-widget">
                       
                        <h4 class="widget-title">О КОМПАНИИ</h4>
                        
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:menu",
                            "bottom_about",
                            Array(
                                "ALLOW_MULTI_SELECT" => "N",
                                "CHILD_MENU_TYPE" => "left",
                                "DELAY" => "N",
                                "MAX_LEVEL" => "1",
                                "MENU_CACHE_GET_VARS" => array(0=>"",),
                                "MENU_CACHE_TIME" => "3600000",
                                "MENU_CACHE_TYPE" => "A",
                                "MENU_CACHE_USE_GROUPS" => "Y",
                                "CACHE_SELECTED_ITEMS" => "N",
                                "ROOT_MENU_TYPE" => "bottom",
                                "USE_EXT" => "Y"
                            )
                        );?>
                        
                    </div>
                </div><!-- Footer Widget End -->
                
                <!-- Footer Widget Start -->
                <div class="col-lg-3 col-md-6 col-12 mb-40 hidden-xs d-none d-sm-block">
                    <div class="footer-widget">
                       
                        <h4 class="widget-title">КАТАЛОГ</h4>
                        
                        <ul class="link-widget">
                            <li><a href="/category/">Оборудование</a></li>
                            <li><a href="/category/liniya_razdachi_1/">Линия раздачи</a></li>
							<li><a href="/category/posuda/">Посуда</a></li>
							<li><a href="/category/professionalnaya_khimiya/">Проф химия</a></li>
							<li><a href="/category/zapchasti/">Запчасти</a></li>
							<li><a href="/category/tovary_so_skidkoy/">Товары со скидкой</a></li>
							<li><a href="/actions/">Акции</a></li> 
                        </ul>
                        
                    </div>
                </div><!-- Footer Widget End -->
                
                <!-- Footer Widget Start -->
                <div class="col-lg-3 col-md-6 col-12 mb-40">
                    <div class="footer-widget">
                       
                        <h4 class="widget-title">Комплексное оснащение</h4>
                        
                        <ul class="link-widget">                     
                            <?$APPLICATION->IncludeComponent(
                                "bitrix:main.include",
                                ".default",
                                Array(
                                    "AREA_FILE_SHOW" => "file",
                                    "COMPONENT_TEMPLATE" => ".default",
                                    "EDIT_TEMPLATE" => "",
                                    "PATH" => "/include/footer_complex.php"
                                )
                            );?>
                             <a href="#" class="btn btn-small btn-square hover-theme mb-30" data-toggle="modal" data-target="#zayavka">Заявка на комплексное оснащение</a>
                        </ul>
                        
                    </div>
                </div><!-- Footer Widget End -->
                
            </div>
            
        </div>
    </div><!-- Footer Bottom Section Start -->
   
    <!-- Footer Bottom Section Start -->
    <div class="footer-bottom-section section">
        <div class="container">
            <div class="row">
                
                <!-- Footer Copyright -->
                <div class="col-lg-9 col-12">
                    <div class="footer-copyright"><p>Материал, размещённый на сайте, носит исключительно справочный и ознакомительный характер и не является публичной офертой, определяемой положениями Статьи 437 ГК РФ.</p><p>Подробности уточняйте у менеджеров компании.</p><p>&copy; 2014-2020 ООО «Яр-Фуд Сервис». г. Красноярск. Все права защищены.<br/> Профессиональные решения для общественного питания, торговли и прачечных.</p></div>
                </div>

                <!-- Footer Copyright -->
                <div class="col-lg-3 col-12">
					<div class="footer-madeby"><p>Разработка: <a href="http://online-media24.ru">Онлайн Медиа</a></p></div>
                </div>
         
                
            </div>
        </div>
    </div><!-- Footer Bottom Section Start -->
    
</div><!-- Footer Section End -->




<!--Mobile menu-->
<div class="mobile_menu closed">
	<div class="mobile_menu__fixed">
		
<!--
		<div class="mobile_menu__fixed__phone_wrapper">
			<a href="tel:+7 (391) 219-15-00" class="mobile_menu__fixed__phone">+7 (391) 219-15-00</a>
		</div>
		
		<div class="mobile_menu__fixed__btns_wrapper">

			<div class="mobile_menu__fixed__callback">
				<a href="" class="mx_btn btn_orange mobile_menu__fixed__callback__btn" data-toggle="modal" data-target="#callback">Заказать звонок</a>
			</div>
					
		</div>
-->
		

			
			
<!--
			<div class="mobile_menu__fixed__list closed">
				<a href="" class="mobile_menu__fixed__list__back">Назад</a>
			</div>
-->
			
			
			
	</div>
	<div class="mobile_menu_scroll">

			<a href="#mobile_menu__section" role="button" class="mobile_menu__catalog" data-toggle="collapse" data-target="#mobile_menu__section"><icon></icon>Каталог</a>
			<div class="mobile_menu__section collapse" id="mobile_menu__section">
				<?$APPLICATION->IncludeComponent("bitrix:menu", "mx_vertical_multilevel_mobile", Array(
						"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
							"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
							"DELAY" => "N",	// Откладывать выполнение шаблона меню
							"MAX_LEVEL" => "3",	// Уровень вложенности меню
							"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
							"MENU_CACHE_TIME" => "360000",	// Время кеширования (сек.)
							"MENU_CACHE_TYPE" => "A",	// Тип кеширования
							"MENU_CACHE_USE_GROUPS" => "N",	// Учитывать права доступа
							"ROOT_MENU_TYPE" => "catalog",	// Тип меню для первого уровня
							"USE_EXT" => "Y",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
							"COMPONENT_TEMPLATE" => "",
							"MENU_THEME" => "site",
							"COMPOSITE_FRAME_MODE" => "A",
							"COMPOSITE_FRAME_TYPE" => "AUTO"
						),
						false
					);?>
			</div>
			<div class="mobile_menu__menu">
				
				<?$APPLICATION->IncludeComponent(
                    "bitrix:menu",
                    "top_mobile",
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
                        "ROOT_MENU_TYPE" => "top_mobile",
                        "USE_EXT" => "Y"
                    )
                );?>

				
				<?/*
$APPLICATION->IncludeComponent("bitrix:menu", "mx_top_menu_mobile", Array(
					"COMPONENT_TEMPLATE" => ".default",
						"ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
						"MENU_CACHE_TYPE" => "N",	// Тип кеширования
						"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
						"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
						"MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
							0 => "",
						),
						"MAX_LEVEL" => "1",	// Уровень вложенности меню
						"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
						"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
						"DELAY" => "N",	// Откладывать выполнение шаблона меню
						"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
					),
					false
				);
*/?>
			</div>

	</div>
</div>
<!--конец Mobile menu-->




<!-- Modal callback -->
<div class="modal fade" id="callback" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Обратный звонок</h4>
      </div>
      <div class="modal-body">
       <form class="form_check form_style form-horizontal callback_form">
	       
				<p class="rline">
			    <label>Имя</label>
			    <input type="text" class="" name="name" placeholder="Имя"/>
			  </p>
        <p class="rline">
			    <label for="user_phone">Контактный телефон *</label>
			    <input type="text" class="rfield phonefield" name="phone" placeholder="Контактный телефон *"/>
			  </p>
	      <p class="rline rcheck">
			    <input type="checkbox" class="rfield" id="check_callback" checked=""/>
			    <label for="check_callback" > Согласен с <a href="#">политикой конфиденциальности</a></label>
			  </p>
	
		    <input type="hidden" name="phrase" value="">
		    <input type="hidden" name="subject" value="Обратный звонок">
	    
	      <button type="submit" class="btn btn-small btn-square hover-theme mb-30 btnsubmit">Перезвонить</button>
 
        </form>
      </div>
    </div>
  </div>
</div>






<!-- Modal Заявка на комплексное оснащение -->
<div class="modal fade" id="zayavka" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Заявка на комплексное оснащение</h4>
      </div>
      <div class="modal-body">
       <form class="form_check form_style form-horizontal zayavka_form">
	       
				<p class="rline">
			    <label>Имя</label>
			    <input type="text" class="" name="name" placeholder="Имя"/>
			  </p>
        <p class="rline">
			    <label for="user_phone">Контактный телефон *</label>
			    <input type="text" class="rfield phonefield" name="phone" placeholder="Контактный телефон *"/>
			  </p>
	      <p class="rline rcheck">
			    <input type="checkbox" class="rfield" id="check_zayavka" checked=""/>
			    <label for="check_zayavka" > Согласен с <a href="#">политикой конфиденциальности</a></label>
			  </p>
	
		    <input type="hidden" name="phrase" value="">
		    <input type="hidden" name="subject" value="Заявка на комплексное оснащение">
	    
	      <button type="submit" class="btn btn-small btn-square hover-theme mb-30 btnsubmit">Перезвонить</button>
 
        </form>
      </div>
    </div>
  </div>
</div>






<!-- Success -->
<div class="modal fade" id="success" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Спасибо!</h4>
      </div>
      <div class="modal-body">
        <p>Ожидайте звонок нашего специалиста.</p>
      </div>
    </div>
  </div>
</div>



<!-- JS
============================================ -->

<!-- jQuery JS -->
<script src="<?=SITE_TEMPLATE_PATH?>/assets/js/vendor/jquery-1.12.4.min.js"></script>

<script>
    $(window).load(function() {

        // Preloader
        $('.loader').fadeOut();
        $('.loader-mask').delay(200).fadeOut('slow');

    });
</script>

<!-- Popper JS -->
<script src="<?=SITE_TEMPLATE_PATH?>/assets/js/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="<?=SITE_TEMPLATE_PATH?>/assets/js/bootstrap.min.js"></script>
<!-- Plugins JS -->
<script src="<?=SITE_TEMPLATE_PATH?>/assets/js/plugins.js"></script>
<!-- Ajax Mail -->
<!-- <script src="<?//=SITE_TEMPLATE_PATH?>/assets/js/ajax-mail.js"></script> -->
<!-- Main JS -->
<script src="<?=SITE_TEMPLATE_PATH?>/assets/js/main.js"></script>




</body>

</html>