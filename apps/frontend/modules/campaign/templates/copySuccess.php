<?php printf('<div class="page-header"><h1>%s</h1></div>', __("Création d'une nouvelle campagne à partir d'une campagne existante")) ?>

<form class="form-horizontal" action="<?php echo url_for('@campaign_handle_copy') ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
	<?php echo $form->renderHiddenFields() ?>
	<?php echo $form->renderGlobalErrors() ?>

	<div class="control-group">
		<label class="control-label" for="input01"><?php echo $form['name']->renderLabel() ?></label>
		<div class="controls">
			<?php echo $form['name']->renderError() ?>
	    <?php echo $form['name'] ?>
			<br/>
			<?php printf('<span class="help-inline">%s</span>', __("Le nom de la campagne est utilisé pour la retrouver dans la liste de vos campagnes.<br />Seul vous pourrez consulter ce nom, il est différent de l'objet des emails qui seront envoyés à vos contacts.")) ?>
		</div>
	</div>


	<div class="form-actions">
	<?php
	printf('<input type="submit" class="btn btn-primary" value="%s">', __('Créer la campagne'));
	printf('<a class="btn" href="%s">%s</a>', url_for('@campaigns'), __('Annuler'));
	?>
	</div>

</form>