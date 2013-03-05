<div class="page-header">
	<h1>Exporter les statistiques des campagnes</h1>
</div>


<?php include_partial('global/flashMessage') ?>
<form id="export_form" class="form-horizontal" action="<?php echo url_for('@campaigns_export') ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

		<table>
			<tr>
				<td>
					<a href="javascript://" id="listen_all">toutes</a> /
					<a href="javascript://" id="listen_none">aucune</a>
				</td>
			</tr>
			<tr>
				<td>
					<?php echo $form['campaigns']->renderError() ?>
					<?php echo $form['campaigns'] ?>
				</td>
			</tr>
			<tr>
				<td>
					<?php echo $form['type'] ?>
				</td>
			</tr>
		</table>

	<div class="form-actions">
		<?php
			echo $form->renderHiddenFields(true);
			printf('<input class="btn btn-primary" type="submit" value="%s"/>', __('Exporter'));
		  printf('&nbsp;<a href="%s" class="btn">%s</a>',  url_for('@campaigns'), __('Annuler'));
		?>
	</div>
</form>

<script type="text/javascript">
/* <![CDATA[ */

$(document).ready(function() {
	$("#listen_all").live("click", function() {
		$(".checkbox_list :checkbox").attr('checked', true);
		return false;
	});

	$("#listen_none").live("click", function() {
		$(".checkbox_list :checkbox").attr('checked', false);
		return false;
	});
});

/* ]]> */
</script>