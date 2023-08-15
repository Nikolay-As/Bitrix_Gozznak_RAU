<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Голосование");
?><p>
	 &nbsp; В 2021 году в серии «Редкости Музея истории денег» выйдут четыре новых жетона. &nbsp;Для определения трёх монет, которые будут изображены на этих жетонах, проводится онлайн-голосование (четвёртую монету определят сотрудники музея).
</p>
<p>
	 &nbsp; На этой странице представлены десять монет-претендентов, из которых вы можете выбрать ТРИ.
</p>
<p>
	 &nbsp;&nbsp;Голосование продлится до 1 февраля (включительно).&nbsp;
</p>
<?$APPLICATION->IncludeComponent(
	"bitrix:voting.form",
	"",
	Array(
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"VOTE_ID" => "3",
		"VOTE_RESULT_TEMPLATE" => "voting_result.php?VOTE_ID=#VOTE_ID#"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>