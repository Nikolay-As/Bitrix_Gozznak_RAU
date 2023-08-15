<?

$crossData = $_REQUEST['crossData'];
if(empty($crossData))
{
	echo json_encode(array('error' => 'Y'));
	die();
}
$crossData = json_decode($crossData, true);

if(!empty($crossData['name']))
{
	if(empty($crossData['file']))
	{
		$arParams = array("replace_space"=>"-","replace_other"=>"-");
		$trans = Cutil::translit($crossData['name'],"ru",$arParams);
		$crossData['file'] = $trans;
	}
	else
	{
		$trans = $crossData['file'];
	}

	$data = json_encode($crossData);

	file_put_contents($_SERVER['DOCUMENT_ROOT'].LS_CROSS_CROSS_PATH.$trans.'.json', $data);
	echo json_encode(array('success'=>'Y', 'file'=>$_SERVER['DOCUMENT_ROOT'].LS_CROSS_CROSS_PATH.$trans.'.json'));
}
else 
	echo json_encode(array('error' => 'Y'));
?>