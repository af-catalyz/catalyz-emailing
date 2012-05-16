	<?php $contact = $form->getObject() ?>
	<?php $title = $contact->isNew() ? __('Nouveau contact') : __('Modifier un contact existant') ?>

	<?php printf('<div class="page-header"><h1>%s</h1></div>', $title) ?>
	<?php include_partial('global/flashMessage') ?>

<form class="form-horizontal" action="<?php echo url_for('contacts/update'.(!$contact->isNew() ? '?slug='.$contact->getSlug() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
		<?php

		include_partial('contacts/form', array('form' => $form));
		printf('<div class="form-actions"><input type="submit" class="btn btn-primary" value="%s"/>&nbsp;<a href="%s" class="btn">Annuler</a></div>', __('Sauvegarder'), url_for('@contacts')); ?>


</form>