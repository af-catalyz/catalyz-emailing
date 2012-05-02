<?php

//use_javascript('http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js', 'first');

use_javascript('http://code.highcharts.com/highcharts.js');
use_javascript('http://code.highcharts.com/modules/exporting.js');


?>
    <div class="page-header">
    	<img src="http://placehold.it/80x60" alt="" class="pull-left" style="margin-right: 10px;" />
	    <h1>
		    Copie de Copie de Invitation PtiDej de la com 13 avril - RELANCE NO
	    	<i class="icon-question-sign"></i>
		</h1>
		<h3>
			<small>Cr&eacute;&eacute; par Emmanuelle Tandonnet,
				le 05 avril 2012 &agrave; 10:03,
				envoy&eacute;e le 06 avril 2012 &agrave; 10:03
			</small>

		</h3>

	</div>
	<!--
<div class="btn-group">
<a class="btn dropdown-toggle btn-mini" data-toggle="dropdown" href="#">
    s&eacute;lectionner une autre campagne
    <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
    <li><a href="">Campagne 1</a></li>
    <li><a href="">Campagne 2</a></li>
    <li><a href="">Campagne 3</a></li>
    <li><a href="">Campagne 4</a></li>
    </ul>
    </div>
    <br />
    <br />
    <br />
    -->
    <div class="tabbable">

        <a class="btn pull-right" data-toggle="modal" href="#dialog-campaign-test">Créer une relance</a>


    <ul class="nav nav-tabs">
    <li class="active"><a href="#1" data-toggle="tab">Vue d'ensemble </a></li>
    <li><a href="#8" data-toggle="tab">Cibles</a></li>
    <li><a href="#2" data-toggle="tab">Ouvertures</a></li>
    <li><a href="#3" data-toggle="tab">Clics</a></li>
    <li><a href="#4" data-toggle="tab">D&eacute;sinscriptions</a></li>
    <li><a href="#5" data-toggle="tab">Erreurs</a></li>
    <li><a href="#6" data-toggle="tab">Configuration des destinataires</a></li>
    <li><a href="#7" data-toggle="tab">Message</a></li>
</ul>
    <div class="tab-content">
    <div class="tab-pane active" id="1">

<div class="span2 well">
	    <center>
	    	<h1><a href="">388</a></h1>
	    	contacts cibl&eacute;s

	    	<br />
	    	<br />
    	</center>
	</div>

    <div class="span2 well alert-info">
	    <center>
	    	<h1><a href="">57</a></h1>
	    	ouvertures
	    	<br />(52.3%)
    	</center>
	</div>

    <div class="span2 well alert-success">
	    <center>
	    	<h1><a href="">0</a></h1>
	    	clics
	    	<br />(0.0%)
    	</center>
	</div>

    <div class="span1 well alert-danger">
	    <center>
	    	<h1><a href="">1</a></h1>
	    	désinscription
	    	<br />(0.3%)
    	</center>
	</div>

	<div class="span1 well alert-danger">
	    <center>
	    	<h1><a href="">9999</a> </h1>
	    	erreur
	    	<br />(0.3%)
    	</center>
	</div>


<div style="clear: both;"></div>


<div class="span2 well">
	    <center>
	    	<h2>15.1%</h2>
	    	taux d'ouverture <u class="icon-question-sign"></u>
    	</center>
	</div>

<div class="span2 well">
	    <center>
	    	<h2>1.2%</h2>
	    	taux de clics <u class="icon-question-sign"></u>
    	</center>
	</div>

<div class="span2 well">
	    <center>
	    	<h2>3.8%</h2>
	    	taux de réactivité <u class="icon-question-sign"></u>
    	</center>
	</div>

<div style="clear: both;"></div>
    <p>Vous pouvez <a href="<?php echo url_for('statistics/compare'); ?>">comparer les performances de cette campagne avec vos campagnes précédentes</a>.</p>


    </div>
    <div class="tab-pane" id="2">
	<div id="graph" style="width: 940px; height: 400px;"></div>


    </div>
    <div class="tab-pane" id="3">contenu clics</div>
    <div class="tab-pane" id="4">contenu désinscriptions</div>
    <div class="tab-pane" id="5">contenu erreurs</div>
    <div class="tab-pane" id="6">contenu configuration destinataires</div>
    <div class="tab-pane" id="8">contenu cibles</div>
<div class="tab-pane" id="7">


<form class="form form-horizontal">

           <div class="control-group">
            <label class="control-label">De</label>
            <div class="controls">
              <span class="uneditable-input" style="width: 100%">Invitation petit déjuener de la com &lt;kreactiv@catalyz-emailing.com&gt;</span>
            </div>
            </div>

           <div class="control-group">
            <label class="control-label">Répondre à</label>
            <div class="controls">
              <span class="uneditable-input" style="width: 100%">emmanuelle.tandonnet@gmail.com</span>
            </div>
            </div>

<div class="control-group">
            <label class="control-label">Sujet</label>
            <div class="controls">
              <span class="uneditable-input" style="width: 100%">Invitation petit déjuener de la com</span>
            </div>
            </div>

           <div class="control-group">
            <label class="control-label">Corps</label>
            <div class="controls">
              <span class="uneditable-input" style="width: 100%">Invitation petit déjuener de la com</span>
            </div>
            </div>

</form>

    </div>    </div>
    </div>





<script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'graph',
                type: 'column'
            },
            title: {
                text: 'Performance de votre campagne au cours du temps'
            },
/*
            subtitle: {
                text: 'Source: WorldClimate.com'
            },
*/
            xAxis: {
                categories: ['h+6', 'h+12', 'h+18', 'h+24', 'h+30', 'h+36', 'h+42']
            },
            yAxis: {
                title: {
                    text: 'Contacts'
                }/*,
                labels: {
                    formatter: function() {
                        return this.value +'°'
                    }
                }*/
            },
            tooltip: {
                crosshairs: true,
                shared: true
            },
            plotOptions: {
                spline: {
                    marker: {
                        radius: 4,
                        lineColor: '#666666',
                        lineWidth: 1
                    }
                }
            },
            series: [{
                name: 'Ouvertures',
                data: [ 100, 150, 80, 60, 20, 5, 0]

            }, {
                name: 'Clicks',
                data: [ 10, 20, 10, 5, 1, 0, 0]
            }]
        });
    });

});
		</script>

