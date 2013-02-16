<div class="page-header"><h1>Modifier une page d'atterrissage</h1></div>

<form class="form-horizontal" method="post" action="<?php echo url_for('@landing_update').'?id='.$form->getObject()->getId(); ?>">

<?php include_partial('landing/form', array('form' => $form)); ?>


<div class="form-actions">
	<input class="btn btn-primary" type="submit" value="Sauvegarder">
	<a class="btn" href="<?php echo url_for('@landing') ?>">Annuler</a>
</div>

</form>