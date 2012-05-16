      <!--div class="alert alert-danger">
    <a class="close" data-dismiss="alert">×</a>
    <h4 class="alert-heading">Un contact existe déjà avec l'email sh@catalyz.fr</h4>
    <p>Votre base de données ne peut pas contenir deux contacts différents avec la même adresse email.</p>
    <a href="" class="btn btn-danger">Modifier le contact existant</a>

    </div-->



	<?php $contact = $form->getObject() ?>
	<?php $title = $contact->isNew() ? __('Nouveau contact') : __('Modifier un contact existant') ?>

	<?php printf('<div class="page-header"><h1>%s</h1></div>', $title) ?>

<form class="form-horizontal" action="<?php echo url_for('contact/update'.(!$contact->isNew() ? '?id='.$contact->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<fieldset>
	<legend>Informations principales</legend>

	<div class="span5">
		<div class="control-group">
			<?php printf('<label class="control-label">%s</label>', $form['first_name']->renderLabel()) ?>
			<div class="controls">
				<?php
					echo $form['first_name'];
					echo $form['first_name']->renderError();
				 ?>
			</div>
		</div>
		<div class="control-group">
			<?php printf('<label class="control-label">%s</label>', $form['last_name']->renderLabel()) ?>
			<div class="controls">
				<?php
					echo $form['last_name'];
					echo $form['last_name']->renderError();
				 ?>
			</div>
		</div>
		<div class="control-group">
			<?php printf('<label class="control-label">%s</label>', $form['email']->renderLabel()) ?>
			<div class="controls">
				<?php
					echo $form['email'];
					echo $form['email']->renderError();
				 ?>
			</div>
		</div>
		<div class="control-group">
			<?php printf('<label class="control-label">%s</label>', $form['company']->renderLabel()) ?>
			<div class="controls">
				<?php
					echo $form['company'];
					echo $form['company']->renderError();
				 ?>
			</div>
		</div>
	</div>

	<div class="span5">
		<div class="control-group">
			<?php printf('<label class="control-label">%s</label>', $form['contact_contact_group_list']->renderLabel()) ?>
			<div class="controls">
				<?php
					echo $form['contact_contact_group_list'];
					echo $form['contact_contact_group_list']->renderError();
				 ?>

				<label class="checkbox"><input type="checkbox"> <span class="label label-success">Salariés (d'entreprises clientes)</span> <a href="" class="" rel="popover" title="description du groupe"><i class="icon-question-sign"></i></a></label>
				<label class="checkbox"><input type="checkbox"> <span class="label label-success">P'tit Dej de Janvier - Relance</span></label>
				<label class="checkbox"><input type="checkbox"> <span class="label">Fournisseurs (potentiels)</span></label>
				<label class="checkbox"><input type="checkbox"> <span class="label">Réseau</span></label>
				<label class="checkbox"><input type="checkbox"> <span class="label">Etude marché</span></label>
			</div>
		</div>
	</div>

</fieldset>

<fieldset>
	<legend>Informations complémentaires</legend>
	<?php for ($i = 0; $i < 10; $i++) : ?>

	<div class="span5">
		<div class="control-group">
			<label class="control-label">Champ n°<?php echo $i+1; ?></label>
			<div class="controls">
				<input class="input-xlarge" />
			</div>
		</div>
	</div>
	<?php endfor; ?>
</fieldset>


		<?php
			printf('<div class="form-actions"><input type="submit" class="btn btn-primary" value="%s"/>&nbsp;<a href="%s" class="btn">Annuler</a></div>', __('Sauvegarder'), url_for('@contacts'));
		 ?>


</form>