<div class="page-header">
	<h1>Ajouter un utilisateur</h1>
</div>

<form class="form-horizontal" action="<?php echo url_for('@settings_add_user') ?>" method="post">

	<?php include_partial('settings/form', array('form' => $form )) ?>

</form>