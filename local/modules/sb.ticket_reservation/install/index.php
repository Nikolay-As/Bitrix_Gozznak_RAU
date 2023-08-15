<?
use \Bitrix\Main\Localization\Loc;
use \Bitrix\Main\Config as Conf;
use \Bitrix\Main\Config\Option;
use \Bitrix\Main\Loader;
use \Bitrix\Main\Entity\Base;
use \Bitrix\Main\Application;
use \Bitrix\Main\ModuleManager;
use Bitrix\Highloadblock\HighloadBlockTable as HL;

Loc::loadMessages(__FILE__);
Class sb_ticket_reservation extends CModule
{
	public $MODULE_ID = 'sb.ticket_reservation';
	public $MODULE_VERSION;
	public $MODULE_VERSION_DATE;
	public $MODULE_NAME;
	public $MODULE_DESCRIPTION;

	function __construct()
	{
        $arModuleVersion = array();
        include(dirname(__FILE__).'/version.php');
        $this->MODULE_VERSION = $arModuleVersion['VERSION'];
        $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];
        $this->MODULE_NAME = Loc::getMessage('sb.ticket_reservation_MODULE_NAME');
        $this->MODULE_DESCRIPTION = Loc::getMessage('sb.ticket_reservation_MODULE_DESC');
        $this->PARTNER_NAME = Loc::getMessage('sb.ticket_reservation_PARTNER_NAME');
        $this->PARTNER_URI = Loc::getMessage('sb.ticket_reservation_PARTNER_URI');
	}

	function InstallDB($arParams = array())
	{
        return true;
	}

	function UnInstallDB($arParams = array())
	{
		return true;
	}

	function InstallEvents()
	{
		return true;
	}

	function UnInstallEvents()
	{
		return true;
	}

	function InstallFiles($arParams = array())
	{
		return true;
	}

	function UnInstallFiles()
	{
		return true;
	}

	function DoInstall()
	{
		global $APPLICATION;
		$this->InstallFiles();
		$this->InstallEvents();
		$this->InstallDB();
        ModuleManager::registerModule($this->MODULE_ID);
        return true;
	}

	function DoUninstall()
	{
		global $APPLICATION;
        $this->UnInstallFiles();
		$this->UnInstallEvents();
		$this->UnInstallDB();
        ModuleManager::unRegisterModule($this->MODULE_ID);

        Option::delete($this->MODULE_ID);
        return true;
	}
}