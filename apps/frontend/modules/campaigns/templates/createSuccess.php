<?php printf('<div class="page-header"><h1>%s</h1></div>', __('Nouvelle campagne')) ?>


<form class="form-horizontal" action="<?php echo url_for('@campaigns_handle_create') ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
	<?php echo $form->renderGlobalErrors() ?>
	<?php echo $form->renderHiddenFields() ?>

	<div class="control-group">
		<label class="control-label" for="input01">Nom</label>
		<div class="controls">
			<?php
			echo $form['name']->renderError();
			echo $form['name'];
			printf('<br/><span class="help-inline">%s</span>', __("Le nom de la campagne est utilisé pour la retrouver dans la liste de vos campagnes. <br />Seul vous pourrez consulter ce nom, il est différent de l'objet des emails qui seront envoyés à vos contacts."));
			 ?>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="input01">Description</label>
		<div class="controls">

			<?php
			echo $form['commentaire']->renderError();
			echo $form['commentaire'];
			printf('<span class="help-inline">%s</span>', __("Ce champ peut vous permettre de rajouter des annotations concernant la campagne qui ne seront utilisées que dans cette interface de gestion."));
			 ?>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label" for="input01">Modèle</label>
		<div class="controls">

		<?php echo $form['template_id']->renderError() ?>
   	<?php echo html_entity_decode($form['template_id']) ?>


		<p>Si votre modèle n'apparait pas dans la liste ci-dessus, vous pouvez l'<a href="">importer à partir d'une archive</a> ou <a href="">depuis une adresse internet</a>.</p>
		</div>
	</div>

	<div class="form-actions">
		<?php
			printf('<input class="btn btn-primary" type="submit" value="%s"/>', __('Créer la campagne'));
			printf('&nbsp;<a href="%s" class="btn">%s</a>',  url_for('@campaigns'), __('Annuler'));
		 ?>
	</div>
</form>


<script type="text/javascript">
/* <![CDATA[ */

$(document).ready(function() {
	adaptHeight();
});


//change li height to avoid floating problems
function adaptHeight(){
	var max = 0;

	//on ne prend que ceux qui sont visible(ceux du tab en cours)
	$('.top_li:visible div.thumbnail').each(function(index) {
		max = Math.max($(this).height(), max);
	});

	$('.top_li:visible div.thumbnail').height(max);
}



/* ]]> */
</script>
