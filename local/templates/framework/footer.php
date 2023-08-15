<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
IncludeTemplateLangFile(__FILE__);

global $APPLICATION;
$dir = $APPLICATION->GetCurPage();
?>

<? if($dir != SITE_DIR): // inner page ?>

								<?
								// Include file with component for current LANG
								include($_SERVER["DOCUMENT_ROOT"].SITE_DIR."include_areas/components/files_block.php");?>

							</div>
						</div>
					</div>
				</div>

<? endif; ?>

			</main>

			<footer class="im-common-page_row">
				<div class="im-footer-inner">
					<div class="im-common-wrapper">
						<div class="im-footer-item im-common-fl im-footer-copyright">
						<a href="http://goznak.ru/" target="_blank"></a>
						<?$APPLICATION->IncludeFile(SITE_DIR."include_areas/framework/copyright.php", Array(), Array("MODE" => "html"));?></div>
						<a href="<?=SITE_DIR;?>info/route/" class="im-footer-item im-common-fr"><?=GetMessage("FRAMEWORK_ADDRESS");?></a>
						<a href="<?=SITE_DIR;?>sitemap/" class="im-footer-item im-footer-sitemap_link">
							<img src="/images/icons/sitemap.png" alt="" class="im-footer-sitemap_link-img">
							<img src="/images/icons/sitemap_hover.png" alt="" class="im-footer-sitemap_link-img__active">
						</a>
						<div class="im-footer-social im-common-fr im-common-mr10">
							<span class="im-common-clr-ForestGreen">E-mail:&nbsp;</span>
							<a href="mailto:museum@goznak.ru" class="im-common-clr-ForestGreen">museum@goznak.ru&nbsp;</a>
							<span class="im-common-clr-ForestGreen">Телефоны: +7 (812) 324-14-68&nbsp;, +7 (921) 415-25-34&nbsp;&nbsp;&nbsp;</span>
							<a href="https://vk.com/museum_goznak" class="im-footer-item im-common-mr10" target="_blank"><span class="fa fa-vk fa-2x im-common-clr-green"></span></a>
						</div>
					</div>
				</div>
			</footer>
		</div>
		<?
		// Меню - http://dev.1c-bitrix.ru/user_help/settings/settings/components_2/navigation/menu.php
		$APPLICATION->IncludeComponent(
			"bitrix:menu",
			"sidebar_menu",
			array(
				"ROOT_MENU_TYPE" => "top",
				"MENU_CACHE_TYPE" => "A",
				"MENU_CACHE_TIME" => "3600",
				"MENU_CACHE_USE_GROUPS" => "Y",
				"MENU_CACHE_GET_VARS" => array(
				),
				"MAX_LEVEL" => "2",
				"CHILD_MENU_TYPE" => "left",
				"USE_EXT" => "N",
				"DELAY" => "N",
				"ALLOW_MULTI_SELECT" => "N",
				"COMPONENT_TEMPLATE" => "sidebar_menu"
			),
			false
		);
		?>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter48127907 = new Ya.Metrika({
                    id:48127907,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true,
                    trackHash:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/48127907" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
	</body>
</html>