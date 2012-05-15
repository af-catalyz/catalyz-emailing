    	<?php

    	$campaign = $campaign->getRawValue();

    		//region header
    		echo '<div class="page-header">';

    		$picture_src = 'http://placehold.it/80x60';
    		if ($campaign->getCampaignTemplate()->getPreviewFilename() && is_file(sfConfig::get('sf_web_dir').$campaign->getCampaignTemplate()->getPreviewFilename())) {
    			$picture_src = thumbnail_path($campaign->getCampaignTemplate()->getPreviewFilename(), 80, 60);
    		}

    		printf('<img src="%s" alt="" class="pull-left" style="margin-right: 10px;" />', $picture_src);
    		printf('<h1>%s%s</h1>', $campaign->getName(), html_entity_decode($campaign->getCommentPopup()));

    		printf('<h3><small>Cr&eacute;&eacute; %s le %s</small>&nbsp;<a href="javascript://" class="btn btn-mini">modifier</a></h3>',
    			$campaign->getsfGuardUserProfile()?sprintf('par %s',$campaign->getsfGuardUserProfile()->getFullName()):'',
    			CatalyzDate::formatShortWithTime(strtotime($campaign->getCreatedAt()))
    			);

    		echo '</div>';
    		//endregion
			 ?>


    <div class="tabbable">

    <a class="btn btn-inverse pull-right" data-toggle="modal" href="#dialog-campaign-test" accesskey="t"><u>T</u>ester la campagne</a>

    <ul class="nav nav-tabs">
	    <li class="active"><a href="#1" data-toggle="tab"><i class="icon-ok"></i> Enveloppe</a></li>
	    <li><a href="#2" data-toggle="tab"><i class="icon-ok"></i> Message</a></li>
	    <li><a href="#3" data-toggle="tab"><i class="icon-remove"></i> Liens</a></li>
	    <li><a href="#4" data-toggle="tab"><i class="icon-remove"></i> Google Analytics</a></li>
	    <li><a href="#5" data-toggle="tab"><i class="icon-remove"></i> Anti-spam</a></li>
	    <li><a href="#6" data-toggle="tab"><i class="icon-remove"></i> Contrôle visuel</a></li>
	    <li><a href="#7" data-toggle="tab"><i class="icon-remove"></i> Destinataires</a></li>
	    <li><a href="#8" data-toggle="tab"><i class="icon-remove"></i> Gestion des erreurs</a></li>
	    <li><a href="#9" data-toggle="tab"><i class="icon-remove"></i> Envoi</a></li>
    </ul>

    <?php include_partial('global/flashMessage') ?>

    <div class="tab-content">
	    <div class="tab-pane active" id="1">
	    	<?php include_component('campaign', 'enveloppe',array('campaign' => $campaign)) ?>
	    </div>
	    <div class="tab-pane" id="2">
				<?php include_component('campaign', 'message',array('campaign' => $campaign)) ?>
	    </div>
	    <div class="tab-pane" id="3">
	    	<?php include_component('campaign', 'links',array('campaign' => $campaign)) ?>
			</div>
			<div class="tab-pane" id="4">
				<?php include_component('campaign', 'googleAnalytics',array('campaign' => $campaign)) ?>
			</div>
			<div class="tab-pane" id="5">
				<?php include_component('campaign', 'antiSpam',array('campaign' => $campaign)) ?>
			</div>
			<div class="tab-pane" id="6">
				<?php include_component('campaign', 'visualControls',array('campaign' => $campaign)) ?>
			</div>
			<div class="tab-pane" id="7">
				<?php include_component('campaign', 'targets',array('campaign' => $campaign)) ?>
			</div>
			<div class="tab-pane" id="8">
				<?php include_component('campaign', 'returnErrors',array('campaign' => $campaign)) ?>
			</div>
			<div class="tab-pane" id="9">
				<?php include_component('campaign', 'scheduling',array('campaign' => $campaign)) ?>
			</div>
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