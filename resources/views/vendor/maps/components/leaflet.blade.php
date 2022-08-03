<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
      integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
      crossorigin=""/>

<style>
    #{{$mapId}} {
    @if(! isset($attributes['style']))
        height: 100vh;
    @else
        {{ $attributes['style'] }}
    @endif
    }
</style>

<div id="{{$mapId}}" @if(isset($attributes['class']))
 class='{{ $attributes["class"] }}'
@endif
></div>

<!-- Make sure you put this AFTER Leaflet''s CSS -->
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
<script type="text/javascript">

    //var mymap = L.map('{{$mapId}}').setView([{{$centerPoint['lat'] ?? $centerPoint[0]}}, {{$centerPoint['long'] ?? $centerPoint[1]}}], {{$zoomLevel}});
    var mymap = L.map('{{$mapId}}').setView([5.3275904, -4.0090447], 11);
    //console.log(mymap);
    @foreach($markers as $marker)
     @if(isset($marker['icon']))
       var icon = L.icon({
        iconUrl: '{{ $marker['icon'] }}',
        iconSize: [{{$marker['iconSizeX'] ?? 32}} , {{ $marker['iconSizeY'] ?? 32 }}],
       });
     @endif
    var marker = L.marker([{{$marker['lat'] ?? $marker[0]}}, {{$marker['long'] ?? $marker[1]}}]);
    marker.addTo(mymap);
    @if(isset($marker['info']))
    marker.bindPopup(@json($marker['info']));
    @endif
    @endforeach
    // création d'une couche OpenStreetMap (osm)
    var osmLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { attribution: '&copy; <a 		  href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'});
    var EsriworldImg = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}');

  {{-- @include('layouts.partials.geojson');
    var voie = L.geoJSON(voirieGeo).addTo(mymap);
    {{-- http://18.222.93.109:8080/geoserver/pada/wms? --}}

    var voie = L.tileLayer.wms('http://18.222.93.109:8080/geoserver/pada/wms?', {
        layers:'pada:voirie_pada',
        transparent:true,
        //opacity: 0.5,
        format: 'image/png',
        version: '1.3.0',
         crs: L.CRS.EPSG4326,
    }).addTo(mymap);
    var voiep = L.tileLayer.wms('http://18.222.93.109:8080/geoserver/pada/wms?', {
        layers:'pada:voirie_primaire',
        transparent:true,
        //opacity: 0.5,
        format: 'image/png',
        version: '1.3.0',
         crs: L.CRS.EPSG4326,
    }).addTo(mymap);
    var voies = L.tileLayer.wms('http://18.222.93.109:8080/geoserver/pada/wms?', {
        layers:'pada:voirie_secondaire',
        transparent:true,
        format: 'image/png',
        version: '1.3.0',
         crs: L.CRS.EPSG4326,
    }).addTo(mymap);
    var voiet = L.tileLayer.wms('http://18.222.93.109:8080/geoserver/pada/wms?', {
        layers:'pada:voirie_tertiaire',
        transparent:true,
        //opacity: 0.5,
        format: 'image/png',

    }).addTo(mymap);

    mymap.addLayer(osmLayer); // Le layer par défaut
    mymap.addControl(new L.Control.Layers( {
        'OpenStreetMap': osmLayer,
        'EsriworldImg' : EsriworldImg
        }, {
          'Voirie pada'      : voie,
          'Voirie primaire'  : voiep,
          'Voirie Secondaire': voies,
          'Voirie Testiaire' : voiet})
    );


function zoomreq(req){
	//alert(req);
   var wfs = L.Geoserver.wfs("http://18.222.93.109:8080/geoserver/bdadr/wfs", {
    layers:'pada:enquete',
    style: {
      color: "gold",
      fillOpacity: 0,
      opacity: 1,
      stockWidth: 0.5,
    },
    onEachFeature: function (f, l) {
            l.bindPopup('<p class="ith">INFORMATIONS ADRESSE</p><b>Identifiant : </b>'+f.properties.id_enquete+ '<br/>' +
					'<b>Numéro de zone : </b>'+f.properties.num_zone+ '<br/>' +
						'<b>Quartier : </b>'+f.properties.quartier+ '<br/>' +
						'<b>Numéros de la voie : </b>'+f.properties.nom_voie_c+ '<br/>' +
						'<b>Début : </b>'+f.properties.debut+ '<br/>' +
						'<b>Fin : </b>'+f.properties.fin+ '<br/>' +
						'<b>Distance : </b>'+f.properties.distance+ '<br/>' +
						'<b>Cote : </b>'+f.properties.cote+ '<br/>' +
						'<b>Numéro de porte : </b>'+f.properties.num_porte+ '<br/>' +
						'<b>Code occupation : </b>'+f.properties.code_occ+ '<br/>' +
						'<b>Nature : </b>'+f.properties.nature+ '<br/>' +
						'<b>Denomination activité : </b>'+f.properties.denom_act+ '<br/>' +
						'<b>X : </b>'+f.properties.long+ '<br/>' +
						'<b>Y : </b>'+f.properties.lat+ '<br/>');

    },
    CQL_FILTER: req,
  });
  wfs.addTo(mymap);
  layers[j] = wfs;
	j=j+1;
}




function zoommer(id){
	//alert(id);

 	 var wfst = L.Geoserver.wfs("http://18.222.93.109:8080/geoserver/bdadr/wfs", {
    layers: 'bdadr:enquete',
    style: {
      color: "red",
      fillOpacity: 0.5,
      opacity: 0,
      stockWidth: 0.5,
    },
    onEachFeature: function (f, l) {
      l.bindPopup('<p class="ith">INFORMATIONS ADRESSE</p><b>Identifiant : </b>'+f.properties.id_enquete+ '<br/>' +
					'<b>Numéro de zone : </b>'+f.properties.num_zone+ '<br/>' +
						'<b>Quartier : </b>'+f.properties.quartier+ '<br/>' +
						'<b>Numéros de la voie : </b>'+f.properties.nom_voie_c+ '<br/>' +
						'<b>Début : </b>'+f.properties.debut+ '<br/>' +
						'<b>Fin : </b>'+f.properties.fin+ '<br/>' +
						'<b>Distance : </b>'+f.properties.distance+ '<br/>' +
						'<b>Cote : </b>'+f.properties.cote+ '<br/>' +
						'<b>Numéro de porte : </b>'+f.properties.num_porte+ '<br/>' +
						'<b>Code occupation : </b>'+f.properties.code_occ+ '<br/>' +
						'<b>Nature : </b>'+f.properties.nature+ '<br/>' +
						'<b>Denomination activité : </b>'+f.properties.denom_act+ '<br/>' +
						'<b>Date de saisie : </b>'+f.properties.date_saisi+ '<br/>' +
						'<b>X : </b>'+f.properties.long+ '<br/>' +
						'<b>Y : </b>'+f.properties.lat+ '<br/>' +
						'<b>Date enquete : </b>'+f.properties.date_enq+ '<br/>' +
						'<b>Numéro de la fiche : </b>'+f.properties.num_fiche);

    },
    CQL_FILTER: "id_enquete=="+id,
	zIndex: 4,
  });

  wfst.addTo(mymap);
  layers[j] = wfst;
	j=j+1;

 }

function removeL(){
	//alert(j);
	for (var i=0; i<j+1; i++){
				mymap.removeLayer(layers[i]);
			}

}

			var zoom_bar = new L.Control.ZoomBar({position: 'topleft'}).addTo(mymap);


            function getCenterAndZoom(){
                console.log("Lat: "+mymap.getCenter().lat);
                console.log("Lon: "+mymap.getCenter().lng);
                console.log("Zoom: "+mymap.getZoom());
                alert("Lat: "+mymap.getCenter().lat+"\nLon: "+mymap.getCenter().lng+"\nZoom: "+mymap.getZoom());
            }


		 var layerSwitcher = L.control.layers({"OpenStreetmymap": osmLayer, "ESRI World Imagery":EsriworldImg},{"voirie Abidjan":voie,"voirie Primaire":voiep,"voirie Secondaire":voies,"voirie tertiaire":voiet});
		 layerSwitcher.addTo(mymap);
         // Gestion des couches
        var Data = {"Voirie pada": voie, "Voirie Primaire": voiep, "Secondaire": voies, "voirie Testiaire": voiet};
        L.control.layers(null,Data, {collapsed : false}).addTo(mymap);

         // Echelle cartographique
		 L.control.scale().addTo(mymap);
</script>
