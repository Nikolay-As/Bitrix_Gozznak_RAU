var OnSitemapSettingsLoad = function(arParams)
{
	window.jsSitemapOpener = new JCSitemapEditorOpener(arParams);
};

function JCSitemapEditorOpener(arParams)
{
	this.arParams = arParams;
	this.buffer = '<table><tbody><tr><td>';

	this.arParams.data = JSON.parse(this.arParams.data);

	for(var i in this.arParams.data.tree)
	{
		var curdata = this.arParams.data.tree[i];
		var name = (curdata["LEVEL"] == 0) ? ('<b>' + curdata["NAME"] + '</b>') : curdata["NAME"];
		var checked = (this.arParams.data.val != null && typeof this.arParams.data.val[curdata["ID"]] != 'undefined' && this.arParams.data.val[curdata["ID"]] == "Y") ? 'checked="checked"' : '';

		this.buffer += '<table><tr><td width="' + (curdata["LEVEL"] * 20) + '"></td><td><input type="checkbox" name="' + this.arParams.propertyID + '[' + curdata["ID"] + ']" ' + checked + '>&nbsp;' + name + '</td></tr></table>';
	}

	this.buffer += '</td></tr></tbody></table>';
	this.arParams.oCont.innerHTML = this.buffer;
}
