<div class="page-header">
	<h1>Personnalisation de l'affichage de la liste des contacts</h1>
</div>

<?php use_javascript('/js/jquery-ui-1.8.20.custom.min.js') ?>
<?php use_stylesheet('/css/ui-lightness/jquery-ui-1.8.20.custom.css') ?>


			<?php use_helper('Text') ?>
			<?php include_partial('global/flashMessage') ?>

		  <?php $checkboxTag = new sfWidgetFormInputCheckbox(); ?>

<form method="post" name="login" class="login" action="<?php echo url_for('@settings_contact_list') ?>">

<p>Cocher dans la liste ci-dessous l'ensemble des colonnes que vous souhaitez voir dans la liste des contacts.</p>
<p>Vous pouvez définir l'ordre des colonnes en changeant l'ordre des lignes ci-dessous par glisser/déposer.</p>

	<?php
	if (count($fieldList) > 0) {
		echo '<ul class="span5 unstyled sortable">';

		foreach ($fieldList as $fieldname => $bool) {
			printf('<li class="ui-state-default" style="margin: 5px 0;padding: 5px"><label class="checkbox">
%s&nbsp;<span id="span_custom_contact_%s">%s</span>
</label>
</li>',
			     	$checkboxTag->render($fieldname, $bool, array('id' => $fieldname)), strtolower($fieldname), truncate_text(ContactPeer::getFieldLabel($fieldname)));
		}
		echo '</ul>';
	}
		?>



	<input type="hidden" id="hidden" name="hidden"/>
	<?php printf('<div style="clear:both;"></div><div class="form-actions"><input type="submit" class="btn btn-primary" value="%s" onclick="updateHidden();"/></div>', __('Enregistrer')); ?>
</form>

<script type="text/javascript">
$(document).ready(function() {
	updateSortable();
});

function updateSortable(){
	$(".sortable").sortable({
		revert: true,
		connectWith: ".sortable",
		placeholder: 'ui-state-highlight',
		forcePlaceholderSize: true,
		forceHelperSize: true
	});
}

function updateHidden(){
	var tab=new Array();
	$('.sortable li').each(function(i,index) {
		var title=$(index).find("input:checkbox").attr('id');
		tab[title]=$(index).find("input:checkbox").attr('checked');
	});

	$('#hidden').val(serialize(tab));
	return true;
}

function serialize (mixed_value) {
	var _utf8Size = function (str) {
		var size = 0, i = 0, l = str.length, code = '';
		for (i = 0; i < l; i++) {
			code = str.charCodeAt(i);
			if (code < 0x0080) {
			size += 1;                } else if (code < 0x0800) {
			size += 2;
			} else {
			size += 3;
			}            }
		return size;
	};
	var _getType = function (inp) {
		var type = typeof inp, match;        var key;

		if (type === 'object' && !inp) {
			return 'null';
		}        if (type === "object") {
			if (!inp.constructor) {
				return 'object';
			}
			var cons = inp.constructor.toString();            match = cons.match(/(\w+)\(/);
			if (match) {
				cons = match[1].toLowerCase();
			}
			var types = ["boolean", "number", "string", "array"];            for (key in types) {
				if (cons == types[key]) {
					type = types[key];
					break;
				}            }
		}
		return type;
	};
	var type = _getType(mixed_value);    var val, ktype = '';

	switch (type) {
		case "function":
			val = "";             break;
		case "boolean":
			val = "b:" + (mixed_value ? "1" : "0");
			break;
		case "number":            val = (Math.round(mixed_value) == mixed_value ? "i" : "d") + ":" + mixed_value;
			break;
		case "string":
			val = "s:" + _utf8Size(mixed_value) + ":\"" + mixed_value + "\"";
			break;        case "array":
		case "object":
			val = "a";
			/*
			if (type == "object") {                var objname = mixed_value.constructor.toString().match(/(\w+)\(\)/);
			if (objname == undefined) {
			return;
			}
			objname[1] = this.serialize(objname[1]);                val = "O" + objname[1].substring(1, objname[1].length - 1);
			}
			*/
			var count = 0;
			var vals = "";            var okey;
			var key;
			for (key in mixed_value) {
				if (mixed_value.hasOwnProperty(key)) {
					ktype = _getType(mixed_value[key]);                       if (ktype === "function") {
						continue;
					}

					okey = (key.match(/^[0-9]+$/) ? parseInt(key, 10) : key);                       vals += this.serialize(okey) +
					this.serialize(mixed_value[key]);
					count++;
				}
			}            val += ":" + count + ":{" + vals + "}";
			break;
		case "undefined": // Fall-through
			default: // if the JS object has a property which contains a null value, the string cannot be unserialized by PHP
			val = "N";            break;
	}
	if (type !== "object" && type !== "array") {
		val += ";";
	}    return val;
}
</script>