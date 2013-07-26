<div class="page-header">
	<h1>Modifier un utilisateur</h1>
</div>

<form action="<?php echo url_for('@settings_edit_user?id='.$user->getid()) ?>" method="post">
	<?php include_partial('settings/form', array('form' => $form )) ?>
</form>