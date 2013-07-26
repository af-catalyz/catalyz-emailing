<?php

require_once(dirname(__FILE__) . '/../../../bootstrap.php');

function displayNodeList() {
    $ContentTree = ContentTree::instance();
    foreach($ContentTree->getIterator() as $id => $ContentTreeNodeInfos) {
        $caption = $ContentTree->getPathFmt($id,40);
        // $caption = $ContentTreeNodeInfos['menu_title'];
        $visibleInMenu = $ContentTreeNodeInfos['visible']?'':' class="hidden"';
        printf('	html += \'<option value="%s"%s>%s</option>\';', $id, $visibleInMenu, str_replace('\'', '\\\'', $caption));
        echo "\n";
    }
}

?>

/* Functions for the linknode plugin popup */

tinyMCEPopup.requireLangPack();

var templates = {
	"window.open" : "window.open('${url}','${target}','${options}')"
};



function preinit() {
	var url;

	if (url = tinyMCEPopup.getParam("external_link_list_url"))
		document.write('<script language="javascript" type="text/javascript" src="' + tinyMCEPopup.editor.documentBaseURI.toAbsolute(url) + '"></script>');
}

function init() {
	tinyMCEPopup.resizeToInnerSize();

	var formObj = document.forms[0];
	var inst = tinyMCEPopup.editor;
	var elm = inst.selection.getNode();
	var action = "insert";
	var html;

	document.getElementById('hrefbrowsercontainer').innerHTML = getBrowserHTML('hrefbrowser','href','file','advlink');
	document.getElementById('nodelistcontainer').innerHTML = getNodeListHTML('nodelist','node');
	document.getElementById('localelistcontainer').innerHTML = getLocaleListHTML('localelist','locale');
	document.getElementById('targetlistcontainer').innerHTML = getTargetListHTML('targetlist','target');


	elm = inst.dom.getParent(elm, "A");
	if (elm != null && elm.nodeName == "A")
		action = "update";

	if (action == "update"){
		var href = inst.dom.getAttrib(elm, 'href');
		var choice = inst.dom.getAttrib(elm, 'type');
		switch(choice){
		case '1':
				var reg_exp = new RegExp('^#node-([0-9]+)(,([a-z]{2}))?#$');
				var matches = reg_exp.exec(href);

				var node = "";
				if (matches.length >= 2){
					node = matches[1];
				}
				if (matches.length >= 4){
					selectByValue(formObj, 'localelist', matches[3], false);
				}
			break;
		case '2':
			setFormValue('href', href);
			inst.dom.setAttrib(elm, 'linkType',2)

			break;
		case '3':
			setFormValue('externaltarget', href);
			break;
		}

		setFormValue('title', inst.dom.getAttrib(elm, 'title'));
		selectByValue(formObj, 'classlist', inst.dom.getAttrib(elm, 'class'), true);
		selectByValue(formObj, 'nodelist', node, true);
	}
	else{

	}
}

function setFormValue(name, value) {
	document.forms[0].elements[name].value = value;
}

function getNodeListHTML(elm_id, node_form_element){
	var html = '';
	html += '<select id="' + elm_id + '" name="' + elm_id + '" onf2ocus="tinyMCE.addSelectAccessibility(event, this, window);">';
<?php displayNodeList() ?>
	html += '</select>';
	return html;
}

function getLocaleListHTML(elm_id, locale_form_element) {
	var html = '';
	html += '<select id="' + elm_id + '" name="' + elm_id + '" onf2ocus="tinyMCE.addSelectAccessibility(event, this, window);">';
	html += '<option value="" selected="selected">-Par default-</option>';
<?php
foreach(Catalyz::getAllTranslations() as $code => $language) {
    printf('	html += \'<option value="%s">%s</option>\';', $code, ucfirst($language));
}

?>
	html += '</select>';
	return html;
}

function insertAction() {
	var inst = tinyMCEPopup.editor;
	var elm, elementArray, i;

	elm = inst.selection.getNode();
	//checkPrefix(document.forms[0].href);

	elm = inst.dom.getParent(elm, "A");

	// Remove element if there is no href
	//if (!document.forms[0].href.value) {
		//tinyMCEPopup.execCommand("mceBeginUndoLevel");
		//i = inst.selection.getBookmark();
		//inst.dom.remove(elm, 1);
		//inst.selection.moveToBookmark(i);
		//tinyMCEPopup.execCommand("mceEndUndoLevel");
		//tinyMCEPopup.close();
		//return;
	//}

	tinyMCEPopup.execCommand("mceBeginUndoLevel");

	// Create new anchor elements
	if (elm == null) {
		tinyMCEPopup.execCommand("CreateLink", false, "#mce_temp_url#", {skip_undo : 1});

		elementArray = tinymce.grep(inst.dom.select("a"), function(n) {return inst.dom.getAttrib(n, 'href') == '#mce_temp_url#';});
		for (i=0; i<elementArray.length; i++)
			setAllAttribs(elm = elementArray[i]);
	} else
		setAllAttribs(elm);

	// Don't move caret if selection was image
	if (elm.childNodes.length != 1 || elm.firstChild.nodeName != 'IMG') {
		inst.focus();
		inst.selection.select(elm);
		inst.selection.collapse(0);
		tinyMCEPopup.storeSelection();
	}

	tinyMCEPopup.execCommand("mceEndUndoLevel");
	tinyMCEPopup.close();
}

function setAllAttribs(elm) {
	var formObj = document.forms[0];

	var target = getSelectValue(formObj, 'targetlist');
	var title = formObj.title.value;


	for (var i=0; i<formObj.elements["linkType"].length;i++) {
         if (formObj.elements["linkType"][i].checked) {
			var choice =  formObj.elements["linkType"][i].value;
         }
      }

	switch(choice){
	case '1':
		var href = '#node-'+getSelectValue(formObj, 'nodelist');
		var locale = getSelectValue(formObj, 'localelist');
		if ('' != locale){
			href += ','+locale;
		}
		href += '#';
		break;
	case '2':
		var href = formObj.href.value;
		break;
	case '3':
		var href = formObj.externaltarget.value;
		break;
	}

	setAttrib(elm, 'href', href);
	setAttrib(elm, 'title', title);
	setAttrib(elm, 'target', target == '_self' ? '' : target);
	setAttrib(elm, 'id');
	setAttrib(elm, 'style');
	setAttrib(elm, 'class', getSelectValue(formObj, 'classlist'));
	setAttrib(elm, 'rel');
	setAttrib(elm, 'rev');
	setAttrib(elm, 'charset');
	setAttrib(elm, 'hreflang');
	setAttrib(elm, 'dir');
	setAttrib(elm, 'lang');
	setAttrib(elm, 'tabindex');
	setAttrib(elm, 'accesskey');
	setAttrib(elm, 'type',choice);
	setAttrib(elm, 'onfocus');
	setAttrib(elm, 'onblur');
	setAttrib(elm, 'onclick');
	setAttrib(elm, 'ondblclick');
	setAttrib(elm, 'onmousedown');
	setAttrib(elm, 'onmouseup');
	setAttrib(elm, 'onmouseover');
	setAttrib(elm, 'onmousemove');
	setAttrib(elm, 'onmouseout');
	setAttrib(elm, 'onkeypress');
	setAttrib(elm, 'onkeydown');
	setAttrib(elm, 'onkeyup');

	// Refresh in old MSIE
	if (tinyMCE.isMSIE5)
		elm.outerHTML = elm.outerHTML;
}

function setAttrib(elm, attrib, value) {
	var formObj = document.forms[0];
	var valueElm = formObj.elements[attrib.toLowerCase()];
	var dom = tinyMCEPopup.editor.dom;

	if (typeof(value) == "undefined" || value == null) {
		value = "";

		if (valueElm)
			value = valueElm.value;
	}

	// Clean up the style
	if (attrib == 'style')
		value = dom.serializeStyle(dom.parseStyle(value));

	dom.setAttrib(elm, attrib, value);
}

function getSelectValue(form_obj, field_name) {
	var elm = form_obj.elements[field_name];

	if (!elm || elm.options == null || elm.selectedIndex == -1)
		return "";

	return elm.options[elm.selectedIndex].value;
}

function getTargetListHTML(elm_id, target_form_element) {
	var targets = tinyMCEPopup.getParam('theme_advanced_link_targets', '').split(';');
	var html = '';

	html += '<select id="' + elm_id + '" name="' + elm_id + '" onf2ocus="tinyMCE.addSelectAccessibility(event, this, window);" onchange="this.form.' + target_form_element + '.value=';
	html += 'this.options[this.selectedIndex].value;">';
	html += '<option value="_self">' + tinyMCEPopup.getLang('linknode_dlg.target_same') + '</option>';
	html += '<option value="_blank">' + tinyMCEPopup.getLang('linknode_dlg.target_blank') + ' (_blank)</option>';
	html += '<option value="_parent">' + tinyMCEPopup.getLang('linknode_dlg.target_parent') + ' (_parent)</option>';
	html += '<option value="_top">' + tinyMCEPopup.getLang('linknode_dlg.target_top') + ' (_top)</option>';

	for (var i=0; i<targets.length; i++) {
		var key, value;

		if (targets[i] == "")
			continue;

		key = targets[i].split('=')[0];
		value = targets[i].split('=')[1];

		html += '<option value="' + key + '">' + value + ' (' + key + ')</option>';
	}

	html += '</select>';

	return html;
}

// While loading
preinit();
tinyMCEPopup.onInit.add(init);
