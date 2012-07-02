<div class="tabbable">
    <ul class="nav nav-tabs">
    <li ><a href="<?php echo url_for('contacts/add') ?>">Ajouter un contact</a></li>
    <li class="active"><a href="#1" data-toggle="tab">Importer des contacts</a></li>
    </ul>
    <div class="tab-content">
    <div class="tab-pane active" id="1">




    <?php printf('<p>%d contact%s existe%s déjà dans votre base de données, souhaitez-vous :</p>',$count,$count>1?'s':'',$count>1?'nt':'');?>

<form action="<?php echo url_for('contacts/importProcess') ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>


  <label class="radio">
		<input type=radio name="type" value="1" checked="checked"> Importer tous les contacts (les contacts existants seront rattachés au nouveau groupe)
	</label>
	<label class="radio">
		<input type=radio name="type" value="2"> N'importer que les nouveaux contacts
	</label>
	<div class="form-actions">
     <input class="btn btn-primary" type="submit" value="Enregistrer" />
     &nbsp;<a class="btn" href="<?php echo url_for('@contacts') ?>">annuler</a>
   </div>
</form>

	</div>
    </div>
    </div>