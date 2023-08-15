<?
$code = htmlspecialchars($_REQUEST['code']);
$crossFile = $_SERVER['DOCUMENT_ROOT'].'/local/modules/labsu.cross/cross/'.$code.'.json';

if(file_exists($crossFile))
{
	$res = file_get_contents($crossFile);
	echo $res;
}
?>