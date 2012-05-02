
<div style="text-align:center;">
<?php echo link_to(image_tag('logo.png'), '@homepage'); ?>
</div>

<?php if($sf_request->hasParameter('error')): ?>
    <div class="span5 offset3 alert alert-error">
    <a class="close" data-dismiss="alert">×</a>
    <h4 class="alert-heading">Erreur de connexion!</h4>
    Ces informations ne permettent pas de vous identifier, essayez à nouveau...
    </div>
<?php endif; ?>
<div class="span3 offset4">


	<form>
<div class="well">
		<div class="control-group">
			<label class="control-label">Identifiant</label>
			<div class="controls">
				<input type="text" class="input-large" />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Mot de passe</label>
			<div class="controls">
				<input type="password" class="input-large" />
			</div>
				<label class="checkbox">
					<input id="optionsCheckbox" value="option1" type="checkbox">
					Me laisser connect&eacute;
				</label>
		</div>
		<div>
		<a href="?error" class="btn btn-primary">Connexion &raquo;</a>
		</div>

</div>
	</form>

</div>

<!--
<div style="clear: both">
<?php for ($i = 0; $i < 11; $i++) {
	printf('<div class="span1" style="border: 1px solid #cacaca; height: 10px"></div>');
} ?>
</div>

-->