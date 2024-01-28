@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tableau de bord</h1>
        
    </div>

    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center mb-3"> Agence Nationale De Numérisation En Santé ANNS </h2>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

        {{-- 

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Earnings (Monthly)</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Earnings (Annual)</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-info" role="progressbar"
                                                    style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Pending Requests</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

         --}}
    </div>
    <input type="hidden" id='myltitude' >
    <input type="hidden" id='myLongitude' >
    
    <div class="card">
      <p id="location"></p>
      <div class="card-body" id="mapid"></div>
     </div>
     <div id="map-templates">
        <img src="{{ asset('images/KindOfMap1.png') }}" class="map-template" onclick="changeMapTemplate(0)" />
        <img src="{{ asset('images/KindOfMap2.png') }}" class="map-template" onclick="changeMapTemplate(1)" />
        <img src="{{ asset('images/KindOfMap3.png') }}" class="map-template" onclick="changeMapTemplate(2)" />
    </div>
</div>
@endsection

@section('css')

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
    integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
    crossorigin=""/>
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css" />

<link rel="stylesheet" href="http://anandaroop.github.io/Leaflet.help/Leaflet.help.css" />

<style>
    #mapid {height: 100vh;
        // width: 100vw;
        height: 500px; }

    /* #map-templates {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            justify-content: space-around;
            width: 300px;
        }
        .map-template {
            width: 30px; 
            height: 30px;
            cursor: pointer;
        } */

        .map-template {
            width: 30px; /* Adjust the size of the template images */
            height: 30px;
            cursor: pointer;
            margin: 5px;
        }

        .leaflet-popup-content p {
    margin: 6px 0;
}
</style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@v0.74.0/dist/L.Control.Locate.min.css" />

<script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@v0.74.0/dist/L.Control.Locate.min.js" charset="utf-8"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.74.4/dist/L.Control.Locate.min.css" /> --}}


<link href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.79.0/dist/L.Control.Locate.min.css" rel="stylesheet">
<link href="{{ asset('js/leaflet.legend.css') }}" rel="stylesheet">

@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('js/nv/axios.min.js') }}"></script>
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
    integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
    crossorigin=""></script>
<script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>
<script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.74.0/dist/L.Control.Locate.min.js" charset="utf-8"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-providers/1.0.7/leaflet-providers.js" charset="utf-8"></script>
<script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.79.0/dist/L.Control.Locate.min.js"></script>
<script type="text/javascript" src="{{ asset('js/leaflet.groupedlayercontrol.js') }}"></script>
<script src="{{ asset('js/leaflet.legend.js') }}"></script>

<script>

/*
            var images = new Array();
         //Here we are adding the images(of the diferent maps) on top of the map
         map.whenReady(function() {

            //Añadimos la imagen al mapa
            images.forEach(function(img) {
                //Then we add all the different maps
                map.addLayer(img);
                img.bringToFront();
                //And if they are not the first one
                if(img != images[0]){
                    //We take the opacity to 0 so they are hidding now
                    img.setOpacity(0);
                }
            });

            // Small arrow to allow us to hide the menu at the bottom left
            $('#mapsShow').click(function(){
                // We control it using the icon
                var icono = $(this).find('i');
                //If it's up(Menu closed)
                if(icono.hasClass("fa-chevron-up")){
                    //We show it by moving it up
                    $(this).parent().animate({
                        top: "0px",
                    }, 300);
                } else {
                    //If the menu is down we move it up
                    $(this).parent().animate({
                        top: "15px",
                    }, 300);
                }
            });
        });*/
   /*
        var map = L.map('mapid').setView([28.0268755, 1.6528399999999976],5);
          //Global maps from the one we will be able to pick one
          var mapTiles = [
            mapTile0 = L.tileLayer.wms('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19, //Dont touch, max zoom 
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            }),
            mapTile1 = L.tileLayer.wms('https://stamen-tiles-{s}.a.ssl.fastly.net/toner-lite/{z}/{x}/{y}{r}.png', {
                attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                maxZoom: 20, //Dont touch, max zoom
                subdomains: 'abcd',
            }),
            mapTile2 = L.tileLayer.wms('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                maxZoom: 20, //Dont touch, max zoom 
                attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
            })
        ];
        //Adding rhe layers to the map
        map.addLayer(mapTile0);
      
    // L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    //     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    // }).addTo(map);


    // Adding the layers to the map
        var baseMaps = {
            "OpenStreetMap": mapTile0,
            "Stamen Toner Lite": mapTile1,
            "Esri World Imagery": mapTile2
        };

        // Add a layer control to allow the user to choose the map layer
        L.control.layers(baseMaps).addTo(map);

        // Add an initial layer to the map
        mapTile0.addTo(map);




 L.tileLayer('https://wxs.ign.fr/{apikey}/geoportail/wmts?REQUEST=GetTile&SERVICE=WMTS&VERSION=1.0.0&STYLE={style}&TILEMATRIXSET=PM&FORMAT={format}&LAYER=ORTHOIMAGERY.ORTHOPHOTOS&TILEMATRIX={z}&TILEROW={y}&TILECOL={x}', {
                            attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                            maxZoom: 20,
                            apikey: 'choisirgeoportail',
                            format: 'image/jpeg',
                            style: 'normal',
                            subdomains: 'abcd',
                        }),
var Stadia_AlidadeSmooth = L.tileLayer('https://tiles.stadiamaps.com/tiles/alidade_smooth/{z}/{x}/{y}{r}.{ext}', {
	minZoom: 0,
	maxZoom: 20,
	attribution: '&copy; <a href="https://www.stadiamaps.com/" target="_blank">Stadia Maps</a> &copy; <a href="https://openmaptiles.org/" target="_blank">OpenMapTiles</a> &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
	ext: 'png'
});

var Jawg_Streets = L.tileLayer('https://{s}.tile.jawg.io/jawg-streets/{z}/{x}/{y}{r}.png?access-token={accessToken}', {
	attribution: '<a href="http://jawg.io" title="Tiles Courtesy of Jawg Maps" target="_blank">&copy; <b>Jawg</b>Maps</a> &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
	minZoom: 0,
	maxZoom: 22,
	subdomains: 'abcd',
	accessToken: '<your accessToken>'
});

var Jawg_Sunny = L.tileLayer('https://{s}.tile.jawg.io/jawg-sunny/{z}/{x}/{y}{r}.png?access-token={accessToken}', {
	attribution: '<a href="http://jawg.io" title="Tiles Courtesy of Jawg Maps" target="_blank">&copy; <b>Jawg</b>Maps</a> &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
	minZoom: 0,
	maxZoom: 22,
	subdomains: 'abcd',
	accessToken: '<your accessToken>'
});


var Jawg_Light = L.tileLayer('https://{s}.tile.jawg.io/jawg-light/{z}/{x}/{y}{r}.png?access-token={accessToken}', {
	attribution: '<a href="http://jawg.io" title="Tiles Courtesy of Jawg Maps" target="_blank">&copy; <b>Jawg</b>Maps</a> &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
	minZoom: 0,
	maxZoom: 22,
	subdomains: 'abcd',
	accessToken: '<your accessToken>'
});

https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png
https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png
https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png
https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png
*/

(function() {

  var basemaps = {
    Blanche: L.tileLayer('https://tile.jawg.io/jawg-light/{z}/{x}/{y}{r}.png?access-token=ZpC8JXnSh7IVbHpOrZf5HywKIqd65v6CIpUuLpRkYPqy1vOSSxymrQBMdL0tQU3G', {
                                    attribution: '',
                                    minZoom: 0,
                                    maxZoom: 22,
                                    subdomains: 'abcd'
    }),
    Sombre : L.tileLayer('https://{s}.tile.jawg.io/jawg-dark/{z}/{x}/{y}{r}.png?access-token=ZpC8JXnSh7IVbHpOrZf5HywKIqd65v6CIpUuLpRkYPqy1vOSSxymrQBMdL0tQU3G', {
	attribution: '',
	minZoom: 0,
	maxZoom: 22,
	subdomains: 'abcd',
	accessToken: '<your accessToken>'
    }),
    
  
     Satellite:  L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                            maxZoom: 20,
                            attribution: ''
    }),
    Normale: L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
      maxZoom: 18,
       subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
    })
  };

  var groups = {
    @foreach($typestructures as $item)
       {{$item->name_abr}}:      new L.LayerGroup(), 
    @endforeach
      };
{{-- 
  L.marker([39.61, -105.02]).bindPopup('Littleton, CO.').addTo(groups.cities);
  L.marker([39.74, -104.99]).bindPopup('Denver, CO.').addTo(groups.cities);
  L.marker([39.73, -104.8]).bindPopup('Aurora, CO.').addTo(groups.cities);
  L.marker([39.77, -105.23]).bindPopup('Golden, CO.').addTo(groups.cities);

  L.marker([39.69, -104.85]).bindPopup('A restaurant').addTo(groups.restaurants);
  L.marker([39.69, -105.12]).bindPopup('A restaurant').addTo(groups.restaurants);

  L.marker([39.79, -104.95]).bindPopup('A dog').addTo(groups.dogs);
  L.marker([39.79, -105.22]).bindPopup('A dog').addTo(groups.dogs);

  L.marker([39.59, -104.75]).bindPopup('A cat').addTo(groups.cats);
  L.marker([39.59, -105.02]).bindPopup('A cat').addTo(groups.cats); 
  --}}

  window.ExampleData = {
    LayerGroups: groups,
    Basemaps: basemaps
  };

}());





var map = L.map('mapid', {
      center: [28.0268755, 1.6528399999999976],
      zoom: 10,
      layers: [ExampleData.Basemaps.Blanche,ExampleData.Basemaps.Sombre, ExampleData.Basemaps.Satellite,ExampleData.Basemaps.Normale]
});

 // Overlay layers are grouped
    {{-- var groupedOverlays = {
       "Landmarks": {
        "Cities": ExampleData.LayerGroups.cities,
        "Restaurants": ExampleData.LayerGroups.restaurants
      },
      "Random": {
        @foreach($typestructures as $item)
        "{{$item->name_abr}}": ExampleData.LayerGroups.{{$item->name_abr}},
        @endforeach
       
      }
    }; --}}

    {{-- var options = {
      // Make the "Landmarks" group exclusive (use radio inputs)
      exclusiveGroups: ["Landmarks"],
      // Show a checkbox next to non-exclusive group labels for toggling all
      groupCheckboxes: true
    }; --}}

    // Use the custom grouped layer control, not "L.control.layers"
   // var layerControl = L.control.groupedLayers(ExampleData.Basemaps, groupedOverlays, options);
       var layerControl = L.control.groupedLayers(ExampleData.Basemaps);
    map.addControl(layerControl);




 const legend = L.control.Legend({
            position: "topright",
            title: "Légende",
            collapsed: true,
            symbolWidth: 24,
            opacity: 1,
            column: 4,
            legends: [
                 @foreach($typestructures as $item)
                {
                label: "{{$item->name_abr}}",
                type: "image",
                url: "{{$item->getImage()}}",
                },
                 @endforeach

            ]
        })
        .addTo(map);
    // Remove and add a layer
    //layerControl.removeLayer(cities);
    //layerControl.addOverlay(cities, "Cities", "New Category");
/*
          // Set initial map view
          var map = L.map('mapid', {
	helpControl: true
}).setView([28.0268755, 1.6528399999999976], 6);
*/
              /*==============================================
                TILE LAYER and WMS
    ================================================*/
    //osm layer
    var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    });
    osm.addTo(map);
    // map.addLayer(osm)

    // water color 
    var watercolor = L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/watercolor/{z}/{x}/{y}.{ext}', {
        attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        subdomains: 'abcd',
        minZoom: 1,
        maxZoom: 16,
        ext: 'jpg'
    });
    // watercolor.addTo(map)

    // dark map 
    var dark = L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
        subdomains: 'abcd',
        maxZoom: 19
    });
    // dark.addTo(map)

    // google street 
    googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    });
    // googleStreets.addTo(map);

    //google satellite
    googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    });
    // googleSat.addTo(map)

    var wms = L.tileLayer.wms("http://localhost:8080/geoserver/wms", {
        layers: 'geoapp:admin',
        format: 'image/png',
        transparent: true,
        attribution: "wms test"
    });


    

                    // Global maps from which we can choose
                    var mapTiles = [
                        L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
                            maxZoom: 19,
                            subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
                            //attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                        }),
                        L.tileLayer('https://tile.jawg.io/jawg-light/{z}/{x}/{y}{r}.png?access-token=ZpC8JXnSh7IVbHpOrZf5HywKIqd65v6CIpUuLpRkYPqy1vOSSxymrQBMdL0tQU3G', {
                                    attribution: '<a href="http://jawg.io" title="Tiles Courtesy of Jawg Maps" target="_blank">&copy; <b>Jawg</b>Maps</a> &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                                    minZoom: 0,
                                    maxZoom: 22,
                                    subdomains: 'abcd',
                                  
                                                    }),
                        L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                            maxZoom: 20,
                            attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
                        })
                    ];

                    // Add an initial layer to the map
                    mapTiles[0].addTo(map);

                    function changeMapTemplate(index) {
                        // Remove existing layers
                        map.eachLayer(function (layer) {
                            if (layer instanceof L.TileLayer) {
                                map.removeLayer(layer);
                            }
                        });

                        // Add the selected layer to the map
                        mapTiles[index].addTo(map);
                    }

    var amfibis = L.icon({
            iconUrl: `{{ url('public') }}/amfibi.png`,
            iconSize: [24, 24], // size of the icon
        });

        var reptils = L.icon({
            iconUrl: `{{ url('public') }}/reptil.png`,
            iconSize: [24, 24], // size of the icon
        });
    var markers = L.markerClusterGroup();
    //<p><a href="https://www.google.com/maps/@${latlng.lat},${latlng.lng},3a,80y,90t/data=!3m6!1e1!3m4!1s_FWFjQi14dY-fHmBppA2Mg!2e0!7i16384!8i8192?entry=ttu" target="_blank">Open Street View</a></p>
   /*
    http://maps.google.com/maps?q=${latlng.lat},${latlng.lng}
                            <br>
                            http://maps.google.com/maps?q=&layer=c&cbll=
                            <br>
                            
                            <br>
                            http://maps.google.com/maps?q=&layer=c&cbll=${latlng.lat},${latlng.lng}&cbp=
                            <br>
                            http://maps.google.com/maps?q=&layer=c&cbll=${latlng.lat},${latlng.lng}&cbp=11,0,0,0,0
                            <br>
                            http://www.google.com/maps?layer=c&cbll=${latlng.lat},${latlng.lng}
                            <br>
                            http://www.google.com/maps?layer=c&cbll=${latlng.lat},${latlng.lng}&cbp=,30,,,20 
                            <br>
                            */
    var bounds = map.getBounds();
   /*  northEastLat: bounds.getNorthEast().lat,
      northEastLng: bounds.getNorthEast().lng,
      southWestLat: bounds.getSouthWest().lat,
      southWestLng: bounds.getSouthWest().lng */
         console.log(bounds) ;
          var formdata = new FormData();
            formdata.append("northEastLat", bounds.getNorthEast().lat);
            formdata.append("northEastLng", bounds.getNorthEast().lng);
            formdata.append("southWestLat", bounds.getSouthWest().lat);
            formdata.append("southWestLng", bounds.getSouthWest().lat);
            console.log(...formdata);
           

        axios.post("{{ route('showindex') }}", formdata).then(function(response) {
    

        console.log(response.data.features) ;
      var groups = {
    @foreach($typestructures as $item)
       {{$item->name_abr}}:      new L.LayerGroup(), 
    @endforeach
      };
        var marker = L.geoJSON(response.data, {
            pointToLayer: function(geoJsonPoint, latlng) {
                console.log(latlng.lat) ;
                console.log(latlng.lng) ;
                ;
      
      
                var mylatitude  =  $('#myltitude').val();
                var mylongitude = $('#myLongitude').val();

                
                let popupContent2 = `
                        <div class="Event--v2">
                            <h1 class="Event__title">
                                <a class="Event__titleLink" href="${geoJsonPoint.properties}" target="_blank">
                                    <span class="Event__type">${geoJsonPoint.properties}</span>
                                    <span class="Event__teaser">${geoJsonPoint.properties}</span>
                                </a>
                            </h1>
                            <p class="Event__meta">
                                <span class="Event__location">${geoJsonPoint.properties}</span>
                                <span class="Event__dateHuman">${geoJsonPoint.properties}</span>
                            </p>
                            <br>
                            <p>
                            
                            <a href="https://www.google.com/maps/dir/${mylatitude},${mylongitude}/${latlng.lat},${latlng.lng}/@39.5188718,-3.6852469,5z/data=!3m1!4b1?entry=ttu" target="_blank">Get Directions</a></p>
                            <br>

                            
                            <p><a href="http://maps.google.com/maps?q=&layer=c&cbll=${latlng.lat},${latlng.lng}" target="_blank">Open Street View</a></p>

                        </div>
                    `;




                    let popupContent = `<div style="color: #000; background-color: #fff; padding: 10px; border-radius: 5px;">
                                        <h4 class="text-center">${geoJsonPoint.properties}</h4>
                                        <p>Wilaya: ${geoJsonPoint.wilaya}</p>
                                        <p>Address: ${geoJsonPoint.adresse}</p>
                                        <p><img src="${geoJsonPoint.logo}" style="max-width:30px; height:auto;" alt="Image"> ${geoJsonPoint.typestructure}</p>
                                        <p>Phone: ${geoJsonPoint.telfix}</p>
                                        <a class="btn btn-sm btn-info text-white" href="https://www.google.com/maps/dir/${mylatitude},${mylongitude}/${latlng.lat},${latlng.lng}/@39.5188718,-3.6852469,5z/data=!3m1!4b1?entry=ttu" target="_blank">Get Directions</a>
                                        <a class="btn btn-sm btn-success  text-white" href="http://maps.google.com/maps?q=&layer=c&cbll=${latlng.lat},${latlng.lng}" target="_blank">Open Street View</a>
                                      
                                     <a class="btn btn-sm btn-danger  text-white" href="${geoJsonPoint.lien}" target="_blank">Lien</a>

                                      </div> `;
                console.log(geoJsonPoint.properties) ;
                  console.log(geoJsonPoint.logo) ;
                 var leafIcon2 = L.icon({
                    iconUrl: geoJsonPoint.logo,
                     iconSize: [30, 30], // size of the icon
               });
               namgrb= "groups."+geoJsonPoint.name_abr ;
               console.log(namgrb) ;
                return L.marker(latlng, {
            title: geoJsonPoint.properties,
            icon: leafIcon2,
            }).bindPopup(popupContent).addTo(groups.IFP);
         
            }
        });

        markers.addLayer(marker);
    })
    .catch(function (error) {
        console.log(error);
    });
    map.addLayer(markers);
    L.control.locate().addTo(map);


    // Attach event listener for map movement events
    /*
map.on('moveend', function() {
  // Get the bounds of the visible map area
  var bounds = map.getBounds();

         console.log(bounds) ;
          var formdata = new FormData();
            formdata.append("northEastLat", bounds.getNorthEast().lat);
            formdata.append("northEastLng", bounds.getNorthEast().lng);
            formdata.append("southWestLat", bounds.getSouthWest().lat);
            formdata.append("southWestLng", bounds.getSouthWest().lat);
            console.log(...formdata);
           

        axios.post("{{ route('showindex') }}", formdata).then(function(response) {


        console.log(response.data.features) ;
      
        var marker = L.geoJSON(response.data, {
            pointToLayer: function(geoJsonPoint, latlng) {
                console.log(latlng.lat) ;
                console.log(latlng.lng) ;
                ;
      
      
                var mylatitude  =  $('#myltitude').val();
                var mylongitude = $('#myLongitude').val();

                
                let popupContent2 = `
                        <div class="Event--v2">
                            <h1 class="Event__title">
                                <a class="Event__titleLink" href="${geoJsonPoint.properties}" target="_blank">
                                    <span class="Event__type">${geoJsonPoint.properties}</span>
                                    <span class="Event__teaser">${geoJsonPoint.properties}</span>
                                </a>
                            </h1>
                            <p class="Event__meta">
                                <span class="Event__location">${geoJsonPoint.properties}</span>
                                <span class="Event__dateHuman">${geoJsonPoint.properties}</span>
                            </p>
                            <br>
                            <p>
                            
                            <a href="https://www.google.com/maps/dir/${mylatitude},${mylongitude}/${latlng.lat},${latlng.lng}/@39.5188718,-3.6852469,5z/data=!3m1!4b1?entry=ttu" target="_blank">Get Directions</a></p>
                            <br>

                            
                            <p><a href="http://maps.google.com/maps?q=&layer=c&cbll=${latlng.lat},${latlng.lng}" target="_blank">Open Street View</a></p>

                        </div>
                    `;




                    let popupContent = `<div style="color: #000; background-color: #fff; padding: 10px; border-radius: 5px;">
                                        <h4 class="text-center">${geoJsonPoint.properties}</h4>
                                        <p>Wilaya: ${geoJsonPoint.wilaya}</p>
                                        <p>Address: ${geoJsonPoint.adresse}</p>
                                        <p><img src="${geoJsonPoint.logo}" style="max-width:30px; height:auto;" alt="Image"> ${geoJsonPoint.typestructure}</p>
                                        <p>Phone: ${geoJsonPoint.telfix}</p>
                                        <a class="btn btn-sm btn-info text-white" href="https://www.google.com/maps/dir/${mylatitude},${mylongitude}/${latlng.lat},${latlng.lng}/@39.5188718,-3.6852469,5z/data=!3m1!4b1?entry=ttu" target="_blank">Get Directions</a>
                                        <a class="btn btn-sm btn-success  text-white" href="http://maps.google.com/maps?q=&layer=c&cbll=${latlng.lat},${latlng.lng}" target="_blank">Open Street View</a>
                                      
                                     <a class="btn btn-sm btn-danger  text-white" href="${geoJsonPoint.lien}" target="_blank">Lien</a>

                                      </div> `;
                console.log(geoJsonPoint.properties) ;
                  console.log(geoJsonPoint.logo) ;
                 var leafIcon2 = L.icon({
                    iconUrl: geoJsonPoint.logo,
                     iconSize: [30, 30], // size of the icon
               });
               
                return L.marker(latlng, {
            title: geoJsonPoint.properties,
            icon: leafIcon2,
            }).bindPopup(popupContent);
          
            }
        });

        markers.addLayer(marker);
    })
    .catch(function (error) {
        console.log(error);
    });

});*/
/*
    var help = L.control.help({
        // move the button to another corner
        position: 'topright',

        // change the button text from ? to i (in a bold italic serif face)
        text: "<span style='font-family: serif; font-weight: bold; font-style: italic'>i</span>",

        // change the title of the help panel
        title: "A customized title for the help panel",

        // insert some text at the top of the panel
        before: "<h1>About this map</h1><p>Here is some custom text. It's been inserted into the help panel <em>before</em> the instructions about panning and zooming.</p>",

        // insert some text at the bottom of the panel
        after: "<h1>Further reading</h1><p>Here is some more text. It's been inserted into the help panel <em>after</em> the instructions about panning and zooming.</p>",
    });

     help.addTo(map);
*/
</script>


<script>
    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
      } else {
        document.getElementById("location").innerHTML = "Geolocation is not supported by this browser.";
      }
    }

    function showPosition(position) {
       var latitude = position.coords.latitude;
       var longitude = position.coords.longitude;
       $('#myltitude').val(latitude);
       $('#myLongitude').val(longitude);
     
       map.setView([latitude, longitude], 8);
       var bounds = map.getBounds();
       console.log('northEastLat: '+bounds.getNorthEast().lat);
      console.log('northEastLng: '+bounds.getNorthEast().lng);
      console.log('southWestLat: '+bounds.getSouthWest().lat);
      console.log('southWestLng: '+bounds.getSouthWest().lng);
      //document.getElementById("location").innerHTML = "Latitude: " + latitude + "<br>Longitude: " + longitude;
    }

    function showError(error) {
      switch (error.code) {
        case error.PERMISSION_DENIED:
          document.getElementById("location").innerHTML = "User denied the request for Geolocation.";
          break;
        case error.POSITION_UNAVAILABLE:
          document.getElementById("location").innerHTML = "Location information is unavailable.";
          break;
        case error.TIMEOUT:
          document.getElementById("location").innerHTML = "The request to get user location timed out.";
          break;
        case error.UNKNOWN_ERROR:
          document.getElementById("location").innerHTML = "An unknown error occurred.";
          break;
      }
    }

    // Call the function to get the location
    getLocation();
</script>


@endsection
