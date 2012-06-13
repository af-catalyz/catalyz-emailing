<?php include_partial('global/header'); ?>
    <div class="container">

    <div class="row">
    <div class="span7">
	    <div class="hero-unit">
	    <h1>Bienvenue !</h1>
	    <p>dans la nouvelle version de Catalyz Emailing</p>
	    <a class="btn btn-primary btn-large" href="<?php echo url_for('@campaigns_do_create'); ?>">Créer une campagne</a>

	    <a class="btn btn-large" href="<?php echo url_for('contact/create'); ?>">Ajouter des contacts</a>
	    </div>
    </div>


    <div class="well span4">
    	<div>
	    	<?php printf('<img src="http://www.gravatar.com/avatar/%s?s=60&amp;d=mm" class="pull-left" style="margin-right: 10px;" />', md5('emmanuelle.tandonnet@gmail.com')); ?>
    		<h4>Emmanuelle Tandonnet</h4>
    		<p>Référente commerciale - 05 63 66 71 52</p>
   			<p><a href="mailto:emmanuelle.tandonnet@gmail.com"><i class="icon-envelope"></i> emmanuelle.tandonnet@gmail.com</a></p>
		</div>
		<div>
	    	<?php printf('<img src="http://www.gravatar.com/avatar/%s?s=60&amp;d=mm" class="pull-left" style="margin-right: 10px;" />', md5('shordeaux@waterproof.fr')); ?>
    		<h4>Sébastien Hordeaux</h4>
    		<p>Référent technique - 05 63 66 96 27</p>
   			<p><a href="mailto:sh@catalyz.fr"><i class="icon-envelope"></i> sh@catalyz.fr</a></p>
		</div>

    	<a class="btn btn-primary" href="mailto:support@catalyz.fr">Contacter le support technique</a>

    </div>
   </div>

    <div class="row">

	    <div class="well span3">
	    	<h3>Boite dynamique 1</h3>
	    	<p>Info dernières campagnes</p>
	    </div>

	    <div class="well span3">
	    	<h3>Boite dynamique 2</h3>
	    	<p>Info qualité contacts</p>

	    </div>

		<div class="well span3">
	    	<h3>Boite dynamique 3</h3>
	    	<p>Nouveauté produit</p>
	    </div>

    </div>


	</div> <!-- /container -->