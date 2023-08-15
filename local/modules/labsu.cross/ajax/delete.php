<?
if(empty($_REQUEST['file']))
{
	echo json_encode(array('error'=>'Y'));
	die();
}
if(file_exists($_SERVER['DOCUMENT_ROOT'].LS_CROSS_CROSS_PATH.$_REQUEST['file'].'.json'))
{
	unlink($_SERVER['DOCUMENT_ROOT'].LS_CROSS_CROSS_PATH.$_REQUEST['file'].'.json');
}
echo json_encode(array('success'=>'Y'));
?>