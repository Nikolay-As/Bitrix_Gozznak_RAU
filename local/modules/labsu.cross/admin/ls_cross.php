<?
if($_REQUEST["ajax"] === "Y")
{
	require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_before.php");
}
else
{
	require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin.php");
}
require_once($_SERVER["DOCUMENT_ROOT"]."/local/modules/labsu.cross/include.php"); // инициализация модуля
require_once($_SERVER["DOCUMENT_ROOT"]."/local/modules/labsu.cross/prolog.php"); // пролог модуля

IncludeModuleLangFile(__FILE__);

ClearVars();
CJSCore::Init(array("jquery"));

if(!$USER->isAdmin())
{
	ShowError(GetMessage("LS_CROSS_RULE_ERROR"));

	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php");
	die();
}

if($_REQUEST["ajax"] === "Y")
{
	$arAjax = array("save", "getList", "delete", "load");
	$item = $_REQUEST["action"];
	if(in_array($item, $arAjax))
	{
		if(file_exists($_SERVER["DOCUMENT_ROOT"]."/local/modules/labsu.cross/ajax/".$item.".php"))
		{
			require_once($_SERVER["DOCUMENT_ROOT"]."/local/modules/labsu.cross/ajax/".$item.".php");
		}
	}
	die();
}

?>
<form method="POST" action="<?echo $APPLICATION->GetCurPage()?>" onsubmit='return false;' name="form1" style='width: 100%;'>
<input type="hidden" name="Update" value="Y">
<input type="hidden" name="lang" value="<?echo LANGUAGE_ID ?>">
<?=bitrix_sessid_post();

$aTabs = array(
	array("DIV" => "edit1", "TAB" => GetMessage("LS_CROSS_MENU_SECT"), "ICON" => "catalog", "TITLE" => GetMessage("LS_CROSS_MENU_SECT_TITLE"))
);

$tabControl = new CAdminTabControl("tabControl", $aTabs);
$tabControl->Begin();

$tabControl->BeginNextTab();
?>
	<tr class="adm-detail-required-field" style='width: 100%;'>
		<td width="70%" class="td_cross_block" style='text-align: left;'>
			<h3>Область редактирования кроссворда</h3>
			<div class="cross_block">
				<input type="hidden" name='cross_id' value=''>
				<div class="cross_data">
					<div class="cross_fields">

					</div>
					<div class="cross_btns">
						<div class="cross_info">
							<div class="size">Размеры сетки кроссворда: <span></span></div>
						</div>
						<a class="add_word" href='javascript:void(0);'>Добавить слово</a>
						<div class="cross_words">
							<ul></ul>
						</div>
					</div>
				</div>
				<div class="cross_settings">
					<div class="input_block">
						<input type="checkbox" id='cross_active' name='active' value='Y'><label for="cross_active">Активность</label>
					</div>
					<div class="input_block">
						<input type="text" name='name' placeholder='Введите наименование кроссворда (должно быть уникальным)' value=''>
					</div>
					<div class="input_block">
						<textarea name="text" id="" cols="30" rows="10" placeholder='Введите описание кроссворда'></textarea>
					</div>
					<div class="input_block">
						<input type="text" name='link' placeholder='Введите ссылку для перехода на страницу после окончания решения кроссворда' value=''>
					</div>
					<div class="input_block">
						<input class="adm-btn-save cross_save" type="submit" name="save" value="Сохранить" title="Сохранить" />
					</div>
				</div>
			</div>
		</td>
		<td width="20%" class='td_cross_right' valign="top">
			<h3>Кроссворды</h3>
			<a href="javascript:void(0);" class="add_cross">Добавить</a>
			<div class="cross_list"><ul></ul></div>
		</td>
	</tr>
		<?
$tabControl->EndTab();

$tabControl->Buttons();
?>
<?
$tabControl->End();
?>
</form>

<div class="popupover"></div>
<div class="popup_add_form">
	<form action="" onsubmit='return false;'>
		<input type="text" name='number' value='' placeholder='Номер слова'>
		<input type="text" name='word' value='' placeholder='Введите слово'>
		<textarea name="text" id="" cols="30" rows="10" placeholder="Введите описание без цифры"></textarea>		
		<input type="text" name='position-x' value='' placeholder='Номер колонки для первой буквы'>
		<input type="text" name='position-y' value='' placeholder='Номер строки для первой буквы'>
		<select name="h-or-v">
			<option value="H" selected>Горизонтально</option>
			<option value="V" selected>Вертикально</option>
		</select>
		<button class="adm-btn-save add-word-btn">Сохранить</button>
	</form>
</div>

<div class="popup_add_photo">
	<form action="/local/modules/labsu.cross/admin/ls_cross.php" onsubmit='return false;' enctype="multipart/form-data" id="uploadImages">
		<input type="hidden" name='word_number' value=''>
		<input type="hidden" name='ajax' value='Y'>
		<input type="file" id="addImages" name="file[]" multiple="">
		<ul id="uploadImagesList">
			<li class="item template">
				<span class="img-wrap">
					<img src="" alt="">
				</span>
				<span class="delete-link" title="Удалить">Удалить</span>
			</li>
    	</ul>
		<div class="clear"></div>
		<button type='submit' class="adm-btn-save add-photo-btn">Загрузить</button>
		<div id="progress-bar">
			<div class="progress-bg"></div>
			<div class="progress-val">0%</div>
		</div>
	</form>
</div>

<div class="popupovererror"></div>
<div class="popup_error">
	<h4>Ошибка</h4>
	<p></p>
</div>

<script>
		var currentCross = {}, arCrosswords= [];

		function showErrorPopup(str)
		{
			$('.popup_error p').empty().html(str);
			$('.popupovererror').show();
			$('.popup_error').show();
		}

		function openPhotoPopup(word_number)
		{
			$('.popupover').show();
			$('.popup_add_photo input[name="word_number"]').val(word_number);
			$('#uploadImagesList').hide().empty();
			$('#progress-bar').hide();
			$('.popup_add_photo').show();
		}

		function generateCrossFields(x, y)
		{
			var i = 0, j = 0;
			var t1 = '<table class="top-table"><tr>';
			for(j = 0; j <= x; j++)
			{
				t1 += '<td>'+j+'</td>';
			}
			t1 += '</tr></table>';
			var t2 = '<table class="left-table">';
			for(j = 1; j <= y; j++)
			{
				t2 += '<tr><td>'+j+'</td></tr>';
			}
			t2 += '</table>';
			var html = t1+'<div class="inline-table">'+t2+'<table class="cross-table">';
			for(i = 1; i <= y; i++)
			{
				html += '<tr>';
				for(j = 1; j <= x; j++)
				{
					html += '<td id="cell-'+j+'-'+i+'" align="center" valign="middle" class="empty"></td>';
				}
				html += '</tr>';
			}
			html += '</table></div>';
			$('.cross_fields').empty().html(html);
			$('.cross_info .size span').empty().html(x+'x'+y);
		}

		function clearCrossBlock()
		{
			generateCrossFields(10, 10);
			$('.cross_words ul').empty();
		}

		function clearAddForm()
		{
			$('.popup_add_form input[name="word"]').val('');
			$('.popup_add_form input[name="number"]').val('');
			$('.popup_add_form textarea[name="text"]').val('');
			$('.popup_add_form input[name="position-x"]').val('');
			$('.popup_add_form input[name="position-y"]').val('');
		}

		function getCrossSize()
		{
			var res = [0, 0], word = {};
			if(currentCross.words != undefined && currentCross.words.length > 0)
			{
				for(var i = 0; i < currentCross.words.length; i++)
				{
					word = currentCross.words[i];
					if(word.hORv == 'V')
					{
						if(res[0] < word.positionX)
						{
							res[0] = word.positionX;
						}
						if(res[1] < (word.positionY+word.word.length))
						{
							res[1] = word.positionY+word.word.length;
						}
					}
					else
					{
						if(res[1] < word.positionY)
						{
							res[1] = word.positionY;
						}
						if(res[0] < (word.positionX+word.word.length))
						{
							res[0] = word.positionX+word.word.length;
						}
					}
				}				
			}
			return res;
		}

		function getWordData(id)
		{
			var res = {};
			for(var i = 0; i < currentCross.words.length; i++)
			{
				if(currentCross.words[i].number == id)
				{
					res = currentCross.words[i];
					break;
				}
			}
			return res;
		}

		function deleteWord(id)
		{
			if(confirm('Действительно удалить слово?'))
			{
				var tmp = [];
				for(var i = 0; i < currentCross.words.length; i++)
				{
					if(currentCross.words[i].number != id)
					{
						tmp[tmp.length] = currentCross.words[i];
					}
				}
				currentCross.words = tmp;
				updateCrossBlock();
			}
		}

		function changeWord(id)
		{
			clearAddForm();
			var word = getWordData(id);
			$('.popup_add_form input[name="word"]').val(word.word);
			$('.popup_add_form input[name="number"]').val(word.number);
			$('.popup_add_form textarea[name="text"]').val(word.text);
			$('.popup_add_form input[name="position-x"]').val(word.positionX);
			$('.popup_add_form input[name="position-y"]').val(word.positionY);
			$('.popup_add_form select[name="h-or-v"] option').each(function(){
				if($(this).val() == word.hORv)
				{
					$(this).prop('selected', true);
				}
			});
			$('.popupover').show();
			$('.popup_add_form').show();
		}

		function paintWords()
		{
			if(currentCross.words == undefined)
			{
				return false;
			}
			var word = {}, i = 0, j = 0, x = 0, y = 0, n = 0;
			currentCross.words.sort((prev, next) => prev.number - next.number);
			$('.cross_words ul').empty();
			for(i = 0; i < currentCross.words.length; i++)
			{
				word = currentCross.words[i];
				for(j = 0; j < word.word.length; j++)
				{
					x = (word.hORv == 'H')? word.positionX+j: word.positionX;
					y = (word.hORv == 'H')? word.positionY: word.positionY+j;
					if(j == 0)
					{
						$('#cell-'+x+'-'+y).empty().html('<span>'+word.number+'</span>'+word.word[j]);
					}
					else
					{
						$('#cell-'+x+'-'+y).empty().html(word.word[j]);
					}
					$('#cell-'+x+'-'+y).removeClass('empty').addClass('full').addClass('crossWord-'+word.number);
				}
				var links = '<li class="word-'+word.number+'" data-id="'+word.number+'">'+word.number+'. '+word.text+' ('+word.word+') <div class="word_links">';
				links += '<a href="javascript:void(0);" onclick="changeWord(\''+word.number+'\');" class="word_change">изменить</a>';
				links += ' | <a href="javascript:void(0);" onclick="deleteWord(\''+word.number+'\');" class="word_del">удалить</a>';
				links += ' | <a href="javascript:void(0);" onclick="openPhotoPopup(\''+word.number+'\');" class="word_photo">загрузить фото</a>';
				links += ' | <a href="javascript:void(0);" onclick="deletePhotos(\''+word.number+'\');" class="word_photo_delete">удалить все фото</a>';
				links += '</div><div class="word_photo">';
				if(word.images != undefined)
				{
					for(n = 0; n < word.images.length; n++)
					{
						links += '<div class="img_block"><img src="/upload/cross/'+word.images[n]+'"></div>';
					}
				}
				links += '</div></li>';
				$('.cross_words ul').append(links);
			}

			//события на обработку слов
			$('.cross_words ul li').mouseleave(function(){
				$('.cross_fields table td').removeClass('selected');
			});
			$('.cross_words ul li').mouseenter(function(){
				var id = $(this).attr('data-id');
				$('.cross_fields table td').removeClass('selected');
				$('.crossWord-'+id).addClass('selected');
			});
		}

		function updateCrossBlock()
		{
			clearCrossBlock();
			if(currentCross.words == undefined || currentCross.words.length == 0)
			{
				generateCrossFields(10, 10);
			}
			else if(currentCross.words != undefined && currentCross.words.length > 0)
			{
				var len = getCrossSize(), x = 10, y = 10;
				x = (len[0] < 10)? x: len[0];
				y = (len[1] < 10)? y: len[1];
				generateCrossFields(x, y);
				paintWords();
			}
			if(currentCross.name != undefined)
			{
				$('.cross_settings input[name="name"]').val(currentCross.name);
			}
			if(currentCross.text != undefined)
			{
				$('.cross_settings textarea[name="text"]').val(currentCross.text);
			}
			if(currentCross.link != undefined)
			{
				$('.cross_settings input[name="link"]').val(currentCross.link);
			}
			if(currentCross.active != undefined)
			{
				$('.cross_settings input[name="active"]').prop('checked', (currentCross.active == 'Y')? true: false);
			}
		}

		function isExistWord(word, number)
		{
			var res = false;
			if(currentCross.words != undefined)
			{
				for(var i = 0; i < currentCross.words.length; i++)
				{
					if(currentCross.words[i].word == word || currentCross.words[i].number == number)
					{
						res = true;
						break;
					}
				}
			}
			return res;
		}

		function addWord(number, word, text, positionX, positionY, hORv)
		{
			if(currentCross.words == undefined)
			{
				currentCross.words = [];
			}
			word = word.toLowerCase();
			if(isExistWord(word, number))
			{
				for(var i = 0; i < currentCross.words.length; i++)
				{
					if(currentCross.words[i].word == word || currentCross.words[i].number == number)
					{
						currentCross.words[i] = {
							number: number*1,
							word: word,
							text: text,
							positionX: positionX*1,
							positionY: positionY*1,
							hORv: hORv
						};
						break;
					}
				}
			}
			else
			{
				currentCross.words[currentCross.words.length] = {
					number: number*1,
					word: word,
					text: text,
					positionX: positionX*1,
					positionY: positionY*1,
					hORv: hORv
				};
			}
		}

		function updateCrossData()
		{
			BX.showWait();
			$.ajax({
				url: '/bitrix/admin/ls_cross.php',
				method: 'POST',
                type: 'POST',
				dataType: 'json',
				data: {
					ajax: 'Y',
					action: 'getList'
				},
				success: function(data){
					if(data.list != undefined)
					{
						var t = '', d = {};
						arCrosswords = data.list;
						for(var i = 0; i < data.list.length; i++)
						{
							d = data.list[i];
							t += '<li>'+d.name+' <a href="javascript:void(0);" onclick="changeCrossData(\''+d.file+'\');">Изменить</a> | <a href="javascript:void(0);" onclick="deleteCrossData(\''+d.file+'\');">Удалить</a></li>';
						}
						$('.cross_list ul').empty().html(t);
					}
                    BX.closeWait();
				},
				error: function( jqXHR, textStatus, errorThrown ){
                    BX.closeWait();
                }
			});		
		}

		function getCrosswordData(file)
		{
			if(arCrosswords == undefined || arCrosswords.length < 1)
			{
				return false;
			}
			var res = {};
			for(var i = 0; i < arCrosswords.length; i++)
			{
				if(arCrosswords[i].file == file)
				{
					res = arCrosswords[i];
					break;
				}
			}
			return res;
		}

		function changeCrossData(file)
		{
			var cross = getCrosswordData(file);
			if(!cross)
			{
				return false;
			}

			currentCross = cross;
			updateCrossBlock();
		}

		function deleteCrossData(file)
		{
			if(confirm('Подтвердите удаление кроссворда!'))
			{
				BX.showWait();
				$.ajax({
					url: '/bitrix/admin/ls_cross.php',
					method: 'post',
                    type: 'POST',
					dataType: 'json',
					data: {
						ajax: 'Y',
						action: 'delete',
						file: file
					},
					success: function(data){
    	                BX.closeWait();
						updateCrossData();
					},
					error: function( jqXHR, textStatus, errorThrown ){
    	                BX.closeWait();
	                }
				});		
			}
		}

		function saveCurrentCross()
		{
			var cross = JSON.stringify(currentCross);
			BX.showWait();
			$.ajax({
				url: '/bitrix/admin/ls_cross.php',
				method: 'POST',
                type: 'POST',
				dataType: 'json',
				data: {
					ajax: 'Y',
					action: 'save',
					crossData: cross
				},
				success: function(data){
					BX.closeWait();
					if(data.success == 'Y')
					{
						updateCrossData();
					}
					else
					{
						showErrorPopup('Ошибка сохранения данных.');
					}
				},
				error: function( jqXHR, textStatus, errorThrown ){
   	                BX.closeWait();
                }
			});	
		}

		function updateWordImages(word_number, images)
		{
			if(images.list == undefined)
			{
				return false;
			}
			for(var i = 0; i < currentCross.words.length; i++)
			{
				if(currentCross.words[i].number == word_number*1)
				{
					currentCross.words[i].images = images.list;
					break;
				}
			}
			saveCurrentCross();
			paintWords();
		}

		function deletePhotos(word_number)
		{
			if(confirm('Подтвердите удаление изображений!'))
			{
				for(var i = 0; i < currentCross.words.length; i++)
				{
					if(currentCross.words[i].number == word_number*1)
					{
						var images = currentCross.words[i].images.join(';');
						currentCross.words[i].images = [];
						BX.showWait();
						$.ajax({
							url: '/local/modules/labsu.cross/ajax/del_photo.php',
							method: 'post',
                            type: 'POST',
							dataType: 'html',
							data: {
								files: images
							},
							success: function(data){
								BX.closeWait();
							},
							error: function( jqXHR, textStatus, errorThrown ){
								BX.closeWait();
							}
						});	
						break;
					}
				}
				saveCurrentCross();
				paintWords();
			}
		}

	$(document).ready(function(){
		updateCrossData();

		$('.popupovererror').click(function(){
			$('.popupovererror').hide();
			$('.popup_error').hide();
		});

		$('.add_cross').click(function(){
			currentCross = {};
			updateCrossBlock();
		});

		$('.add_word').click(function(){
			$('.popupover').show();
			$('.popup_add_form').show();
		});

		$('.popupover').click(function(){
			$('.popupover').hide();
			$('.popup_add_form').hide();
			$('.popup_add_photo').hide();
		});

		$('.add-word-btn').click(function(){
			var word = $(this).closest('form').find('input[name="word"]').val();
			var number = $(this).closest('form').find('input[name="number"]').val();
			var text = $(this).closest('form').find('textarea[name="text"]').val();
			var positionX = $(this).closest('form').find('input[name="position-x"]').val();
			var positionY = $(this).closest('form').find('input[name="position-y"]').val();
			var hORv = $(this).closest('form').find('select[name="h-or-v"]').val();
			if(!isExistWord(word, number))
			{
				addWord(number, word, text, positionX, positionY, hORv);
			}
			else
			{
				if(confirm('Данное слово либо номер слова добавлены в кроссворд. Перезаписать информацию?'))
				{
					addWord(number, word, text, positionX, positionY, hORv);
				}
			}
			updateCrossBlock();
			$('.popupover').click();
			clearAddForm();
		});

		$('input.cross_save').click(function(){
			if(currentCross.words == undefined || currentCross.words.length < 1)
			{
				return false;
			}

			currentCross.name = $('.cross_settings input[name="name"]').val();
			currentCross.active = ($('.cross_settings input[name="active"]').prop('checked'))? 'Y': 'N';
			currentCross.link = $('.cross_settings input[name="link"]').val();
			currentCross.text = $('.cross_settings textarea[name="text"]').val();

			if(currentCross.name == undefined || currentCross.text == undefined || currentCross.link == undefined)
			{
				showErrorPopup('Не все поля описания кроссворда заполнены.');
				return false;
			}

			saveCurrentCross();

			return false;	
		});

		var maxFileSize = 8 * 1024 * 1024; // (байт) Максимальный размер файла (2мб)
     	var queue = {};
     	var formLoadImages = $('form#uploadImages');
     	var imagesList = $('#uploadImagesList');
 
		var itemPreviewTemplate = imagesList.find('.item.template').clone();
     	itemPreviewTemplate.removeClass('template');
     	imagesList.find('.item.template').remove();
 
		$('#addImages').on('change', function () {
			queue = {};
        	var files = this.files;
 
			for (var i = 0; i < files.length; i++) 
			{
            	var file = files[i];
 
            	if ( !file.type.match(/image\/(jpeg|jpg|png|gif)/) ) 
				{
                	showErrorPopup( 'Фотография должна быть в формате jpg, png или gif' );
                	continue;
             	}
 
            	if ( file.size > maxFileSize ) 
				{
                	showErrorPopup( 'Размер фотографии не должен превышать 8 Мб' );
                	continue;
             	}
 
            	preview(files[i]);
         	}
			this.value = '';
     	});
 
		// Создание превью
     	function preview(file) {
        	var reader = new FileReader();
        	reader.addEventListener('load', function(event) {
            	var img = document.createElement('img');
 
            	var itemPreview = itemPreviewTemplate.clone();
 
	            itemPreview.find('.img-wrap img').attr('src', event.target.result);
    	        itemPreview.data('id', file.name);
 
        	    imagesList.append(itemPreview);
 
            	queue[file.name] = file;
			});
        	reader.readAsDataURL(file);
			$('#uploadImagesList').show();
     	}
 
     	// Удаление фотографий
     	imagesList.on('click', '.delete-link', function () {
        	var item = $(this).closest('.item'),
            id = item.data('id');
 
        	delete queue[id];
 
	        item.remove();
    	});

		formLoadImages.on('submit', function(event) {
			var formData = new FormData(), word_number = formLoadImages.find('input[name="word_number"]').val();
			formData.append('ajax', 'Y');
			formData.append('action', 'load');
			for (var id in queue) {
	 			formData.append('images[]', queue[id]);
 			}

			BX.showWait();
			$.ajax({
	 			url: '/local/modules/labsu.cross/ajax/load.php',
	 			type: 'POST',
	 			data: formData,
	 			async: true,
	 			xhr: function() {
		 			var xhr = new window.XMLHttpRequest();
		 			var progressBar = $('#progress-bar'),
			 			progressBg = progressBar.find('.progress-bg'),
						progressVal = progressBar.find('.progress-val');
					
					progressBar.show();

		 			// Upload progress
		 			xhr.upload.addEventListener("progress", function(evt){
			 			if (evt.lengthComputable) 
						{
				 			var percentComplete = evt.loaded / evt.total;
				 			percentComplete = (percentComplete * 100).toFixed();
							progressBg.css('width', percentComplete + '%');
				 			progressVal.text(percentComplete + '%');
						}
		 			}, false);
					return xhr;
	 			},
				error: function( jqXHR, textStatus, errorThrown ){
   	                BX.closeWait();
                },
	 			success: function (res) {
					$('.popupover').click();
					BX.closeWait();
					res = JSON.parse(res);
					updateWordImages(word_number, res);
	 			},
	 			cache: false,
	 			contentType: false,
				processData: false
			});
			return false;
		});    
	});
</script>
<style>
	.popupover, .popupovererror {
		position: fixed;
		display: none;
		top: 0px;
		left: 0px;
		width: 100%;
		height: 100%;
		background-color: #000;
		opacity: 0.6;
		z-index: 999;
	}
	.popupovererror {
		z-index: 1100;
	}
	.popup_error {
		z-index: 1200;
		position: fixed;
		display: none;
		top: 20%;
		left: 45%;
		width: 300px;
		background-color: #fff;
		border: 1px solid #bdcf62;
		border-radius: 5px;
		padding: 20px;
	}
	.popup_add_form, .popup_add_photo {
		z-index: 1000;
		position: fixed;
		display: none;
		top: 20%;
		left: 45%;
		width: 350px;
		background-color: #fff;
		border: 1px solid #bdcf62;
		border-radius: 5px;
		padding: 20px;
	}
	.popup_add_photo {
		max-height: 600px;
		overflow-y: auto;
	}
	.popup_add_form input[type="text"], .popup_add_form textarea {
		width: 100%;
		margin: 10px 0px;
		display: block;
	}
	.popup_add_form button {
		padding: 8px 10px;
		display: block;
		margin: 10px 0px;
		cursor: pointer;
	}
	.td_cross_block {
		margin-right: 10%;
	}
	.td_cross_right {
		border-left: 2px solid #000;
		padding: 10px 20px;
		background-color: #bdcf62;
	}
	.cross_data {
		display: block;
		width: 100%;
	}
	.cross_data .cross_fields, .cross_data .cross_btns {
		display: inline-block;
	}
	.cross_data .cross_btns {
		width: 30%;
		vertical-align: top;
	}
	.cross_data .cross_fields {
		width: 69%;
	}
	.cross_fields table.cross-table {
		position: relative;
		margin: 0px 0px 0px 0px;
		display: inline-block;
	}
	.cross_fields table.cross-table td {
		width: 28px;
		height: 28px;
		font-size: 18px;
		position: relative;
		background-color: #fff;
	}
	.cross_fields table.cross-table td span {
		position: absolute;
		top: 3px;
		left: 3px;
		font-size: 8px;
	}
	.cross_fields table.cross-table td.empty {
		border: 1px solid #bdcf62;
	}
	.cross_fields table.cross-table td.full {
		border: 1px solid #000;
	}
	.cross_fields table.cross-table td.selected {
		background-color: #bdcf62;
	}
	.cross_fields table.top-table {
		position: relative;
		margin: 0px;
	}
	.cross_fields .inline-table {
		display: block;
		position: relative;
		margin: 0px;
	}
	.cross_fields .inline-table .left-table {
		display: inline-block;
	}
	.cross_fields table.top-table td, .cross_fields .left-table td {
		background-color: #fff;
		vertical-align: middle;
		text-align: center;
		width: 28px;
		height: 28px;
		font-size: 15px;
		border: 1px solid #bdcf62;
	}
	.cross_settings .input_block {
		margin: 15px 0px;
		width: 50%;
		display: block;
		position: relative;
	}
	.cross_settings .input_block label {
		margin-left: 10px;
		cursor: pointer;
	}
	.cross_settings input[type="text"], .cross_settings textarea {
		width: 100%;
		display: block;
		position: relative;
	}
	.cross_settings input[name="name"] {
		margin-top: 20px;
	}
	.cross_words ul {
		list-style: none;
		padding: 0px;
	}
	.cross_words ul li {
		list-style: none;
		cursor: pointer;
		margin: 15px 0px;
	}
	.cross_words ul li a {
		font-size: 12px;
		display: inline-block;
	}
	.cross_list ul {
		list-style: none;
		padding: 0px;
	}
	.cross_list ul li {
		list-style: none;
		margin: 15px 0px;
		font-size: 16px;
	}
	.cross_list ul li a {
		font-size: 12px;
	}
	#uploadImagesList {
        list-style: none;
        padding: 0;
		display: none;
    }
    #uploadImagesList .item {
        float: left;
        margin-right: 20px;
        margin-bottom: 20px;
    }
    #uploadImagesList .item .img-wrap {
        width: inherit;
        display: block;
        height: 150px;
    }
    #uploadImagesList .item .img-wrap img{
        width: auto;
        height: inherit;
    }
    #uploadImagesList .item .delete-link {
        cursor: pointer;
        display: block;
    }
    .clear {
        clear: both;
    }
	#progress-bar {
		margin-top: 20px;
		width: 300px;
		height: 20px;
		background: #999999;
		position: relative;
		display: none;
	}
	#progress-bar .progress-bg {
		position: absolute;
		width: 0;
		height: inherit;
		background: green;
	}
	#progress-bar .progress-val {
		position: absolute;
		text-align: center;
		width: inherit;
		height: inherit;
	}    
	.add-photo-btn {
		cursor: pointer;
		margin: 20px 0px;
	}
	.word_photo {
		display: block;
		position: relative;
	}
	.word_photo .img_block {
		width: 120px;
		margin: 10px;
		display: inline-block;
	}
	.word_photo .img_block img {
		width: 100%;
	}
</style>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php");
?>