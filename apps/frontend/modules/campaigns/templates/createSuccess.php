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

    <div class="control-group">
    <label class="control-label" for="input01">Modèle</label>
    <div class="controls">



		    <ul class="thumbnails">
			    <li class="span3">
			    <div class="thumbnail">
			    <a href="" class="thumbnail"><img src="http://placehold.it/260x180" alt=""></a>
			    <h5><input type="radio" checked="checked" /> Newsletter Agence Mai 2011 <span class="label label-success pull-right">Mode Assisté</span></h5>
			    <div style="clear:both"></div>
			    </div>
			    </li>
			    <li class="span3">
			    <div class="thumbnail">
			    <a href="" class="thumbnail"><img src="http://placehold.it/260x180" alt=""></a>
			    <h5><input type="radio" /> Newsletter Agence Mai 2011</h5>
			    </div>
			    </li>
			    <li class="span3">
			    <div class="thumbnail">
			    <a href="" class="thumbnail"><img src="http://placehold.it/260x180" alt=""></a>
			    <h5><input type="radio" /> Newsletter Agence 2010</h5>
			    </div>
			    </li>
</ul>

		    <ul class="thumbnails">
			    <li class="span3">
			    <div class="thumbnail">
			    <a href="" class="thumbnail"><img src="http://placehold.it/260x180" alt=""></a>
			    <h5><input type="radio" /> Newsletter Agence 2009</h5>
			    </div>
			    </li>



</ul>
			    <p>Si votre modèle n'apparait pas dans la liste ci-dessus, vous pouvez l'<a href="">importer à partir d'une archive</a> ou <a href="">depuis une adresse internet</a>.</p>
    </div>
    </div>

    <div class="form-actions">
    <input type="submit" value="Créer la campagne" class="btn btn-primary"/>
    <a href="<?php echo url_for('@campaigns'); ?>" class="btn">Annuler</a>
    </div>

    </form>



