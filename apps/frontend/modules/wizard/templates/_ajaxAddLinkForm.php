
<fieldset>
  <legend>Lien</legend>
  <table width="100%" cellpadding="2" cellspacing="0">



<tr>
	<td colspan="2">
		<label for="<?php echo $random ?>_LinkType2"><input type="radio" name="<?php echo $fieldId ?>_LinkType" id="<?php echo $random ?>_LinkType2" value="2"<?php if ($defaultRadio==2){echo 'checked="true"';} ?>/>Lien vers le fichier suivant :</label>
	</td>
</tr>
<tr>
	<td>&nbsp;&nbsp;</td>

	<?php
	$field = /*(sfFormField)*/ $form[$random.'_file_link'];
	$name = $field->getWidget()->getAttribute('id');
	?>

	<td><?php echo $form[$random.'_file_link'] ?> [<a href="javascript:mcFileManager.open('catalyzEdit','<?php echo  $name ?>','',function (url, data){$('<?php echo '#'.$name?>').attr('value', url);},{remove_script_host : true});" onclick="document.getElementById('<?php echo $random.'_LinkType2'?>').checked = true;">Parcourir</a>]</td>
</tr>
<tr>
	<td colspan="2">
		<label for="<?php echo $random ?>_LinkType3"><input type="radio" name="<?php echo $fieldId ?>_LinkType" id="<?php echo $random ?>_LinkType3" value="3"<?php if ($defaultRadio==3){echo 'checked="true"';} ?>/>Lien vers la page web suivante :</label>
	</td>
</tr>
<tr>
	<td>&nbsp;&nbsp;</td>
	<td><?php echo $form[$random.'_website_link'] ?></td>
</tr>
<tr>
	<td>&nbsp;&nbsp;</td>
	<td><div class="hint">Exemple: 'http://www.google.com'</div></td>
</tr>
</table>
	<input type="button" value="Sauvegarder" id="<?php echo 'Validate'.$random ?>" />
	<input type="button" value="Annuler" id="<?php echo 'Cancel'.$random ?>"/>
</fieldset>

<script>
$('#<?php echo 'Validate'.$random ?>').click(function() {

	$("#<?php echo 'LinkPath'.$random ?>").empty();
	$(".<?php echo 'czWidgetFormLink'.$random ?> input:hidden").empty();
	switch($("#<?php echo 'ToUpdate'.$random ?> input:checked").val()){
	case '2':
		$(".<?php echo 'czWidgetFormLink'.$random ?> input:hidden").val($("#<?php echo $random.'_file_link'?>").val());
		$("#<?php echo 'LinkPath'.$random ?>").append("Lien vers le fichier : "+$("#<?php echo $random.'_file_link'?>").val());
		break;
	case '3':
		$(".<?php echo 'czWidgetFormLink'.$random ?> input:hidden").val($("#<?php echo $random.'_website_link'?>").val());
		$("#<?php echo 'LinkPath'.$random ?>").append('Lien vers la page web suivante : <a href="'+$("#<?php echo $random.'_website_link'?>").val()+'" target="_blank">'+$("#<?php echo $random.'_website_link'?>").val()+'</a>');
		break;
	}

	$(this).parent().remove();
	$('#<?php echo 'slink'.$random ?>').show();
	$('#<?php echo 'LinkPath'.$random ?>').show();
});

$('#<?php echo 'Cancel'.$random ?>').click(function() {
	$(this).parent().remove();
	$('#<?php echo 'slink'.$random ?>').show();
	$('#<?php echo 'LinkPath'.$random ?>').show();
});
</script>