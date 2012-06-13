<div class="tabbable">
    <ul class="nav nav-tabs">
    <li ><a href="<?php echo url_for('contacts/add') ?>">Ajouter un contact</a></li>
    <li class="active"><a href="#1" data-toggle="tab">Importer des contacts</a></li>
    <!--li><a href="#3" data-toggle="tab">processus d'importation</a></li-->
    </ul>
    <div class="tab-content">
    <div class="tab-pane active" id="1">

       <form class="form-horizontal">

    <div class="control-group">
            <label class="control-label" for="fileInput">Fichier à importer</label>
            <div class="controls">
              <input class="input-file" id="fileInput" type="file">
            </div>
          </div>

    <div class="form-actions">
    	<a href="<?php echo url_for('contacts/importStep') ?>" class="btn btn-primary">Importer le fichier</a>
    	<?php printf('&nbsp;<a href="%s" class="btn">Annuler</a>', url_for('@contacts')); ?>
	</div>
    </form>

    </div>


    </div>
    </div>