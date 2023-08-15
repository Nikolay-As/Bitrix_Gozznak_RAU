<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Результаты голосования");
$getVoteID = $request->getQuery("VOTE_ID");
?>
<?$APPLICATION->IncludeComponent(
    "bitrix:voting.result",
    "",
    Array(
        "VOTE_ID" => $getVoteID,
        "VOTE_ALL_RESULTS" => "Y",
        "NEED_SORT" => "Y",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "1200",
        "CACHE_NOTES" => "",
        "QUESTION_DIAGRAM_1" => "histogram",
        "QUESTION_DIAGRAM_2" => "histogram"
    )
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>