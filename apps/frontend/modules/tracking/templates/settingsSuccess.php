<div class="page-header"><h1>Tracking</h1></div>

	<?php include_partial('global/flashMessage') ?>

<p>Pour activer le tracking, vous devez placer le code suivant sur les pages de votre site:</p>
<pre>
&lt;script type="text/javascript" src="<?php echo url_for('@tracking_agent', true) ?>"&gt;&lt;/script&gt;
</pre>