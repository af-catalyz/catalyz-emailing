<?php
/*include_partial('global/breadbrumb', array('items' => array(
	'Campagnes' => '@campaigns'
), 'active' => 'Nouvelle campagne')); */?>


 <div class="page-header"><h1>Nouvelle campagne</h1></div>
    <form class="form-horizontal">

    <div class="control-group">
    <label class="control-label" for="input01">Nom</label>
    <div class="controls">
    <input type="text" class="input-xlarge" id="input01">
    <span class="help-inline">Le nom de la campagne est utilisé pour la retrouver dans la liste de vos campagnes. <br />Seul vous pourrez consulter ce nom, il est différent de l'objet des emails qui seront envoyés à vos contacts.</span>
    </div>
    </div>

    <div class="control-group">
    <label class="control-label" for="input01">Description</label>
    <div class="controls">
    <textarea class="input-xlarge" id="input01"></textarea>
    </div>
    </div>


    <div class="tabbable tabs-left">

    <ul class="nav nav-tabs ">
    <li class="active"><a href="#1" data-toggle="tab">Modèles prédéfinis</a></li>
    <li><a href="#2" data-toggle="tab">Modèle externe</a></li>
    </ul>
    <div class="tab-content span9">
    <div class="tab-pane active" id="1">

		    <ul class="thumbnails">
			    <li class="span3">
			    <div class="thumbnail">
			    <a href="" class="thumbnail"><img src="http://placehold.it/260x180" alt=""></a>
			    <h5>Newsletter Agence Mai 2011 <span class="label label-success">Mode Assisté</span></h5>
			    </div>
			    </li>
			    <li class="span3">
			    <div class="thumbnail">
			    <a href="" class="thumbnail"><img src="http://placehold.it/260x180" alt=""></a>
			    <h5>Newsletter Agence Mai 2011</h5>
			    </div>
			    </li>
			    <li class="span3">
			    <div class="thumbnail">
			    <a href="" class="thumbnail"><img src="http://placehold.it/260x180" alt=""></a>
			    <h5>Newsletter Agence 2010</h5>
			    </div>
			    </li>

			    <li class="span3">
			    <div class="thumbnail">
			    <a href="" class="thumbnail"><img src="http://placehold.it/260x180" alt=""></a>
			    <h5>Newsletter Agence 2009</h5>
			    </div>
			    </li>


    		</ul>
    </div>
    <div class="tab-pane active" id="2">

    </div>
    </div>
    </div>

    <div class="form-actions">
    <input type="submit" value="Créer la campagne" class="btn btn-primary"/>
    <a href="<?php echo url_for('@campaigns'); ?>" class="btn">Annuler</a>
    </div>

    </form>



