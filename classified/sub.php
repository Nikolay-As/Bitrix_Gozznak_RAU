<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Фотогалерея");
?>

<?//$APPLICATION->AddHeadScript("/js/jquery.validate.min.js");?>

<script>
/*$(document).ready(function() {
	$('.im-tooltip_on_click').tooltipster({
		theme: 'tooltipster-shadow',
		interactive: true,
		animation: 'grow',
		trigger: 'click',
		hideOnClick: true,
		speed: 150,
		maxWidth: 400,
		contentAsHTML: true
	});
});*/

</script>		
		
<p><a href="javascript:void(0);" onclick="$.dwbox.load('/include_areas/ajax/popup_subscribe_form.php');">Подписаться</a></p>		

<p><a href="javascript:void(0);" onclick="$.dwbox.load('/include_areas/ajax/popup_guestbook_form.php');">ГОстевая книга</a></p>		
		
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>		