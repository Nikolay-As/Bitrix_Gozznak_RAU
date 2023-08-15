<?
define("LS_CROSS_MODULE_ID", 'labsu.cross');

define("LS_CROSS_CROSS_PATH", '/local/modules/labsu.cross/cross/');
define("LS_CROSS_UPLOAD_PATH", '/upload/cross/');

IncludeModuleLangFile(__FILE__);

CModule::AddAutoloadClasses(
	LS_CROSS_MODULE_ID,
	array(
		"LSCross" => "lib/lscross.php"
	)
);
?>