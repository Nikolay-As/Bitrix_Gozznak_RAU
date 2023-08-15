<?
IncludeModuleLangFile(__FILE__);

class labsu_cross extends CModule
{
	var $MODULE_ID = "labsu.cross";
	var $MODULE_VERSION;
	var $MODULE_VERSION_DATE;
	var $MODULE_NAME;
	var $MODULE_DESCRIPTION;
	var $MODULE_CSS;

	function labsu_cross()
	{
		$this->MODULE_NAME = GetMessage("LS_CROSS_MODULE_NAME");
		$this->MODULE_DESCRIPTION = GetMessage("LS_CROSS_MODULE_DESC");
		$this->PARTNER_NAME = "labsu";
		$this->PARTNER_URI = "http://www.lab-su.ru";
		$arModuleVersion = array();
		$path = str_replace("\\", "/", __FILE__);
		$path = substr($path, 0, strlen($path) - strlen("/index.php"));
		include($path."/version.php");
		if (is_array($arModuleVersion) && array_key_exists("VERSION", $arModuleVersion))
		{
			$this->MODULE_VERSION = $arModuleVersion["VERSION"];
			$this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
		}
	}

    function DoInstall()
    {
        RegisterModule("labsu.cross");
   	    $this->InstallFiles();
       	LocalRedirect("/bitrix/admin/ls_cross.php");
    }

    function DoUninstall()
    {
        UnRegisterModule("labsu.cross");
        $this->UnInstallFiles();
        LocalRedirect("/bitrix/admin/partner_modules.php");
    }

	function InstallFiles()
	{
		CopyDirFiles(__DIR__ . "/admin", $_SERVER["DOCUMENT_ROOT"]."/bitrix/admin", true, true);
		return true;
	}

	function UnInstallFiles()
	{
		DeleteDirFiles(__DIR__ . "/admin", $_SERVER["DOCUMENT_ROOT"]."/bitrix/admin");
		return true;
	}

    function get_encoding($str)
    {
        $cp_list = array('UTF-8', 'windows-1251');
        foreach ($cp_list as $k=>$codepage){
            if (md5($str) === md5(iconv($codepage, $codepage, $str))){
                return $codepage;
            }
        }
        return null;
    }

}
?>