<?php

class LSCross {

	public function __construct()
	{
	}

	static function getList()
	{
		$arResult = array();
		$arFiles = glob($_SERVER['DOCUMENT_ROOT'].LS_CROSS_CROSS_PATH.'*.json');
		foreach($arFiles as $cross)
		{
			$crossData = file_get_contents($cross);
			if(!empty($crossData))
			{
				$json_data = json_decode($crossData, true);
				if(!empty($json_data) && $json_data['active'] == 'Y')
				{
					$arResult[] = $json_data;
				}
			}
		}
		return $arResult;
	}

	static function get($code)
	{
		$arResult = self::getList();
		$res = false;
		foreach($arResult as $cross)
		{
			if($cross['file'] == $code)
			{
				$res = $cross;
				break;
			}
		}
		return $res;
	}

}
