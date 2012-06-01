<div class="page-header">
	<h1>Gestion des champs personnalisés</h1>
</div>

<?php include_partial('global/flashMessage') ?>


<form action="<?php echo url_for('@settings_custom_fields');?>" method="post">
	<div id="holder"></div>
	<div class="clear"></div>

	<a id="add_element" href="javascript://" class="btn btn-success"><i class="icon-plus-sign icon-white"></i> <?php echo __('Ajouter un nouveau champ personnalisé') ?></a>

	<?php printf('<div class="form-actions"><input type="submit" class="btn btn-primary" value="%s"/>&nbsp;<a href="%s" class="btn">Annuler</a></div>', __('Enregistrer'), url_for('@settings_custom_fields')); ?>


</form>

<script type="text/javascript">
/* <![CDATA[ */

function deleteFieldset(element){
	$("#"+element).remove();
	checkAddLink();

	$(".well").each(function (index) {
		var nb_fieldset = $(this).find('.nb_fieldset');
		nb_fieldset.empty().append(index + 1);
	});
}

function checkAddLink(){
	var maxElement = <?php echo sfConfig::get('app_fields_count', 1) ?>;
	var fieldsetCount = $('.well:visible').length;

	if (fieldsetCount == maxElement) {
		$("#add_element").hide();
	}else{
		$("#add_element").show();
	}

	return true;
}

function addFieldset(value){
	var fieldsetCount = $('.well:visible').length + 1;
	if (value == undefined){
		value = '';
	}
	var nb = Math.ceil(Math.random() * 100);

	$('#holder').append('<div class="well span6" id="fieldset_'+ nb +'"><h3>Champ personnalisé n°<span class="nb_fieldset">'+ fieldsetCount
	+'</span> <a class="close delete_link" href="javascript://" title="Supprimer cette liste" onclick="if (confirm(\'Etes vous sur de vouloir supprimer ce champ? Cette opération ne peut pas être annulée.\')){deleteFieldset(\'fieldset_'+ nb +'\');}">&times;</a></h3><hr/>'
	+'<div class="control-group">'
	+'Intitulé du champ'
	+'<div class="controls"><input type="text" class="span6 listen" value="'+ value +'" name="custom_contact[element'+ nb +']"/></div></div>'
	+'</div>');

	checkAddLink();
	return true;
}

function displayDefaults(){
	$('#holder').append('<?php $cpt = 1; foreach ($customFields as $value){	$random = rand(0,100); echo escape_javascript(sprintf('<div class="well span6" id="fieldset_%s"><h3>Champ personnalisé n°<span class="nb_fieldset">%s</span> <a class="close delete_link" href="javascript://" title="Supprimer cette liste" onclick="if (confirm(\'Etes vous sur de vouloir supprimer ce champ? Cette opération ne peut pas être annulée.\')){deleteFieldset(\'fieldset_%s\');}">&times;</a></h3><hr/><div class="control-group">Intitulé du champ<div class="controls"><input type="text" class="span6 listen" value="%s" name="custom_contact[element%s]"/></div></div></div>',$random, $cpt,$random,$value,$random)); $cpt++;}	?>');
}

$(document).ready(function() {
	displayDefaults();

	$("#add_element").live("click", function(){
		addFieldset();
	});

});

/* ]]> */
</script>
