<?php
$header_form = new CampaignHeaderForm($campaign->getRawValue());

 ?>

<div class="modal hide fade" id="dialog-edit-header">
	<form  action="<?php echo url_for('@campaign_do_edit_header?slug='.$campaign->getSlug()) ?>" method="post">
	<?php echo $header_form->renderHiddenFields() ?>
		<div class="modal-header">
			<a class="close" data-dismiss="modal">×</a>
			<h3>Modifier la campagne</h3>
		</div>
		<div class="modal-body">

		  <div class="control-group">
		  	<label class="control-label" for="input01"><?php echo $header_form['name']->renderlabel(); ?></label>
		    <div class="controls">
		    	<?php
		    echo $header_form['name'];
		    echo $header_form['name']->renderError();
		    ?>
		    </div>
		  </div>

		  <div class="control-group">
		  	<label class="control-label" for="input01"><?php echo $header_form['commentaire']->renderlabel(); ?></label>
		    <div class="controls">
		    	<?php
		  	echo $header_form['commentaire'];
		  	echo $header_form['commentaire']->renderError();
		  	?>
		    </div>
		  </div>


		</div>
		<div class="modal-footer">
			<a href="javascript://" class="btn close_tag">Annuler</a>&nbsp;<input type="submit" value="Sauvegarder" class="btn btn-primary"/>
		</div>
	</form>
</div>

<script type="text/javascript">
/* <![CDATA[ */

$(document).ready(function() {
	$('.modal-footer a.close_tag, .modal-header a').live('click',function(){
		$('.modal').modal('hide');
		$('.modal-backdrop').hide();
		return false;
	});
});

/* ]]> */
</script>