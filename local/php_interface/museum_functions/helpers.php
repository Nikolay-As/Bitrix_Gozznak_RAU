<?
/**
 * Contain helper functions for some custom things
 *
 */

use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

class MuseumHelpers
{	
	public static function getTooltipContent($tipID)
	{
		$path = $_SERVER["DOCUMENT_ROOT"]."/include_areas/tooltips/";
		if(strlen($tipID) == 0 || !preg_match('/^[a-zA-Z0-9-_]*$/', $tipID))
			return "";

		if(file_exists($path.$tipID.".php"))
		{
			return htmlspecialchars(file_get_contents($path.$tipID.".php"));
		}
	}
}