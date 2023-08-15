<?
$arResult = array();
$arFiles = glob($_SERVER['DOCUMENT_ROOT'].LS_CROSS_CROSS_PATH.'*.json');
foreach($arFiles as $cross)
{
	$crossData = file_get_contents($cross);
	if(!empty($crossData))
	{
		$json_data = json_decode($crossData, true);
		if(!empty($json_data))
		{
			$arResult[] = $json_data;
		}
	}
}
$res = array('list'=>$arResult);
echo json_encode($res);
?>