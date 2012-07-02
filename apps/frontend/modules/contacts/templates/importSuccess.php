<div class="tabbable">
	<ul class="nav nav-tabs">
		<li ><a href="<?php echo url_for('contacts/add') ?>">Ajouter un contact</a></li>
		<li class="active"><a href="#1" data-toggle="tab">Importer des contacts</a></li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="1">

			<?php
			include_partial('global/flashMessage');


			$customFields = CatalyzEmailing::getCustomFields();
		$range = '4 colonnes';
if (!empty($customFields)) {
	$range = sprintf('entre 4 et %s colonnes', 4+count($customFields));
}
printf('<p>Votre fichier excel doit comporter %s comme dans l\'exemple ci dessous:</p>', $range);
?>

<table class="table table-striped table-condensed">
<tr>
	<th>Prénom</th>
	<th>Nom</th>
	<th>Société</th>
	<th>Email</th>
	<?php
		foreach ($customFields as $key => $value){
			printf('<th>%s (optionnel)</th>', $value);
		}
	?>
</tr>
<tr>
	<td>Jean</td>
	<td>Dupont</td>
	<td>Entreprise 1</td>
	<td>jean.dupont@catalyz.fr</td>
	<?php
		foreach ($customFields as $key => $value){
			echo '<td>...</td>';
		}
		?>
</tr>
<tr>
	<td>Marie</td>
	<td>Durand</td>
	<td>Entreprise 2</td>
	<td>marie.durand@catalyz.fr</td>
	<?php
		foreach ($customFields as $key => $value){
			echo '<td>...</td>';
		}
		?>
</tr>
</table>

<a class="btn pull-right" href="<?php echo url_for('contact_do_export_sample') ?>">télécharger un fichier d'exemple</a>
<p>La première ligne du fichier est considérée comme une ligne d'en-tête et ne sera pas importée.</p>

<hr/>

<?php
$errors = $form->getErrorSchema();
 ?>



			<form class="form-horizontal" action="<?php echo url_for('contacts/contactInDb') ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>


				<?php

				$class = '';
if (!empty($errors['scheduled_at'])) {
	$class = ' error';
}

		printf('<div class="control-group%s">', $class);
				 ?>
					<label class="control-label"><?php echo $form['file']->renderLabel() ?></label>
					<div class="controls">
						<?php
							echo $form['file'];
							echo $form['file']->renderError();
						?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?php echo $form['operation']->renderLabel() ?></label>
					<div class="controls">
						<?php
							echo $form['operation'];
							echo $form['operation']->renderError();
						?>
					</div>
				</div>

				<?php echo $form->renderHiddenFields(); ?>

				<div class="form-actions">
					<?php printf('<input type="submit" class="btn btn-primary" value="%s"/>&nbsp;&nbsp;<a href="%s" class="btn">Annuler</a>', __('Importer le fichier'),url_for('@contacts')); ?>
				</div>
			</form>

		</div>


	</div>
</div>

<script type="text/javascript">
/* <![CDATA[ */

	$(document).ready(function() {
		$("#contact_import_new_group").live("focus", function(){
			$('#contact_import_operation_2').attr('checked','checked')
		});
		$("#contact_import_is_test_group").live("change", function(){
			$('#contact_import_operation_2').attr('checked','checked')
		});

		$('.listenGroups input:checkbox').live("change", function(){
			$('#contact_import_operation_3').attr('checked','checked')
		});
	});


//	#contact_import_new_group -> #contact_import_operation_2
//	contact_import_new_group -> #contact_import_operation_3

/* ]]> */
</script>