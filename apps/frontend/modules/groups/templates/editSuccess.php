<?php $contact_group = $form->getObject() ?>
	<?php $title = $contact_group->isNew() ? 'Nouveau groupe de contacts' : 'Modification d\'un groupe de contacts existant' ?>

<form class="form-horizontal" action="<?php echo url_for('groups/update'.(!$contact_group->isNew() ? '?id='.$contact_group->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
	<?php echo $form->renderHiddenFields(); ?>

     <?php echo $form->renderGlobalErrors() ?>
     <div class="control-group">
			<?php printf('<label class="control-label">%s</label>', $form['name']->renderLabel()) ?>
			<div class="controls">
				<?php
      	echo $form['name'];
				echo $form['name']->renderError();
				?>
			</div>
		</div>
		<div class="control-group">
			<?php printf('<label class="control-label">%s</label>', $form['legend']->renderLabel()) ?>
			<div class="controls">
				<?php
				echo $form['legend'];
				echo $form['legend']->renderError();
				?>
			</div>
		</div>
		<div class="control-group">
			<?php printf('<label class="control-label">%s</label>', $form['color']->renderLabel()) ?>
			<div class="controls">
				<?php
				echo $form['color'];
				echo $form['color']->renderError();
				?>
			</div>
		</div>

		<div class="control-group">
       <?php printf('<label for="optionsCheckbox" class="control-label">%s</label>', $form['is_test_group']->renderLabel()) ?>
       <div class="controls">
         <label class="checkbox">
           <?php
	      	 		echo $form['is_test_group']->renderError();
							echo $form['is_test_group'];
					  ?>
           En cochant cette case,<br />vous pourrez facilement sélectionner ce groupe d'utilisateur<br />pour leur envoyer un exemplaire de test de votre campagne<br /> pendant la mise au point.
         </label>
       </div>
     </div>

     <div class="control-group">
       <?php printf('<label for="optionsCheckbox" class="control-label">%s</label>', $form['is_archived']->renderLabel()) ?>
       <div class="controls">
         <label class="checkbox">
           <?php
						echo $form['is_archived']->renderError();
						echo $form['is_archived'];
					 ?>
           En cochant cette case,<br />Le groupe ne sera plus présent des listes de contacts<br />ni des filtres de l'application.
         </label>
       </div>
     </div>

		<?php printf('<div class="form-actions"><input type="submit" class="btn btn-primary" value="%s"/>&nbsp;<a href="%s" class="btn">Annuler</a></div>', $contact_group->isNew() ?__('Ajouter le groupe'):__('Modifier le groupe'), url_for('@groups')); ?>

</form>