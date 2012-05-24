<div class="page-header">
	<h1>Configuration</h1>
</div>

<div class="tabbable tabs-left">
	<ul class="nav nav-tabs">
		<li><a href="<?php echo url_for('@settings') ?>">Utilisateurs</a></li>
		<li><a href="<?php echo url_for('@settings_contact_list') ?>">Liste des contacts</a></li>
		<li class="active"><a href="#1" data-toggle="tab">Champs personnalisés</a></li>
		<li><a href="<?php echo url_for('@settings_unsubscribe') ?>">Désabonnement</a></li>
	</ul>

	<div class="tab-content span9">
		<div class="tab-pane active" id="1">

		<?php include_partial('global/flashMessage') ?>


<form action="<?php echo url_for('@settings_custom_fields');?>" method="post">
	<div id="holder"></div>

	<a id="add_element" href="javascript://" class="btn btn-success"><i class="icon-plus-sign icon-white"></i> Ajouter un nouveau champ personnalisé</a>

	<?php printf('<div class="form-actions"><input type="submit" class="btn btn-primary" value="%s"/></div>', __('Enregistrer')); ?>


</form>

<script type="text/javascript">
/* <![CDATA[ */

function deleteFieldset(element){
	var fieldset_parent = element.parents('.well');
	fieldset_parent.remove();
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

	$('#holder').append('<div class="well" id="fieldset_'+ nb +'"><legend>Champ personnalisé n°<span class="nb_fieldset">'+ fieldsetCount +'</span> (<a class="delete_link" href="javascript://">supprimer</a>)</legend>'
	+'<div class="control-group">'
	+'Intitulé du champ'
	+'<div class="controls"><input type="text" class="span6 listen" value="'+ value +'" name="custom_contact[element'+ nb +']"/></div></div>'
	+'</div>');

	checkAddLink();
	return true;
}


function displayDefaults(){
	$('#holder').append('<?php $cpt = 1; foreach ($customFields as $value){	$random = rand(0,100);
		printf('<div class="well" id="fieldset_%s"><legend>Champ personnalisé n°<span class="nb_fieldset">%s</span> (<a class="delete_link" href="javascript://">supprimer</a>)</legend><div class="control-group">Intitulé du champ<div class="controls"><input type="text" class="span6 listen" value="%s" name="custom_contact[element%s]"/></div></div></div>',$random, $cpt,$value,$random); $cpt++;}	 	?>');
}


$(document).ready(function() {
	displayDefaults();

	$("#add_element").live("click", function(){
		addFieldset();
	});

	$(".delete_link").live("click", function(){
		deleteFieldset($(this));
	});
});

/* ]]> */
</script>

		</div>
	</div>
</div>