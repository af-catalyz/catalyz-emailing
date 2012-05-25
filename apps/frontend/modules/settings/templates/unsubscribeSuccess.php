<div class="page-header">
	<h1>Gestion des désabonnements</h1>
</div>

<?php use_javascript('tiny_mce/tiny_mce'); ?>
<?php use_javascript('/js/jquery-ui-1.8.20.custom.min.js') ?>
<?php use_stylesheet('/css/ui-lightness/jquery-ui-1.8.20.custom.css') ?>

<?php $form = /*(UnsubscribedConfigurationForm)*/ $form ?>

<?php
use_helper('Escaping');
$listes = array();


$defaults = $defaults->getRawValue();

if (!empty($defaults['qualif_list_publication'])) {
	if (is_array($defaults['qualif_list_publication'])) { //remove older version
		$listes = array();
	}else{
		$listes = unserialize($defaults['qualif_list_publication']);
	}
}

?>

<?php include_partial('global/flashMessage') ?>

<form id="unsubscribed_configuration_form" action="<?php echo url_for('@settings_unsubscribe');?>" method="post">
	<?php
	echo $form->renderHiddenFields();
	echo $form->renderGlobalErrors();
	$errors = $form->getErrorSchema();
	 ?>

	<div class="tabbable">
		<ul class="nav nav-tabs">
			<li class="active"><a href="#fragment-2" data-toggle="tab">Qualification</a></li>
			<li><a href="#fragment-1" data-toggle="tab">Confirmation</a></li>
			<li><a href="#fragment-3" data-toggle="tab">Notification</a></li>
		</ul>

		<div class="tab-content">
			<div class="tab-pane active" id="fragment-2">

				<label class="checkbox">
					<?php
						echo $form['qualif_enabled'];
						echo $form['qualif_enabled']->renderLabel();
					 ?>
				</label>

				<br />
					<div class="qualif_listener" style="display:none;">
						<div class="control-group">
						<?php printf('<label class="control-label">%s</label>', $form['qualif_header']->renderLabel()) ?>
							<div class="controls">
								<?php echo $form['qualif_header']; ?>
							</div>
						</div>

						<div class="well">
							<h3>Gestion multi-liste</h3>
							<br />
							<label class="checkbox">
									<?php
										echo $form['qualif_list_enabled'];
										echo $form['qualif_list_enabled']->renderLabel();
										?>
							</label>
							<br />
							<div class="qualif_list_listener" style="display:none;">
								<div class="control-group">
									<?php printf('<label class="control-label">%s</label>', $form['qualif_list_introduction']->renderLabel()) ?>
									<div class="controls">
										<?php echo $form['qualif_list_introduction']; ?>
									</div>
								</div>
								<br />

								<div class="control-group">
									<p>Liste des types de publications à proposer:</p>
									<?php
									printf('<div id="publications_holder"></div><br/>');
									printf('<a class="add_list_element btn btn-success" href="javascript://"><i class="icon-plus-sign icon-white"></i> Ajouter une liste</a>');
									 ?>
								</div>
							</div>
						</div>

						<div class="well">
							<h3>Motif</h3>
							<br />

							<div class="control-group">
								<?php printf('<label class="control-label">%s</label>', $form['qualif_motif_introduction']->renderLabel()) ?>
								<div class="controls">
									<?php echo $form['qualif_motif_introduction']; ?>
								</div>
							</div>
							<br />


							<?php
$class = '';
if (!empty($errors['qualif_motif_raisons'])) {
	$class = ' error';
}

printf('<div class="control-group%s">', $class);
?>

								<?php printf('<label class="control-label">%s</label>', $form['qualif_motif_raisons']->renderLabel()) ?>
								<div class="controls">
									<?php echo $form['qualif_motif_raisons']; echo $form['qualif_motif_raisons']->renderError();?>
									<span class="help-block">Mettre une raison par ligne</span>
								</div>
							</div>
							<br />
						</div>

							<div class="control-group">
								<?php printf('<label class="control-label">%s</label>', $form['qualif_footer']->renderLabel()) ?>
								<div class="controls">
									<?php echo $form['qualif_footer']; ?>
								</div>
							</div>
					</div>

			</div>
			<div class="tab-pane" id="fragment-1">
				<table>
				<?php echo (string)$form['conf_type']; ?><br />
				</table>
			</div>
			<div class="tab-pane" id="fragment-3">

				<label class="checkbox">
					<?php
						echo $form['notif_enabled'];
						echo $form['notif_enabled']->renderLabel();
					 ?>
				</label>
				<br />
				<div class="notif_listener" style="display:none;">


					<?php
$class = '';
if (!empty($errors['notif_recipient'])) {
	$class = ' error';
}

printf('<div class="control-group%s">', $class);
?>


						<?php printf('<label class="control-label">%s</label>', $form['notif_recipient']->renderLabel()) ?>
						<div class="controls">
							<?php echo $form['notif_recipient']; ?>
							<?php echo $form['notif_recipient']->renderError() ?>
						</div>
					</div>

					<div class="control-group">
						<?php printf('<label class="control-label">%s</label>', $form['notif_subject']->renderLabel()) ?>
							<div class="controls">
								<?php echo $form['notif_subject']; ?>
								<div class="help-block">
									<p class="hint">Voici la liste des macros disponibles :</p>
									 <ul class="hint">
									 	<li class="hint">#FIRSTNAME# : Prénom du contact</li>
									 	<li class="hint">#LASTNAME# : Nom du contact</li>
										<li class="hint">#EMAIL# : Email du contact</li>
									 	<li class="hint">#SUBJECT# : Sujet de votre campagne</li>
									 	<li class="hint">#REASON# : Motif choisi par l'utilisateur</li>
									 </ul>
								</div>
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>
	<br />


	<?php printf('<div class="form-actions"><input type="submit" class="btn btn-primary" value="%s"/>&nbsp;<a href="%s" class="btn">Annuler</a></div>', __('Enregistrer'), url_for('@settings_unsubscribe')); ?>

	<br />
</form>

<script type="text/javascript">
/* <![CDATA[ */

$(document).ready(function() {
	$("#publications_holder").sortable({ axis: 'y',handle: '.handle'});


	checkClass('notif_listen');
	checkClass('qualif_listen');
	checkClass('qualif_list_listen');

	$("#unsubscribed_conf_url").live("focus", function(){
		$("#unsubscribed_conf_type_2").attr('checked','checked');
	});

  Groups = new Array(); //create a global variable for groups
	<?php foreach ($groups as $id => /*(ContactGroup)*/$group){ printf('Groups[%s] = "%s";', $id, str_ireplace('"', '\"', $group->getName()));}?>

	initListes();

	$(".add_list_element").live("click", function(){
		addListElement();
	});

});

function deleteFieldset(element){
	$('#'+element).parents('.list_element').remove();
	return false;
}

function initListes(){
	var listes = new Array();
	<?php foreach ($listes as $key => $details){
		printf("g%s = new Array();\n", $key);
		foreach ($details['groups'] as $id => $bool){
			printf('g%s[%s] = "%s";'."\n",$key,$id,$id);
		}
		printf('addListElement("%s", g%s);'."\n", esc_entities($details['title']), $key);
	}?>
}

function addListElement(title, ids){
	var random = Math.random()*1000;
	if (title == undefined) {
		title = '';
	}

	if (ids == undefined) {
		ids = new Array();
	}

	var random_ = new String(random);
	random_ = random_.replace(/\./g, '_');


	var text = '<div class="list_element" style="width: 615px;background-color: #FFFFFF;margin-bottom: 10px; border: 1px solid #CACACA;"><table style="background-color: #EEEEEE" class="table handle"><tr><td  style="vertical-align: middle;" width="130">Nom de la liste</td><td>'
							+ '<input type="text" class="text" name="unsubscrib[qualif_list_publication]['+random+'][title]" id="unsubscrib_qualif_list_publication_'+random+'_title" value="'+title+'"/>'
							+ '</td><td align="right" width="50">'
							+ '<a class="close" id="delete_'+random_+'" href="javascript://" title="Supprimer cette liste" onclick="if (confirm(\'Etes vous sur de vouloir supprimer cette liste? Cette opération ne peut pas être annulée.\')){deleteFieldset(\'delete_'+random_+'\');}">'
							+ '&times;</a></td></tr></table><div style="padding:0 5px;"><p>Sélectionnez les groupes dont vous souhaitez désabonnez l\'utilisateur ayant sélectionné cette liste:</p>'
							+ '<div style="margin: 5px 0;border: 1px solid #CACACA;	height: 190px;	overflow: auto;"><table width="550" >';

	for (i in Groups){
  	text += '<tr><td><label class="checkbox"><input name="unsubscrib[qualif_list_publication]['+random+'][ids]['+i+']" id="unsubscrib_qualif_list_publication_'+random+'_ids_'+i+'" type="checkbox"';
  	if (ids[i] != undefined) {
  		text += 'checked="checked"';
  	}
		text += '><label for="unsubscrib_qualif_list_publication_'+random+'_ids_'+i+'">'+Groups[i]+'</label></label></td></tr>';
  }


		text+= '</table></div></div></div>';


	$("#publications_holder").append(text);
}

function checkClass(className){
	if ($("."+className).attr('checked')) {$("."+className+"er").show();}$("."+className).live("click", function(){if ($("."+className).attr('checked')) {$("."+className+"er").show();}else{$("."+className+"er").hide();}});return true;
}

/* ]]> */
</script>