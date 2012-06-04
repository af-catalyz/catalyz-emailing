<?php

$test_form = new CampaignTestForm();



?>

<div class="modal hide fade" id="dialog-campaign-test">
	<form action="" method="post" >
	<div class="modal-header">
		<a class="close" data-dismiss="modal">×</a>
		<h3>Tester la campagne</h3>
	</div>
	<div class="modal-body">

		<?php echo $test_form->renderHiddenFields() ?>

			<div class="control-group">
				<label class="control-label">A qui souhaitez-vous envoyer un test de cette campagne?</label>
				<div class="controls">
					<label class="radio">
						<input id="campaign_test_type_0" checked="checked" type="radio" value="0" name="campaign[test_type]">
						Vous (<?php echo $sf_user->getProfile()->getEmail() ?>)
					</label>
					<label class="radio">
						<input id="campaign_test_type_1" type="radio" value="1" name="campaign[test_type]">
						Aux utilisateurs des groupes de test (Testeurs)
					</label>
					<label class="radio">
						<input id="campaign_test_type_2" type="radio" value="2" name="campaign[test_type]">
						Aux adresses emails suivantes:
						<?php echo $test_form['test_user_list'] ?>
						<span class="help-block hint">Vous pouvez séparer les adresses emails par des virgules ou des point-virgule.<br /><br />Exemple:<br />
mickey@catalyz.fr, donald@catalyz.fr, pluto@catalyz.fr </span>
					</label>
				</div>
			</div>

	</div>
	<div class="modal-footer">
		<a href="javascript://" class="btn close_tag">Annuler</a>
		<a href="javascript://" id="test" class="btn btn-primary">Tester la campagne</a>
	</div>
	</form>
</div>


<script type="text/javascript">
/* <![CDATA[ */

$("#test").live("click", function(){
	$.post('<?php echo url_for('@campaign_do_test?slug='.$campaign->getSlug()) ?>', $('form').serialize(), function(data){
		$('#feedback').html(data);
	}, 'html');
});









/* ]]> */
</script>