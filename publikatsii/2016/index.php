<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Публикации 2016 года");
?>
<p style="cursor:pointer" onclick="expandit(this)">
	<u>2021</u>
</p>
<span style="display:none">

</span>
<br>

<p style="cursor:pointer" onclick="expandit(this)">
	<u>2020</u>
</p>
<span style="display:none">

</span>
<br>

<p style="cursor:pointer" onclick="expandit(this)">
	<u>2019</u>
</p>
<span style="display:none">

</span>
<br>

<p style="cursor:pointer" onclick="expandit(this)">
	<u>2018</u>
</p>
<span style="display:none">

</span>
<br>

<p style="cursor:pointer" onclick="expandit(this)">
	<u>2017</u>
</p>
<span style="display:none">

</span>
<br>

<p style="cursor:pointer" onclick="expandit(this)">
	<u>2016</u>
</p>
<span style="display:none">
	<p>Нумизматика</p>
	<a href="https://museum.goznak.ru/upload/pdf/publikatsii/Богданов_Пробные_монеты,_выпыщенные_в_ходе_подготовки_к_денежной_реформе_1997_г..pdf"><b>	Богданов А. А. Пробные монеты Российской Федерации, отчеканенные в ходе подготовки к денежной реформе 1997–1998 годов // Нумизматические чтения Государственного исторического музея 2016 года. Москва, 22 и 23 ноября 2016 г.: Материалы докладов и сообщений. М., 2016. С. 204–209.</b></a><br><br>
	<a href="https://museum.goznak.ru/upload/pdf/publikatsii/Богданов_Пробные_монеты_РФ_1995_и_1998.pdf"><b>	Богданов А. А. Пробные монеты Российской Федерации 1995 и 1998 годов // Петербургский коллекционер. 2016. № 6 (98). С. 49–51.</b></a><br>
	<br><p>Бонистика</p>
	<br><p>Выставки и проекты музея / разное</p>
	<a href="https://museum.goznak.ru/upload/pdf/publikatsii/Богданов_Экспозиция_История_денег.pdf"><b>	Богданов А. А. Экспозиция «История денег»: есть, чем удивлять // Золотой червонец. 2016. № 3 (36). С. 84–90.</b></a><br>
</span>
<br>

<script language="JavaScript1.2">
	var ns6=document.getElementById&&!document.all?1:0
	var head="display:''"
	var folder=''
	function expandit(curobj)
	{
		folder=ns6?curobj.nextSibling.nextSibling.style:document.all[curobj.sourceIndex+1].style
		if (folder.display=="none")
			folder.display=""
		else
			folder.display="none"
	}
</script>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>