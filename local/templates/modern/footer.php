<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
			IncludeTemplateLangFile(__FILE__);
			global $APPLICATION;
			$dir = $APPLICATION->GetCurPage();
		?>
		<? if($dir == SITE_DIR): // index page ?>
		<? else: // inner page ?>
		</div>
	</div>
	<? endif; ?>
<?php $copyrightDate = date('Y');?>
	<footer class="noise">
		<div class="container">
			<div class="is-row is-col-stack-24 is-stack-100">
				<div class="is-col is-25">
					<a href="<?= LANGUAGE_ID === 'ru' ? '/' : '/en/'; ?>">
						<svg class="svg-icon svg-icon--logo-footer">
							<use xlink:href="#logo-01"></use>
			  			</svg>
					</a>
				</div>
				<div class="is-col is-25">
					<h4><?= LANGUAGE_ID === 'ru' ? 'Контакты' : 'Contacts'; ?></h4>
			  		<div class="is-stack-20"><?= LANGUAGE_ID === 'ru' ? '197046, Петропавловская крепость, дом 3, литера Ш, Санкт-Петербург, Россия' : '197046, Peter and Paul Fortress, 3 letter "Ш", Saint Petersburg, Russia'; ?></div>
					<a href="<?= LANGUAGE_ID === 'ru' ? '/info/route/' : '/en/info/route/'; ?>"><?= LANGUAGE_ID === 'ru' ? 'На карте &rarr;' : 'On the map &rarr;'; ?></a>
				</div>
				<div class="is-col is-25">
					<h4>+7 (812) 324-14-68<br />+7 (921) 415-25-34</h4>
					<h4><a href="mailto:museum@goznak.ru">museum@goznak.ru</a></h4>
					<a href="<?= LANGUAGE_ID === 'ru' ? '/about/contacts/' : '/en/about/contacts/'; ?>" class="button is-secondary"><?= LANGUAGE_ID === 'ru' ? 'Обратная связь' : 'Contacts'; ?></a>
				</div>
				<div class="is-col is-25">
					<h4><?= LANGUAGE_ID === 'ru' ? 'Мы в соцсетях' : 'Social Media'; ?></h4>
				<div>
					<a href="https://vk.com/museum_goznak" target="_blank">
						<svg class="svg-icon svg-icon--social">
							<use xlink:href="#social-01"></use>
						</svg>
					</a>
					&nbsp;
					<a href="https://ok.ru/museum.goznak/" target="_blank">
						<svg class="svg-icon svg-icon--social">
							<use xlink:href="#social-04"></use>
						</svg>
					</a>
					&nbsp;
					<a href="https://www.youtube.com/channel/UCyIAS1yapUZQ7_qIlS4aStQ/" target="_blank">
					<svg class="svg-icon svg-icon--social"
						xmlns:dc="http://purl.org/dc/elements/1.1/"
						xmlns:cc="http://creativecommons.org/ns#"
						xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
						xmlns:svg="http://www.w3.org/2000/svg"
						xmlns="http://www.w3.org/2000/svg"
						xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
						xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
						viewBox="0 0 86.51 87.5"
						id="social-04"
						version="1.1"
						sodipodi:docname="untitled.svg"
						inkscape:version="0.92.4 (5da689c313, 2019-01-14)">
						<metadata id="metadata13">
							<rdf:RDF>
								<cc:Work rdf:about="">
									<dc:format>image/svg+xml</dc:format>
									<dc:type rdf:resource="http://purl.org/dc/dcmitype/StillImage" />
								</cc:Work>
							</rdf:RDF>
						</metadata>
						<defs id="defs11" />
						<sodipodi:namedview
							pagecolor="#ffffff"
							bordercolor="#666666"
							borderopacity="1"
							objecttolerance="10"
							gridtolerance="10"
							guidetolerance="10"
							inkscape:pageopacity="0"
							inkscape:pageshadow="2"
							inkscape:window-width="3840"
							inkscape:window-height="2066"
							id="namedview9"
							showgrid="false"
							inkscape:zoom="15.257344"
							inkscape:cx="62.873885"
							inkscape:cy="51.199777"
							inkscape:window-x="-11"
							inkscape:window-y="-11"
							inkscape:window-maximized="1"
						inkscape:current-layer="social-04" />
						<path d="M22.33 13.22H69v65H22.33z" id="path2" fill="#827148" />
						<path d="M 60.92,4.08 H 25.59 C 13.327661,4.0855211 3.3899988,14.02766 3.39,26.29 v 34.92 c -1.2e-6,12.26234 9.937661,22.204479 22.2,22.21 h 35.33 c 12.266244,0 22.21,-9.943756 22.21,-22.21 V 26.29 C 83.13,14.023756 73.186244,4.08 60.92,4.08 Z M 30.678065,17.754078 64.255428,42.57289 30.324442,67.453503 Z"
							id="path6"
							inkscape:connector-curvature="0"
							style="fill:#f6e9c3"
						sodipodi:nodetypes="scsscsssscccc" />
					</svg>
				</a>
				&nbsp;
				<a style="margin-left: 0px" href=" https://t.me/museum_goznak/" target="_blank">
					<img src="/images/icons/ico_Telegram.svg" alt="Telegram" width="36" height="36">
				</a>
				&nbsp;
				<a style="margin-left: 0px" href=" https://rutube.ru/channel/23832108/" target="_blank">
					<img src="/images/icons/ico_Rutube.svg" alt="Rutube" width="36" height="36">
				</a>
			</div>
		</div>
	</div>
	<?
	// Меню - http://dev.1c-bitrix.ru/user_help/settings/settings/components_2/navigation/menu.php
		$APPLICATION->IncludeComponent(
			"bitrix:menu",
			"footer_menu",
			array(
				"ROOT_MENU_TYPE" => "top",
				"MENU_CACHE_TYPE" => "A",
				"MENU_CACHE_TIME" => "2000",
				"MENU_CACHE_USE_GROUPS" => "Y",
				"MENU_CACHE_GET_VARS" => array(),
				"MAX_LEVEL" => "2",
				"CHILD_MENU_TYPE" => "left",
				"USE_EXT" => "N",
				"DELAY" => "N",
				"ALLOW_MULTI_SELECT" => "N",
				"COMPONENT_TEMPLATE" => "footer_menu"
			),
			false
		);
	?>
	<div class="is-container-row is-items-middle">
		<div>
			<a href="https://goznak.ru/" target="_blank">
				<svg xmlns="http://www.w3.org/2000/svg" width="120" viewBox="0 0 446.72 146">
					<defs>
						<clipPath id="a">
							<path fill="none" d="M5.43 4.46H441.3v137.08H5.43z"/>
						</clipPath>
					</defs>
					<g clip-path="url(#a)" fill="#f9efd4">
						<path d="M121.11 97.21c-.23 3.95-1.19 10.64-5.08 16.42a27.75 27.75 0 0 1-9.62 8.68 53 53 0 0 1-10 4.23c-3.88 1.24-7.84 2.21-11.78 3.26a89.11 89.11 0 0 0-9.84 3.05 29.14 29.14 0 0 0-6.8 3.64 16.5 16.5 0 0 0-4.57 5.05h-.15a4.33 4.33 0 0 0-.23-.48 17.86 17.86 0 0 0-6-5.74 38.76 38.76 0 0 0-8.14-3.56c-3.59-1.18-7.28-2.08-10.94-3a110.06 110.06 0 0 1-11.33-3.48 40 40 0 0 1-9.67-5.12 26.3 26.3 0 0 1-9.29-12.56 35.33 35.33 0 0 1-1.9-7.67c-.12-1.06-.21-1.65-.31-3.66V4.46h115.65v92.75zm-57.78 38.25a.35.35 0 0 0 .11-.05l.29-.34a18.59 18.59 0 0 1 2.76-2.77 29.28 29.28 0 0 1 7.66-4.3 92.5 92.5 0 0 1 10.5-3.26c3.7-1 7.41-1.89 11.05-3a52.41 52.41 0 0 0 10.1-4.23 26 26 0 0 0 10.85-11.18 32.25 32.25 0 0 0 3.13-12.22c.16-2.4.11-4.81.11-7.22V5.7H6.64V89a58.63 58.63 0 0 0 .41 6.56 35.19 35.19 0 0 0 1.54 7.17A25.21 25.21 0 0 0 18 115.6a39.33 39.33 0 0 0 9 4.72 105.49 105.49 0 0 0 10.5 3.25c3.47.93 6.95 1.84 10.4 2.84a43.44 43.44 0 0 1 8.44 3.34 20.82 20.82 0 0 1 6.86 5.56 1.19 1.19 0 0 0 .15.15"/>
						<path d="M105.83 79.8a51.28 51.28 0 0 1-7.78 20.13h2.44s-8.63 9.85-14.32 9.35c-.75-.07 12-10.45 16-32.12 1.88-10.12-.44-20.93-.44-20.93 2.27 1.77 5.84 12.56 4.1 23.57M93.24 50.24A104.71 104.71 0 0 1 93.86 66C93.27 81.8 89.05 91.13 82 99.44c-1.83 2.14-17.51 16.4-17.51 16.4 13.35.29 25.71-14.05 25.71-14.05h-3.28c.06-.18 7.88-8 10.81-23.3 2.48-13-2.14-24.7-2.14-24.7zM77.4 101.68H72S88.37 90.49 88.37 66.4a127.71 127.71 0 0 0-2-22.66l-4.25-7.08v-.07 4.8c0 4.8-1.94 11.26-5.08 14.41a17.31 17.31 0 0 1-12.27 5.09c7.09 2.39 14.65-1.16 18.64-7.51 1.06 8.35 1.56 17.72-1.48 25.91a50.26 50.26 0 0 1-10.31 16.34v-6.36l-4.36-3s.1 6.45-.18 6.31a12 12 0 0 1-3-2.19 25 25 0 0 1-4-5s.12 7.21-.13 7a13.06 13.06 0 0 1-5.5-7.73l-.07 5a16.28 16.28 0 0 1-3.25-2.34 12.25 12.25 0 0 1-2.45-3.87L37 85.78l-1.48 4.63 2.18-2 8.4-1.58a25.17 25.17 0 0 0 2.62 3.38 28.57 28.57 0 0 0 4.39 3.56v-1.45c2.93 3.5 3.73 4.18 5.14 5.13a44.42 44.42 0 0 0 5.34 3.08s.07-5.82.1-5.78a16.67 16.67 0 0 0 4.51 4.32 74.93 74.93 0 0 1-12.54 9.41c-.21.14-7.7 4.57-7.27 4.69 13.74 3.92 29-11.48 29-11.48m27.82-7.89c2.31-8.35 8.1-20.17 1.15-39.69 2.92 3.13 4.72 8.26 5.52 12.95 0-1.37-.1-2.77-.25-4.18C109.79 45.13 100 31.85 89.59 25c-6.37-4.19-11.61-5.47-13-3.32-1.15 1.81.27 8 .36 9.78.18 3.82 1 11.51-2.53 14.48-4.57 3.84-17.59-6.48-17.59-6.48s1.92.57 3.92-2.94c.15-.26.28-.52.4-.77 1.14-4 1.41-7.87-1-15.82a25 25 0 0 1 3.57-1.35c-7.49.17-14.12 0-14.27 0 0 3.6-4.07 3.26-4.07 1.39-3.92-.07-6-.36-5.69 5 0 0 2.61-.47 3.53-.53 6.65-.39 7.73 5.73 7.19 9.79s-2.67 3.16-4.94 10.23c-2 8.9 1.6 13.58 6.12 20.36-3.88-2-4.23-2.27-6.94-5 1.41 6.58 5.63 14.3 6.68 16.15 6.81-1.73 8.44-3.54 8.44-4.27v4.63c-1 1.61-5.63 2.35-13.33 4-10.78 1.9-10.4 2-12.07 1a7.09 7.09 0 0 1-2-2.74c-.28 0-5.53.57-6.75.79a1.83 1.83 0 0 0-1.17 2.12c.27 1.43 1.07 1.89 2.67 1.74v.44a2 2 0 0 0-1.82 2.17 2.5 2.5 0 0 0 2.38 2 .55.55 0 0 1 0 .27 2.32 2.32 0 0 0-1.43 2.7c.43 2 2.52 1.71 3.08 1.61l4.77-.54 1.41 11.32-4.93.54L29.51 94a9.73 9.73 0 0 1-1.85.16c-.74 0-3.69-.09-4.15-2.53a2.8 2.8 0 0 1 .78-2.9 2.6 2.6 0 0 1-2-2.07 2.87 2.87 0 0 1 1.14-2.79 2.71 2.71 0 0 1-1.65-2.26 3.17 3.17 0 0 1 .93-3.1 4.17 4.17 0 0 1 1.29-.89h.11l-9.15.94a15.81 15.81 0 0 1 13.27-9.34c10.29-.76 14.63 6.48 14.63 6.48l-8.66.89a4.47 4.47 0 0 0 1.32 1.77c1.51.8 7.91-.76 10.21-1.17h.18c-1-2.17-5.21-11.46-6.7-20.19-3.2.12-9.14.21-9.61-.65-1.15-2.1-.7-2.24-1.21-4.15s-3.86-2.8-5.32-.95c-1.8 2.29-1.11 5.23 2.78 5.91-.14 0 0 0 0-.88h1.36c-.06 1.51.21 2.18.94 2.8-3.27.47-5.48-.73-6.55-2.52a6.45 6.45 0 0 1-2.25-.09 2.19 2.19 0 0 0-.69 1.87 2 2 0 0 0 2.26 2c1.49 0 2.28-1.76 2.29-1.76l-.06 3.26 16.44-.05a18 18 0 0 1-7.59 6.3 17.31 17.31 0 0 1-6.86 1.13 14.47 14.47 0 0 1-9.7-3.58 19.16 19.16 0 0 1-3.15-3.89h7.35a4.23 4.23 0 0 1-2.36-2.2 3 3 0 0 1 .57-3.7 4.52 4.52 0 0 1-1-.76 4.64 4.64 0 0 1-1.08-1.7 5.1 5.1 0 0 1 0-3.53 4.28 4.28 0 0 1 3.47-2.8 5.84 5.84 0 0 1 4 .89V37.74h4.78l.11 9.76a3.19 3.19 0 0 1 2.69 1.63 8 8 0 0 1 .65 3 1.88 1.88 0 0 0 1.64 2h5.75a24.59 24.59 0 0 1 0-5.63 18.44 18.44 0 0 1 2.91-8l.06-.08a12.9 12.9 0 0 1 1-1.28c.92-1.13 2-2.45 2.06-2.49 1.77-2.21 2.58-3.86 2.37-6.75-.31-4.3-8.88-4.59-10-2.06a8.31 8.31 0 0 1-.89-3.93 5.3 5.3 0 0 1 .89-2.94c1.3-2.22 4.52-2.25 7-2.63-.08-6 16.58-3.54 22.32.52-.64.29-3.13 1.79-3.13 1.79 1.57 3.3 3 14.83 3.33 21.57 5.26 2.64 4.79-4.51 3.9-13.51-.44-4.43.74-7.26 2.65-9.21s4.49-2 6.47-1.88c8.58.58 33.76 14.71 34.73 45 .41 12.69-5.64 29.44-9.29 31.21m-82.7-44.19c-.71-.64-4.54-.48-4.61 2.18a2.6 2.6 0 0 0 1.36 2.69 4.42 4.42 0 0 0 1.56.37h.06a5.78 5.78 0 0 1 1.62-5.25"/>
					</g>
					<g clip-path="url(#a)">
						<text transform="translate(148.72 42.23)" font-size="14.907" fill="#f9efd4" font-family="MetaPro">
							<tspan letter-spacing="5">АКЦИОНЕРНОЕ ОБЩЕСТВО</tspan>
						</text>
						<path d="M177.94 58a15 15 0 0 0 2.67-.22V67c-2-2.67-4.83-3-10.61-3-3.41 0-7.79.22-10.17.3v38.3c0 2.23.15 5.12 3.78 7.42h-14.77c3.41-2.37 3.41-5.49 3.41-7.42V65.45c0-1.93 0-5-3.41-7.42h29.09zM235.83 84c0 13.88-9.8 27.09-28.5 27.09-19.45 0-28.5-14-28.5-27.09 0-13.88 9.79-27.1 28.5-27.1 19.45 0 28.5 14 28.5 27.1m-48.46-1.19c0 12.92 8.08 22.19 19.81 22.19 9.57 0 20.12-6.16 20.12-19.82 0-12.91-8.09-22.19-19.82-22.19-9.58 0-20.11 6.16-20.11 19.82M241.39 58.1c8.46-.44 6.9-1.19 14.4-1.19 3.57 0 18.33.08 18.33 12.55 0 8.32-7.2 10.69-10 11.28V81c6.24 0 12.54 4.16 12.54 12.85 0 12.83-11.5 17.29-23.23 17.29-5.64 0-9.87-.75-14.62-3.12l-2-10.1c5.94 6.16 11.73 7.12 16.25 7.12 9.21 0 15.07-3.79 15.07-10.54 0-6.39-5-9.95-12.7-9.95-4.45 0-6.3.82-7.35 1.34v-7.75a21.49 21.49 0 0 0 5.42.6c10.24 0 12.1-4.9 12.1-8.24 0-4.75-3.49-7.5-9.73-7.5a31 31 0 0 0-15.59 4.45zM322 78.51V65.45c0-2.45-.08-5-3.42-7.42H333c-3.34 2.38-3.41 5-3.41 7.42v37.12c0 2.45.07 5 3.41 7.42h-14.4c3.34-2.37 3.42-5 3.42-7.42V84.46h-28.6v18.11c0 2.45.07 5 3.42 7.42h-14.4c3.34-2.37 3.42-5 3.42-7.42V65.45c0-2.45-.07-5-3.42-7.42h14.4c-3.34 2.38-3.42 5-3.42 7.42v13.06H322zM367.73 58l17.89 44.31c1.18 2.9 2.67 5.72 6.31 7.65H376c3.49-1.56 2.89-4.09 2.23-5.79l-5.64-14h-20l-4.69 11.73c-1 2.6-1.7 5.64 1.79 8.09h-14c3.86-2.52 5.35-5.86 6.76-9.43L357.26 63c.3-.74 1.34-3.56-1.7-5h12.18zm-13.22 27.27h16.11l-8.09-20.49zM409 58c-3.42 2.38-3.42 5.35-3.42 7.42v37.12c0 2.07 0 5 3.42 7.42h-14.4c3.42-2.37 3.42-5.35 3.42-7.42V65.45c0-2.07 0-5-3.42-7.42H409zm9.65 9.43c2-2.67 3-4.3 3-5.79A4.28 4.28 0 0 0 419 58h14.25l-18 23.38 8.54 11.29c6.75 9 10.54 13.58 17 17.29l-7.95.37c-5.86.3-8.83-4.23-12.54-9.35L407.07 83z" fill="#f9efd4"/>
						<path d="M441.3 166.06v58.81m19.6-78.41h58.81M441.3-15.14v-58.81m19.6 78.41h58.81M5.43-15.14v-58.81M-14.18 4.46H-73m78.43 161.6v58.81m-19.6-78.41H-73" fill="none" stroke="#000" stroke-width="1.089"/>
					</g>
				</svg>
			</a>
		</div>
		<div class="is-push-right">
			<span class="is-small">2016 - <?=$copyrightDate?> <?= LANGUAGE_ID === 'ru' ? ' © AO "Гознак"' : '© GOZNAK'; ?></span>
		</div>
	</div>
	</div>
	</footer>
	<script crossorigin="anonymous" src="https://polyfill.io/v3/polyfill.min.js?features=Element.prototype.classList"></script>
	<script src="/static/js/1.2e3f6761.chunk.js"></script>
	<script src="/static/js/app.78357e53.js"></script>
</body>
</html>
