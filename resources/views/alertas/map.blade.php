@extends('layouts.adminApp')


@section('title')
	Alertas
@endsection


@section('head')

    <script>
      function initMap() {

      	var locations = 
      	[<?php 
			$lista = "";

			foreach ($alertas as $key => $alerta) {
				if (isset($alerta->lat) && isset($alerta->lng))
					$lista .= "new google.maps.LatLng(".$alerta->lat.", ".$alerta->lng."),";
			} 

			echo trim($lista, ",");
		?>];

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 11,
          center: {lat: -34.6084035, lng: -58.3808578},
          mapTypeId: google.maps.MapTypeId.ROADMAP,
	      mapTypeControl: true,
	      fullscreenControl: true,
	      streetViewControl: false,

        });

        var heatmap = new google.maps.visualization.HeatmapLayer({
          data: locations,
          map: map
        });

        // for (var i = locations.length - 1; i >= 0; i--) {        	
        // 	marker = new google.maps.Marker({
	        	
	       //  	position: locations[i],
	       //  	map: map,
	       //  	url: 'http://www.google.com.ar'
        // 	})
        // }

      }
      
    </script>
    
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC00PZ8LBCq2QWNAo9fcAHDAMN0z5-vIt0&callback=initMap&libraries=visualization"></script>

@endsection


@section('pageHeader')
<h1>
	<i class="icon fa fa-bullhorn fa-fw"></i>Alertas
	<small>Mapa</small>
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-bullhorn"></i> Alertas</a></li>
	<li class="active">Mapa</li>
</ol>
@endsection

@section('content')

<div class="row">
<div class="col-md-12">
	<div class="box box-solid">

		<div class="box-body">
			
			<div id="map" style="height: 630px;"></div>

		</div>

	</div>
</div>
</div>
	
@endsection


@section('scripts')


@endsection
