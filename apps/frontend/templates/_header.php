<?php //var_dump($sf_context->getModuleName()) ?>
<div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="<?php echo url_for('@homepage'); ?>">Catalyz Emailing</a>
          <div class="nav-collapse">
            <ul class="nav">
		    	<li class="divider-vertical"></li>
             <li<?php if($sf_context->getModuleName() == 'homepage'){echo ' class="active"';}?>><a href="<?php echo url_for('@homepage'); ?>">Accueil</a></li>
             <li class="dropdown<?php if(in_array($sf_context->getModuleName(), array('campaigns', 'campaign'))){echo ' active';}?>">

		    		<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		    			Campagnes<b class="caret"></b>
		    		</a>
			    	<ul class="dropdown-menu">
			    		<li><a href="<?php echo url_for('@campaigns_create'); ?>">Créer une campagne</a></li>
				    	<li><a href="<?php echo url_for('@campaigns'); ?>" class="nav-header">Campagnes en préparation</a></li>
			    		<li><a href="<?php echo url_for('@campaign_index?slug=campaign-1'); ?>">Campagne 1</a></li>
			    		<li><a href="#">Campagne 2</a></li>
			    		<li><a href="#">Campagne 3</a></li>
			    		<li><a href="<?php echo url_for('@campaign_index?slug=campaign-1'); ?>">Copie de Copie de Invitation PtiDej de la com 13 avril - RELANCE NO</a></li>
				    	<li><a href="<?php echo url_for('@campaigns?type=2'); ?>" class="nav-header">Campagnes envoyées</a></li>
			    		<li><a href="<?php echo url_for('@campaign_index?slug=campaign-1'); ?>">Campagne 1</a></li>
			    		<li><a href="<?php echo url_for('@campaigns?type=3'); ?>" class="nav-header">Campagnes archivées</a></li>
				    	<li class="divider"></li>
			    		<li><a href="#">Gestion des modèles de campagnes</a></li>
			    	</ul>
		    	</li>
              <li<?php if($sf_context->getModuleName() == 'contacts'){echo ' class="active"';}?>><a href="<?php echo url_for('@contacts'); ?>">Contacts</a></li>
    		<li<?php if($sf_context->getModuleName() == 'fees'){echo ' class="active"';}?>><a href="<?php echo url_for('fees/index'); ?>">Routage</a></li>
     		  <li class="dropdown<?php if(in_array($sf_context->getModuleName(), array('settings'))){echo ' active';}?>"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
		    			Configuration
		    			<b class="caret"></b>
		    		</a>
			    	<ul class="dropdown-menu">
			    		<li><a href="<?php echo url_for('@settings'); ?>">Utilisateurs</a></li>
			    		<li><a href="<?php echo url_for('@settings'); ?>">Champs personnalisés</a></li>
			    		<li><a href="<?php echo url_for('@settings'); ?>">Processus de désabonnement</a></li>
			    	</ul></li>

            </ul>
		    <?php
		    if ($sf_user->isAuthenticated()):
					$profile = /*(sfGuardUserProfile)*/ $sf_user->getGuardUser()->getProfile();




				 ?>
				<ul class="nav pull-right">
		    	<li class="dropdown">
		    		<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		    			<i class="icon-user  icon-white"></i>
		    			<?php printf('%s', $profile->getFullName()); ?>
		    			<b class="caret"></b>
		    		</a>
			    	<ul class="dropdown-menu">
			    		<li><a href="#"><i class="icon-cog"></i> Préférences</a></li>
			    		<li class="divider"></li>
			    		<li><a href="<?php echo url_for('@sf_guard_signout') ?>"><i class="icon-off"></i> Se d&eacute;connecter</a></li>
			    	</ul>
		    	</li>
		    </ul>
		    <?php endif ?>
            </div><!--/.nav-collapse -->

        </div>
      </div>
    </div>