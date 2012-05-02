
<?php
/*include_partial('global/breadbrumb', array('items' => array(
	'Campagnes' => '@campaigns'
), 'active' => 'Copie de Copie de Invitation PtiDej de la com 13 avril - RELANCE NO'));*/
 ?>
    <div class="page-header">
    	<img src="http://placehold.it/80x60" alt="" class="pull-left" style="margin-right: 10px;" />
	    <h1>
		    Copie de Copie de Invitation PtiDej de la com 13 avril - RELANCE NO
	    	<i class="icon-question-sign"></i>
		</h1>
		<h3>
			<small>Cr&eacute;&eacute; par Emmanuelle Tandonnet, le 05/04/2012 &agrave; 10:03</small>
			<a href="" class="btn btn-mini">modifier</a>
		</h3>

	</div>

    <div class="tabbable">

    <a class="btn btn-inverse pull-right" data-toggle="modal" href="#dialog-campaign-test" accesskey="t"><u>T</u>ester la campagne</a>


    <ul class="nav nav-tabs">
    <li class="active"><a href="#1" data-toggle="tab"><i class="icon-ok"></i> Enveloppe</a></li>
    <li><a href="#2" data-toggle="tab"><i class="icon-ok"></i> Message</a></li>
    <li><a href="#3" data-toggle="tab"><i class="icon-remove"></i> Destinataires</a></li>
    <li><a href="#4" data-toggle="tab"><i class="icon-remove"></i> Validation</a></li>
    <li><a href="#5" data-toggle="tab"><i class="icon-remove"></i> Envoi</a></li>
    <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Configuration avanc&eacute;e <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#dropdown1" data-toggle="tab">Liens</a></li>
                <li><a href="#dropdown2" data-toggle="tab">Google Analytics</a></li>
                <li class="divider"></li>
                <li><a href="#dropdown2" data-toggle="tab">Return-Path</a></li>
              </ul>
            </li>
    </ul>
    <div class="tab-content">
    <div class="tab-pane active" id="1">

    <form class="form-horizontal">

	    <fieldset>
	    <legend>Sujet du message</legend>
	    <div class="control-group">
	    <div class="controls">
	    <input type="text" class="span6" id="input01">
<span class="help-inline">
	        <div class="btn-group">
    <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">
    Insérer un champ dynamique
    <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
    <li><a href="">Prénom</a></li>
    <li><a href="">Nom</a></li>
    </ul>
    </div>

</span>


	    <p class="help-block">Il est recommandé de ne pas dépasser 50 caractères en utilisant 4 à 5 mots.</p>
	    </div>

	    </div>
</fieldset>

	    <fieldset>
	    <legend>Expéditeur</legend>

	    <div class="control-group">
	    <label class="control-label" for="input01">Nom</label>
	    <div class="controls">
	    <input type="text" class="input-xlarge" id="input01">
	    </div>

	    </div>

	    <div class="control-group">
	    <label class="control-label" for="input01">Email</label>
	    <div class="controls">
		    <input type="text" class="input-xlarge" id="input01">
	    </div>
	    </div>
	    </fieldset>

	    <div class="form-actions">
		<input type="submit" value="Enregistrer" class="btn btn-primary" />
		</div>

    </form>

    </div>
    <div class="tab-pane" id="2">

        <div class="tabbable">
    <ul class="nav nav-tabs">
    <li class="active"><a href="#message1" data-toggle="tab">Contenu éditorial</a></li>
    <li><a href="#message2" data-toggle="tab">Détail de l'invitation</a></li>
    </ul>
    <div class="tab-content span9">
    <div class="tab-pane active" id="message1">
    <p>I'm in Section 1.</p>
    </div>
    <div class="tab-pane" id="message2">
    <p>Howdy, I'm in Section 2.</p>
    </div>
    </div>
    </div>

    </div>

    <div class="tab-pane" id="3"></div>
    <div class="tab-pane" id="4"></div>
    <div class="tab-pane" id="5"></div>
    <div class="tab-pane" id="6"></div>

    </div>
    </div>

    <div class="modal hide fade" id="dialog-campaign-test">
    <div class="modal-header">
    <a class="close" data-dismiss="modal">×</a>
    <h3>Tester la campagne</h3>
    </div>
    <div class="modal-body">
    	<form>

<div class="control-group">
<label class="control-label">A qui souhaitez-vous envoyer un test de cette campagne?</label>
<div class="controls">
<label class="radio">
	<input id="optionsRadios1" type="radio" checked="" value="option1" name="optionsRadios">
	Vous (sh@catalyz.fr>
</label>
<label class="radio">
	<input id="optionsRadios1" type="radio" checked="" value="option1" name="optionsRadios">
	Aux utilisateurs des groupes de test (Testeurs)
</label>
<label class="radio">
	<input id="optionsRadios1" type="radio" checked="" value="option1" name="optionsRadios">
	Aux adresses emails suivantes:
	<textarea class="input-xlarge"></textarea>
</label>
</div>
</div>
		</form>

    </div>
    <div class="modal-footer">
    <a href="#" class="btn">Annuler</a>
    <a href="#" class="btn btn-primary">Tester la campagne</a>
    </div>
    </div>

