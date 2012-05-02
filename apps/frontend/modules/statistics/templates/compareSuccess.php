<?php

//use_javascript('http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js', 'first');

use_javascript('http://code.highcharts.com/highcharts.js');
//use_javascript('http://code.highcharts.com/modules/exporting.js');


?>
    <div class="page-header">
    	<img src="http://placehold.it/80x60" alt="" class="pull-left" style="margin-right: 10px;" />
	    <h1>
		    Copie de Copie de Invitation PtiDej de la com 13 avril - RELANCE NO
	    	<i class="icon-question-sign"></i>
		</h1>
		<h3>
			<small>vs
				<strong>Copie de Copie de Invitation PtiDej de la com 13 avril</strong>
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

    <ul class="nav nav-tabs">
    <li class="active"><a href="#1" data-toggle="tab">Vue d'ensemble </a></li>
    <li><a href="#2" data-toggle="tab">Ouvertures <span class="badge">57</span></a></li>
    <li><a href="#3" data-toggle="tab">Clicks <span class="badge badge-success">0</span></a></li>
    <li><a href="#4" data-toggle="tab">D&eacute;sinscriptions <span class="badge badge-error">1</span></a></li>
    <li><a href="#5" data-toggle="tab">Erreurs <span class="badge badge-error">1</span></a></li>
    <li><a href="#6" data-toggle="tab">Configuration des destinataires</a></li>
</ul>
    <div class="tab-content">
    <div class="tab-pane active" id="1">

<div class="span3 well">
	    <center>
	    	<h1 style="color: #ff0000">-25%</h1>
	    	contacts cibl&eacute;s
	    	<div id="graph" class="width: 100px; height: 100px"></div>
			<table>
			<tr>
				<td>383</td>
				<td>395</td>
			</tr>
			</table>
    	</center>
	</div>

    <div class="span3 well alert-info">
	    <center>
	    	<h1>57</h1>
	    	ouvertures
    	</center>
	</div>

    <div class="span3 well alert-success">
	    <center>
	    	<h1>0</h1>
	    	clicks
    	</center>
	</div>

<div style="clear: both;"></div>




    </div>
    <div class="tab-pane" id="2">



    </div>
    </div>
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
            /*title: {
                text: 'Performance de votre campagne au cours du temps'
            },
/*
            subtitle: {
                text: 'Source: WorldClimate.com'
            },
*/
            xAxis: {
                categories: ['', '']
            },
            yAxis: {
/*                title: {
                    text: 'Contacts'
                },*/
                labels: {
                    formatter: function() {
                        return '';
                    }
                }
            }/*,
            tooltip: {
                crosshairs: true,
                shared: true
            }*/,
            plotOptions: {
/*                spline: {
                    marker: {
                        radius: 4,
                        lineColor: '#666666',
                        lineWidth: 1
                    }
                }*/
            },
            series: [{
                //name: false,
                data: [ 383, 290]

            }]
        });
    });

});
		</script>

