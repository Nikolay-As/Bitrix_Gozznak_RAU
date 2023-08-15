<?

require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_before.php");

$arFiles = array();
if(!empty($_FILES))
{
	foreach($_FILES as $n=>$file)
	{
		if(is_array($file['tmp_name']))
		{
			foreach($file['tmp_name'] as $i=>$f)
			{
				if(is_uploaded_file($file["tmp_name"][$i]))
				{
					// Если файл загружен успешно, перемещаем его
					// из временной директории в конечную
				
					$dateTime = date('hisjmy');
					$file['name'][$i] = $dateTime."".$file['name'][$i];
				
					$fuleurl = "/upload/cross/".$file['name'][$i];
					if(move_uploaded_file($file["tmp_name"][$i], $_SERVER['DOCUMENT_ROOT']."/upload/cross/".$file['name'][$i]))
					{
						$arFiles[] = $file['name'][$i];
					}
				}
			}
		}
		else
		{
			if(is_uploaded_file($file["tmp_name"]))
			{
				// Если файл загружен успешно, перемещаем его
				// из временной директории в конечную
		
				$dateTime = date('hisjmy');
				$file['name'] = $dateTime."".$file['name'];
			
				$fuleurl = "/upload/cross/".$file['name'];
				if(move_uploaded_file($file["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/upload/cross/".$file['name']))
				{
					$arFiles[] = $file['name'];
				}
			}
		}
	}
}
echo json_encode(array('list' => $arFiles));
?>