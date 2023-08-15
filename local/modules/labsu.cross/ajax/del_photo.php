<?

require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_before.php");

$files = $_REQUEST['files'];
if(empty($files))
{
	die();
}
$files = explode(';', $files);

foreach($files as $f)
{
	if(file_exists($_SERVER['DOCUMENT_ROOT'].'/upload/cross/'.$f))
	{
		unlink($_SERVER['DOCUMENT_ROOT'].'/upload/cross/'.$f);
	}
}
echo "Y";
?>