<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>


    <!-- Le styles -->
    <style>
      body {
	padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
}
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
   <!--[if lt IE 9]>
		<script src="/js/html5.js"></script>
    <![endif]-->


    <!-- Le fav and touch icons
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
    -->
  </head>

  <body>
   	<?php include_partial('global/header'); ?>
	<div class="container">
		<?php echo $sf_content ?>
		<div style="clear: both"></div>
	    <footer>
	    <hr style="margin-bottom: 0px;" />
	      <p class="pull-right"><small>Copyright &copy; 2010 - <?php echo date('Y'); ?> <a href="http://www.catalyz.fr/" target="_blank">Catalyz EURL</a> - Tous droits réservés</small></p>
	    </footer>
	</div> <!-- /container -->

  </body>
</html>