    <?php include_partial('campaign/header',array('campaign' => $campaign)) ?>



    <?php $othersCampaigns = $form->getLastCampaigns() ?>



    <div class="tab-content">
	    <div class="tab-pane active" id="1">

	    	<form  class="form-horizontal" action="<?php echo url_for('@campaign_index?slug='.$campaign->getSlug()) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php echo $form->renderHiddenFields() ?>
	    <fieldset>
	    <legend><?php echo __('Objet du message') ?></legend>
	    <div class="control-group">
	    <div class="controls">
	    <?php
    		echo $form['subject'];
    		echo $form['subject']->renderError();
    	?>

<?php

//region customFields
printf('<span class="help-inline"><div class="btn-group"><a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">%s<span class="caret"></span></a><ul class="dropdown-menu">', __('Insérer une valeur dynamique'));
$defaultFields = array();
$defaultFields['FIRSTNAME'] = __('Prénom');
$defaultFields['LASTNAME'] = __('Nom');
$defaultFields['COMPANY'] = __('Société');
$defaultFields['EMAIL'] = __('Email');

foreach ($defaultFields as $fieldName => $caption){
	printf('<li><a class="listen_dynamic_field" href="javascript://" rel="#%s#">%s</a></li>', strtoupper($fieldName), $caption);
}

$customFields = CatalyzEmailing::getCustomFields();
if (!empty($customFields)){
	foreach ($customFields as $fieldName => $caption){
		printf('<li><a class="listen_dynamic_field" href="javascript://" rel="#%s#">%s</a></li>', strtoupper($fieldName), $caption);
	}
}


echo '</ul></div></span>';

//endregion


 ?>

		<?php if (!empty($othersCampaigns['titles'])) {
			printf('<p class="help-block">%s</p><ul>', __('Vous avez utilisé les objets suivants dans vos campagnes précédentes :'));
			foreach ($othersCampaigns['titles'] as $caption){
				printf('<li><span>%s</span> <a href="javascript://" class="btn btn-mini listen_titles">%s</a></li>', $caption, __('Réutiliser'));
			}
			echo '</ul>';
		} ?>

	    </div>

	    </div>
</fieldset>

	    <fieldset>
	    <legend><?php echo __('Expéditeur') ?></legend>

	    <div class="control-group">
	    <label class="control-label" for="input01"><?php echo $form['from_name']->renderlabel(); ?></label>
	    <div class="controls">
	    	<?php
		    	echo $form['from_name'];
		    	echo $form['from_name']->renderError();
		    ?>

	    </div>

	    </div>

	    <div class="control-group">
	    <label class="control-label" for="input01"><?php echo $form['from_email']->renderlabel(); ?></label>
	    <div class="controls">
	    	<?php
			    echo $form['from_email'];
			    echo $form['from_email']->renderError();
		    ?>

	    </div>
	    </div>
	    </fieldset>

	  <?php if (!empty($othersCampaigns['expediteurs'])) {
	  	printf('<div class="control-group"><div class="controls"><p class="help-block">%s</p><ul>', __('Vous avez utilisé les expediteurs suivants dans vos campagnes précédentes:'));
	  	foreach ($othersCampaigns['expediteurs'] as $caption => $expediteurDetails){
	  		printf('<li>%s <a href="javascript://"%s%s class="btn btn-mini listen_expediteurs">%s</a></li>', $caption,
	  			!empty($expediteurDetails['email'])?sprintf(' rel="%s"', $expediteurDetails['email']):'' ,
	  			!empty($expediteurDetails['name'])?sprintf(' name="%s"', $expediteurDetails['name']):'' ,
	  			 __('Réutiliser'));
	  	}
	  	echo '</ul></div></div>';
	  } ?>

	    <div class="form-actions">
		<input type="submit" value="Enregistrer" class="btn btn-primary" />
		</div>

    </form>


    <script type="text/javascript">
    /* <![CDATA[ */

$(document).ready(function() {
	$(".listen_titles").live("click", function(){
		$("#campaign_subject").val($(this).parent('li').find('span').text());
		return true;
	});

	$(".listen_dynamic_field").live("click", function(){
		var val = $("#campaign_subject").val();
		$("#campaign_subject").val(val+ ' '+$(this).attr('rel'));
		return true;
	});

	$(".listen_expediteurs").live("click", function(){
		var email = $(this).attr('rel');
		var name = $(this).attr('name');

		if (email != undefined) {
			$("#campaign_from_email").val(email);
		}

		if (name != undefined) {
			$("#campaign_from_name").val(name);
		}

		return true;
	});

});

    /* ]]> */
    </script>



	    </div>
	    <div class="tab-pane" id="2">
				<?php include_component('campaign', 'message',array('campaign' => $campaign)) ?>
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
			<div class="tab-pane" id="9">
				<?php include_component('campaign', 'scheduling',array('campaign' => $campaign)) ?>
			</div>
    </div>
    </div>

