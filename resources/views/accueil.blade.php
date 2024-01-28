<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Guermat Sidahmed">
    <link rel="stylesheet" href="{{ asset('front2/assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front2/assets/font-awesome/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front2/assets/css/jquery.scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('front2/assets/css/leaflet.css') }}">
    <link rel="stylesheet" href="{{ asset('front2/assets/css/style.css') }}">

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@v0.74.0/dist/L.Control.Locate.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@v0.74.0/dist/L.Control.Locate.min.js" charset="utf-8">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.79.0/dist/L.Control.Locate.min.css"
        rel="stylesheet">
    <link href="{{ asset('js/leaflet.legend.css') }}" rel="stylesheet">
    
    {{-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
        integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
        crossorigin="" /> 
    --}}

    <link rel="stylesheet" href="{{ asset('js/nv/select2.min.css') }}" />

    <style>
        .select2-container .select2-selection--single {
            height: 40px;
            border: 1px solid #ced4da;
        }

        .anim_logo {
            animation: logo_anim 10s linear infinite;
        }



        @-webkit-keyframes logo_anim {
            0% {
                transform: rotateY(0deg);
            }

            50% {
                transform: rotateY(0deg);
            }

            70% {
                transform: rotateY(360deg);
            }


            100% {
                transform: rotateY(0deg);
            }

        }



        @keyframes logo_anim {
            0% {
                transform: rotateY(0deg);
            }

            50% {
                transform: rotateY(0deg);
            }

            70% {
                transform: rotateY(360deg);
            }


            100% {
                transform: rotateY(0deg);
            }

        }


        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 40px;
        }

        .select2-container--default .select2-selection--single .select2-selection__clear {
            height: 40px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {

            line-height: 40px;
        }
    </style>
    <title> Agence Nationale De Numérisation En Santé ANNS </title>

</head>

<body>
    <div class="ts-page-wrapper ts-homepage ts-full-screen-page" id="page-top">
        <div id="loader">

            {{-- <img class="hide" id="img_lod" src="{{ asset('front2/assets/img/loader-128x/14.gif') }}" >    --}}

            <img class="hide" id="img_lod" src="{{ asset('images/icon.png') }}"> 

            <div>
                <header id="ts-header" class="">
                    <nav id="ts-primary-navigation" class="navbar navbar-expand-md navbar-light">
                        <div class="container">

                            <a class="navbar-brand" href="#">
                                <img src="{{ asset('images/icon.png') }}" style='max-width:60px;' alt="logo"
                                    class="anim_logo">
                            </a>

                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarPrimary" aria-controls="navbarPrimary" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarPrimary">
                                <ul class="navbar-nav">



                                    <li class="nav-item">
                                        <a class="nav-link" href="#" style='color:black' data-toggle="modal"
                                            data-target="#proposModal">À propos de nous</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link mr-2" href="#" style='color:black' data-toggle="modal"
                                            data-target="#ContactModal">Contact</a>
                                    </li>


                                </ul>
                            </div>

                        </div>

                    </nav>
                </header>
                <div id="proposModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog  modal-dialog-centered justify-content-center modal-lg" role="document">
                        <div class="modal-content  border-0 mx-3">
                            <div class="modal-body  p-0">
                                <div class="">
                                    <div class="card-header pb-0  bg-white">
                                        <div class="row">
                                            <div class="col-10">
                                                <h3 class="font-weight-bold mt-2">À propos de nous</h3>
                                            </div>


                                            <div class="col-2 my-auto"> <span class="text-right"><button type="button"
                                                        class="close" data-dismiss="modal" aria-label="Close"> <span
                                                            aria-hidden="true">&times;</span> </button></span></div>
                                            <div class="col-12">
                                                <h4 class="font-weight-bold mt-2">Agence Nationale De Numérisation En
                                                    Santé ANNS</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p class="text-muted text-left">
                                            La gestion des connaissances est désormais une nécessité dans les
                                            entreprises publics où privées.
                                            Depuis plus d'une vingtaine d'années, le monde économique est clairement
                                            rentré dans ce qu'on appelle
                                            L'économie de la connaissance
                                            dans la période qui a prévalu jusque ici, les forces qui soutenaient
                                            l'économie étaient les forces de production et les forces de travail.
                                            Désormais, c'est la connaissance qui est le moteur principale de la
                                            croissance et la compétitivité.
                                            La connaissance est devenue un capital économique, une ressource
                                            stratégique, un facteur de stabilité, un avantage concurrentiel ...
                                            Il s'agit de savoir d'où l'on vient, savoir où l'on est, pour mieux savoir
                                            où l'on va, de les partager ( passer de l'intelligence individuelle à
                                            l'intelligence collective ) et de créer constamment de nouvelles
                                            connaissances
                                            ( créer , innover pour survivre )
                                            a proposc'est à l'évidence, La rencontre entre le numérique et la santé est
                                            une promesse pour les patients, les professionnels et le système de santé
                                            dans son ensemble. Cette stratégie permettra à l'Algérie d’entrer pleinement
                                            dans l’ère de la médecine digitale et le Knowledge Management.
                                            Développer la médecine connectée à travers un plan « big data » en santé,est
                                            un fruit d’une réflexion.
                                        </p>
                                        <img src="{{ asset('images/icon.png') }}" class="img-fluid"
                                            style='max-height: 250px;' />
                                        <div class="row justify-content-center mt-4">
                                            <div class="col-6"><button type="button"
                                                    class="btn btn-outline-success btn-block font-weight-bold text-dark"
                                                    data-dismiss="modal">J'ai compris</button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="ContactModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog  modal-dialog-centered justify-content-center modal-lg" role="document">
                        <div class="modal-content  border-0 mx-3">
                            <div class="modal-body  p-0">
                                <div class="">
                                    <div class="card-header pb-0  bg-white">
                                        <div class="row">
                                            <div class="col-10">
                                                <h3 class="font-weight-bold mt-2">Contactez-nous</h3>
                                            </div>

                                            <div class="col-2 my-auto"> <span class="text-right"><button
                                                        type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"> <span aria-hidden="true">&times;</span>
                                                    </button></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="info-box">
                                                    <i class="bx bx-map"></i>
                                                    <h3>Adresse</h3>
                                                    <p>1 Rue Belaredj-BP 605 El Madania Alger</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="info-box mt-4">
                                                    <i class="bx bx-envelope"></i>
                                                    <h3>Email</h3>
                                                    <p>secretariat@anns.dz</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="info-box mt-4">
                                                    <i class="bx bx-phone-call"></i>
                                                    <h3>Appelez Nous</h3>
                                                    <p>023-51-08-83</p>
                                                </div>
                                            </div>
                                        </div>




                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="Aucun_resultat_trouve" class="modal fade" tabindex="-1" role="dialog"
                    aria-hidden="true">
                    <div class="modal-dialog  modal-dialog-centered justify-content-center modal-lg" role="document">
                        <div class="modal-content  border-0 mx-3">
                            <div class="modal-body  p-0">
                                <div class="">
                                    <div class="card-header pb-0  bg-white">
                                        <div class="row">


                                            <div class="col-10 my-auto">
                                            </div>
                                            <div class="col-2 my-auto"> <span class="text-right"><button
                                                        type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"> <span aria-hidden="true">&times;</span>
                                                    </button></span></div>
                                            <div class="col-12 text-center">
                                                <h2 class="font-weight-bold mt-2">Aucun résultat trouvé !!!</h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">


                                        <div class="row justify-content-center mt-4">
                                            <div class="col-6"><button type="button"
                                                    class="btn btn-outline-success btn-block font-weight-bold text-dark"
                                                    data-dismiss="modal">J'ai compris</button></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <section id="ts-hero" class=" mb-0">

                    <div class="ts-full-screen d-flex flex-column">

                        <section class="ts-shadow__sm ts-z-index__2 ts-bg-light">

                            <div
                                class="position-absolute w-100 ts-bottom__0 ts-z-index__1 text-center ts-h-0 d-block d-sm-none">
                                <button type="button"
                                    class="ts-circle p-3 bg-white ts-shadow__sm border-0 ts-push-up__50 mt-2"
                                    data-toggle="collapse" data-target="#form-collapse">
                                    <i class="fa fa-chevron-up ts-text-color-primary ts-visible-on-uncollapsed"></i>
                                    <i class="fa fa-chevron-down ts-text-color-primary ts-visible-on-collapsed"></i>
                                </button>
                            </div>

                            <div id="form-collapse" class="collapse ts-xs-hide-collapse show">
                                <form class="ts-form mb-0 d-flex flex-column flex-sm-row py-2 pl-2 pr-3">

                                    <div class="form-group m-1 w-100">
                                        <input type="text" class="form-control" id="keyword" name="keyword"
                                            placeholder="Adresse, ville ou nom d'un établissement">
                                    </div>

                                    <div class="form-group m-1 w-100">
                                        <select class="custom-select" id="type" name="type">
                                            <option value="">Type</option>
                                            @foreach ($typestructures as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }} (
                                                    {{ $item->name_abr }} )</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="form-group m-1 w-100">
                                        <select class="custom-select my-2 form-control kt-select2" id="wilaya"
                                            style="width:100% !important" name="wilaya">
                                            <option></option>
                                        </select>
                                    </div>

                                    <div class="form-group m-1 w-100">
                                        <select class="custom-select my-2 form-control kt-select2" id="commune"
                                            style="width:100% !important" name="commune">
                                            <option></option>
                                        </select>
                                    </div>





                                    <div class="form-group m-1 ml-auto">
                                        <button type="button" class="btn btn-primary" id="search-btn">Rechercher
                                            maintenant</button>
                                    </div>
                                </form>
                            </div>

                        </section>

                        <div class="d-flex h-100">
                            <input type="hidden" id='myltitude'>
                            <input type="hidden" id='myLongitude'>

                            <div
                                class="ts-results__vertical ts-results__vertical-list ts-shadow__sm scrollbar-inner bg-white ts-z-index__2">

                                <section id="ts-results">
                                    <div class="ts-results-wrapper"></div>
                                </section>

                            </div>

                            <div class="ts-map w-100 ts-z-index__1">
                                <div id="ts-map-hero" class="h-100 ts-z-index__1"
                                    data-ts-map-leaflet-provider="http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}"
                                    data-ts-map-leaflet-attribution="" data-ts-map-controls="1"
                                    data-ts-map-scroll-wheel="1" data-ts-map-zoom="13"
                                    data-ts-map-center-latitude="28.0268755"
                                    data-ts-map-center-longitude="1.6528399999999976" data-ts-locale="en-US"
                                    data-ts-currency="USD" data-ts-unit="m<sup>2</sup>"
                                    data-ts-display-additional-info="area_Area;bedrooms_Bedrooms;bathrooms_Bathrooms;rooms_Rooms">
                                </div>
                            </div>
                            <div class="switch_style">
                                <img onclick="changeMapTemplate(0)" id="default_style" style="display: none"
                                    src="{{ asset('images/KindOfMap1.png') }}">
                                <img onclick="changeMapTemplate(1)" id="satellite_style"
                                    src="{{ asset('images/KindOfMap3.png') }}">
                            </div>

                        </div>

                    </div>


                </section>
            </div>
            <script src="{{ asset('front2/assets/js/jquery-3.3.1.min.js') }}"></script>
            {{-- <script src="{{ asset('front2/assets/js/popper.min.js') }}"></script> --}}
            <script src="{{ asset('front2/assets/bootstrap/js/bootstrap.min.js') }}"></script>
            {{-- <script src="{{ asset('front2/assets/js/owl.carousel.min.js') }}"></script> --}}
            {{-- <script src="{{ asset('front2/assets/js/dragscroll.js') }}"></script> --}}
            <script src="{{ asset('front2/assets/js/jquery.scrollbar.min.js') }}"></script>
            <script src="{{ asset('front2/assets/js/leaflet.js') }}"></script>
            <script src="{{ asset('front2/assets/js/leaflet.markercluster.js') }}"></script>
            <script src="{{ asset('front2/assets/js/custom.js') }}"></script>
            <script type="text/javascript" src="{{ asset('js/nv/axios.min.js') }}"></script>
            <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.74.0/dist/L.Control.Locate.min.js" charset="utf-8">
            </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-providers/1.0.7/leaflet-providers.js" charset="utf-8">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol@0.79.0/dist/L.Control.Locate.min.js"></script>
            {{-- <script type="text/javascript" src="{{ asset('js/leaflet.groupedlayercontrol.js') }}"></script> --}}
            <script src="{{ asset('js/leaflet.legend.js') }}"></script>
            <script type="text/javascript" src="{{ asset('js/nv/select2.min.js') }}"></script>
            <script></script>

            <script>
                var map;
                var mapTiles;
                $("#wilaya").select2({
                    placeholder: "Sélectionnez la wilaya",
                    allowClear: true,
                    ajax: {
                        url: "{{ route('front.getWilayas') }}",
                        type: "post",
                        dataType: 'json',
                        delay: 250,
                        data: function(params) {
                            return {
                                _token: '{{ csrf_token() }}',
                                status: 5,
                                search: params.term
                            };
                        },
                        processResults: function(response) {
                            return {
                                results: response
                            };
                        },
                        cache: true
                    }
                });
                $('#wilaya').change(function() {
                    $('#commune').empty();
                });
                $("#commune").select2({
                    placeholder: "Choisissez la commune",
                    allowClear: true,
                    ajax: {
                        url: "{{ route('front.getCommunes') }}",
                        type: "post",
                        dataType: 'json',
                        delay: 250,
                        data: function(params) {
                            return {
                                _token: '{{ csrf_token() }}',
                                status: 5,
                                wilaya_code: $("#wilaya").val(),
                                search: params.term
                            };
                        },
                        processResults: function(response) {
                            return {
                                results: response
                            };
                        },
                        cache: true
                    }
                });
                $(document).ready(function($) {
                    "use strict";
                    var mapId = "ts-map-hero";
                    var newMarkers = [];
                    var loadedMarkersData = [];
                    var allMarkersData;
                    var lastMarker;
                    var markerCluster;
                    if ($("#" + mapId).length) {
                        var mapElement = $(document.getElementById(mapId));
                        var mapDefaultZoom = parseInt(mapElement.attr("data-ts-map-zoom"), 10);
                        var centerLatitude = mapElement.attr("data-ts-map-center-latitude");
                        var centerLongitude = mapElement.attr("data-ts-map-center-longitude");
                        var locale = mapElement.attr("data-ts-locale");
                        var currency = mapElement.attr("data-ts-currency");
                        var unit = mapElement.attr("data-ts-unit");
                        var controls = parseInt(mapElement.attr("data-ts-map-controls"), 10);
                        var scrollWheel = parseInt(mapElement.attr("data-ts-map-scroll-wheel"), 10);
                        var leafletMapProvider = mapElement.attr("data-ts-map-leaflet-provider");
                        var leafletAttribution = mapElement.attr("data-ts-map-leaflet-attribution");
                        var zoomPosition = mapElement.attr("data-ts-map-zoom-position");
                        var mapBoxAccessToken = mapElement.attr("data-ts-map-mapbox-access-token");
                        var mapBoxId = mapElement.attr("data-ts-map-mapbox-id");
                        if (mapElement.attr("data-ts-display-additional-info")) {
                            var displayAdditionalInfoTemp = mapElement.attr("data-ts-display-additional-info").split(";");
                            var displayAdditionalInfo = [];
                            for (var i = 0; i < displayAdditionalInfoTemp.length; i++) {
                                displayAdditionalInfo.push(displayAdditionalInfoTemp[i].split("_"));
                            }
                        }
                        if (!mapDefaultZoom) {
                            mapDefaultZoom = 14;
                        }
                        map = L.map(mapId, {
                            zoomControl: true,
                            scrollWheelZoom: scrollWheel
                        });
                        map.setView([centerLatitude, centerLongitude], mapDefaultZoom);
                        L.tileLayer(leafletMapProvider, {
                            attribution: leafletAttribution,
                            maxZoom: 17,
                            id: mapBoxId,
                            accessToken: mapBoxAccessToken
                        }).addTo(map);
                        const legend = L.control.Legend({
                            position: "topright",
                            title: "Légende",
                            collapsed: true,
                            symbolWidth: 24,
                            opacity: 1,
                            column: 4,
                            legends: [
                                @foreach ($typestructures as $item)
                                    {
                                        label: "{{ $item->name_abr }}",
                                        type: "image",
                                        url: "{{ $item->getImage() }}",
                                    },
                                @endforeach
                            ]
                        }).addTo(map);
                        L.control.locate().addTo(map);
                        if (controls !== 0 && zoomPosition) {} else if (controls !== 0) {}
                        mapTiles = [
                            L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
                                maxZoom: 19,
                                subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
                            }),
                            /* L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png',{maxZoom:17,}),*/
                            L.tileLayer(
                                'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                                    maxZoom: 18,
                                    attribution: ''
                                })
                        ];
                        mapTiles[0].addTo(map);
                        getLocation();
                    }

                    function loadData(parameters) {
                        $.ajax({
                            url: "{{ asset('front2/assets/db/items.json') }}",
                            dataType: "json",
                            method: "GET",
                            cache: false,
                            success: function(results) {
                                if (typeof parameters !== "undefined" && parameters["formData"]) {} else {
                                    allMarkersData = results;
                                    loadedMarkersData = allMarkersData;
                                }
                                createMarkers();
                            },
                            error: function(e) {}
                        });
                    }

                    function show_loader() {
                        $("#loader").addClass("loader");
                        $("#img_lod").removeClass("hide");
                    }

                    function hide_loader() {
                        $("#loader").removeClass("loader");
                        $("#img_lod").addClass("hide");
                    }

                    function loadData_2() {
                        var formdata = new FormData();
                        var bounds = map.getBounds();
                        var bounds = map.getBounds();
                        formdata.append("northEastLat", bounds.getNorthEast().lat);
                        formdata.append("northEastLng", bounds.getNorthEast().lng);
                        formdata.append("southWestLat", bounds.getSouthWest().lat);
                        formdata.append("southWestLng", bounds.getSouthWest().lng);
                        show_loader();
                        axios.post("{{ Route('front.map_json') }}", formdata).then(function(response) {
                            var res = response.data;
                            hide_loader();
                            if (res.status == 200) {
                                allMarkersData = res.data;
                                loadedMarkersData = allMarkersData;
                                createMarkers();
                                $('#more-options-collapse').collapse('hide');
                            } else {}
                        }).catch(function(error) {
                            hide_loader();
                        });
                    }

                    function loadData_3() {
                        var formdata = new FormData();
                        var bounds = map.getBounds();
                        var bounds = map.getBounds();
                        formdata.append("northEastLat", bounds.getNorthEast().lat);
                        formdata.append("northEastLng", bounds.getNorthEast().lng);
                        formdata.append("southWestLat", bounds.getSouthWest().lat);
                        formdata.append("southWestLng", bounds.getSouthWest().lng);
                        var mylatitude = $('#myltitude').val();
                        var mylongitude = $('#myLongitude').val();
                        formdata.append("mylatitude", mylatitude);
                        formdata.append("mylongitude", mylongitude);
                        formdata.append("keyword", document.getElementById("keyword").value);
                        formdata.append("type", document.getElementById("type").value);
                        formdata.append("wilaya", document.getElementById("wilaya").value);
                        formdata.append("commune", document.getElementById("commune").value);
                        formdata.append("keyword", document.getElementById("keyword").value);
                        formdata.append("myposition", 0);
                        show_loader();
                        axios.post("{{ Route('front.map_json_search') }}", formdata).then(function(response) {
                            var res = response.data;
                            hide_loader();
                            if ($(window).width() <= 767) {
                                $('#form-collapse').collapse('hide');
                            }
                            if (res.status == 200) {
                                allMarkersData = res.data;
                                loadedMarkersData = allMarkersData;
                                centerLatitude = res.centerLatitude;
                                centerLongitude = res.centerLongitude;
                                createMarkers();
                                map.setZoom(8);
                                var bounds = map.getBounds();
                                map.flyTo([centerLatitude, centerLongitude], 12, {
                                    animate: true,
                                    duration: 3
                                });
                            } else {}
                        }).catch(function(error) {
                            hide_loader();
                        });
                    }
                    $('#search-btn').click(function(e) {
                        var btn = $('#search-btn');
                        map.eachLayer(function(layer) {
                            if (!!layer.toGeoJSON) {
                                map.removeLayer(layer);
                            }
                        });
                        loadData_3();
                    });

                    function createMarkers() {
                        loadedMarkersData.length
                        if (loadedMarkersData.length > 0) {
                            markerCluster = L.markerClusterGroup({
                                showCoverageOnHover: false
                            });
                            for (var i = 0; i < loadedMarkersData.length; i++) {
                                var markerContent = document.createElement('div');
                                markerContent.innerHTML = '<div class="ts-marker-wrapper">' +
                                    '<a href="#" class="ts-marker" data-ts-id="' + loadedMarkersData[i]["id"] +
                                    '" data-ts-ln="' + i + '">' +
                                    ((loadedMarkersData[i]["name_abr"] !== "") ? '<div class="ts-marker__feature">' +
                                        loadedMarkersData[i]["name_abr"] + '</div>' : "") +
                                    ((loadedMarkersData[i]["title"] !== "") ? '<div class="ts-marker__title">' +
                                        loadedMarkersData[i]["title"] + '</div>' : "") +
                                    ((loadedMarkersData[i]["address"] !== "") ? '<div class="ts-marker__info">' +
                                        loadedMarkersData[i]["address"] + '</div>' : "") +
                                    ((loadedMarkersData[i]["marker_image"] !== "") ?
                                        '<div class="ts-marker__image ts-black-gradient" style="background-image: url({{ asset('assets/typestructures') }}/' +
                                        loadedMarkersData[i]["marker_image"] + ')"></div>' :
                                        '<div class="ts-marker__image ts-black-gradient" style="background-image: url({{ asset('admin/img/black-flat-marker.png') }})"></div>'
                                    ) + '</a>' + '</div>';
                                placeLeafletMarker({
                                    "i": i,
                                    "markerContent": markerContent,
                                    "method": "latitudeLongitude"
                                });
                            }
                            markersDone();
                        } else {
                            $('#Aucun_resultat_trouve').modal('show');
                        }
                    }

                    function markersDone() {
                        map.addLayer(markerCluster);
                    }

                    function placeLeafletMarker(parameters) {
                        var i = parameters["i"];
                        var markerIcon = L.divIcon({
                            html: parameters["markerContent"].innerHTML,
                            iconSize: [42, 47],
                            iconAnchor: [0, 47]
                        });
                        var marker = L.marker([loadedMarkersData[i]["latitude"], loadedMarkersData[i]["longitude"]], {
                            icon: markerIcon
                        });
                        marker.loopNumber = i;
                        markerCluster.addLayer(marker);
                        marker.on('click', function() {
                            if (lastMarker && lastMarker._icon) {
                                $(lastMarker._icon.firstChild).removeClass("ts-hide-marker");
                            }
                            openInfobox({
                                "id": $(this._icon).find(".ts-marker").attr("data-ts-id"),
                                "parentMarker": marker,
                                "i": i,
                                "url": "{{ asset('front2/assets/db/items.json') }}"
                            });
                        });
                        newMarkers.push(marker);
                    }

                    function openInfobox(parameters) {
                        var i = parameters["i"];
                        var parentMarker = parameters["parentMarker"];
                        var id = parameters["id"];
                        var infoboxHtml = document.createElement('div');
                        createInfoBoxHTML({
                            "i": i,
                            "infoboxHtml": infoboxHtml
                        });
                        var popup = L.popup({
                                closeButton: false,
                                offset: [120, 0],
                                closeOnClick: false
                            }).setLatLng([parentMarker._latlng.lat, parentMarker._latlng.lng]).setContent(infoboxHtml)
                            .openOn(map);
                        lastMarker = parentMarker;
                        parentMarker._markerIcon = parentMarker._icon.firstChild;
                        $(parentMarker._icon.firstChild).addClass("ts-hide-marker");
                        setTimeout(function() {
                            $(".ts-infobox[data-ts-id='" + id + "']").closest(".infobox-wrapper").addClass(
                                "ts-show");
                            $(".ts-infobox[data-ts-id='" + id + "'] .ts-close").on("click", function() {
                                $(".ts-infobox[data-ts-id='" + id + "']").closest(".infobox-wrapper")
                                    .removeClass("ts-show");
                                $(parentMarker._markerIcon).removeClass("ts-hide-marker");
                                map.closePopup();
                            });
                        }, 50);
                    }

                    function createInfoBoxHTML(parameters) {
                        var i = parameters["i"];
                        var infoboxHtml = parameters["infoboxHtml"];
                        var mylatitude = $('#myltitude').val();
                        var mylongitude = $('#myLongitude').val();
                        var get_Directions = 'https://www.google.com/maps/dir/' + mylatitude + ',' + mylongitude + '/' +
                            loadedMarkersData[i]["latitude"] + ',' + loadedMarkersData[i]["longitude"] +
                            '/@39.5188718,-3.6852469,5z/data=!3m1!4b1?entry=ttu';
                        var get_position = 'http://maps.google.com/maps?q=&layer=c&cbll=' + loadedMarkersData[i][
                            "latitude"
                        ] + ',' + loadedMarkersData[i]["longitude"];
                        get_position = 'http://maps.google.com/maps?q=' + loadedMarkersData[i]["latitude"] + ',' +
                            loadedMarkersData[i]["longitude"] + '&cbp';
                        infoboxHtml.innerHTML = '<div class="infobox-wrapper">' + '<div class="ts-infobox" data-ts-id="' +
                            loadedMarkersData[i]["id"] + '">' +
                            '<img src="{{ asset('front2/assets/img/infobox-close.svg') }}" class="ts-close">' +
                            ((loadedMarkersData[i]["name_abr"] !== "") ? '<div class="ts-ribbon">' + loadedMarkersData[i][
                                "name_abr"
                            ] + '</div>' : "") +
                            ((loadedMarkersData[i]["ribbon_corner"] !== undefined) ?
                                '<div class="ts-ribbon-corner"><span>' + loadedMarkersData[i]["ribbon_corner"] +
                                '</span></div>' : "") + '<div href="#" class="ts-infobox__wrapper ts-black-gradient">' +
                            ((loadedMarkersData[i]["badge"] !== undefined && loadedMarkersData[i]["badge"].length > 0) ?
                                '<div class="badge badge-dark">' + loadedMarkersData[i]["badge"] + '</div>' : "") +
                            '<div class="ts-infobox__content">' + '<figure class="ts-item__info">' +
                            ((loadedMarkersData[i]["wilaya"] !== "" && loadedMarkersData[i]["wilaya"].length > 0) ?
                                '<div class="ts-item__info-badge">' + loadedMarkersData[i]["wilaya"] + '</div>' : "") +
                            ((loadedMarkersData[i]["title"] !== undefined && loadedMarkersData[i]["title"].length > 0) ?
                                '<h4>' + loadedMarkersData[i]["title"] + '</h4>' : "") +
                            ((loadedMarkersData[i]["address"] !== undefined && loadedMarkersData[i]["address"] !==
                                    undefined && loadedMarkersData[i]["address"] !== null) ?
                                '<aside><i class="fa fa-map-marker mr-2"></i>' + loadedMarkersData[i]["address"] +
                                '</aside>' : "") +
                            ((loadedMarkersData[i]["telfix"] !== "" && loadedMarkersData[i]["telfix"] !== undefined &&
                                    loadedMarkersData[i]["telfix"] !== null) ? '<aside><i class="fa fa-phone mr-2"></i>' +
                                loadedMarkersData[i]["telfix"] + '</aside>' : "") + '</figure>' +
                            '<div class="ts-description-lists">' + '<div class="row col-lg-8">' + '<div class="col-6">' +
                            '<a href="' + get_Directions +
                            '" style="font-size: 1.2rem;" target="_blank"><i class="fas fa-location-arrow mr-5"></i></a>' +
                            '</div>' + '<div class="col-6">' + '<a href="' + get_position +
                            '" style="font-size: 1.2rem; display: block !important;" target="_blank"><i class="fas fa-street-view mr-5"></i></a>' +
                            '</div>' + '</div>' + '</div>' + '</div>' +
                            '<div class="ts-infobox_image" style="background: balck;"></div>' + '</div>' + '</div>' +
                            '</div>';
                    }

                    function additionalInfoHTML(parameters) {
                        var i = parameters["i"];
                        var displayParameter;
                        var additionalInfoHtml = "";
                        for (var a = 0; a < parameters["display"].length; a++) {
                            displayParameter = parameters["display"][a];
                            if (loadedMarkersData[i][displayParameter[0]] !== undefined) {
                                additionalInfoHtml += '<dl>' + '<dt>' + displayParameter[1] + '</dt>' + '<dd>' +
                                    loadedMarkersData[i][displayParameter[0]] + ((displayParameter[a] === "area") ? unit :
                                        "") + '</dd>' + '</dl>';
                            }
                        }
                        if (additionalInfoHtml) {
                            return '<div class="ts-description-lists">' + additionalInfoHtml + '</div>';
                        } else {
                            return "";
                        }
                    }

                    function createSideBarResult() {
                        var visibleMarkersOnMap = [];
                        var resultsHtml = [];
                        for (var i = 0; i < loadedMarkersData.length; i++) {
                            if (map.getBounds().contains(newMarkers[i].getLatLng())) {
                                visibleMarkersOnMap.push(newMarkers[i]);
                            } else {}
                        }
                        for (i = 0; i < visibleMarkersOnMap.length; i++) {
                            var id = visibleMarkersOnMap[i].loopNumber;
                            var additionalInfoHtml = "";
                            if (loadedMarkersData[id]["additional_info"]) {
                                for (var a = 0; a < loadedMarkersData[id]["additional_info"].length; a++) {
                                    additionalInfoHtml += '<dl>' + '<dt>' + loadedMarkersData[id]["additional_info"][a][
                                            "title"
                                        ] + '</dt>' + '<dd>' + loadedMarkersData[id]["additional_info"][a]["value"] +
                                        '</dd>' + '</dl>';
                                }
                            }
                            var mylatitude = $('#myltitude').val();
                            var mylongitude = $('#myLongitude').val();
                            var get_Directions = 'https://www.google.com/maps/dir/' + mylatitude + ',' + mylongitude + '/' +
                                loadedMarkersData[id]["latitude"] + ',' + loadedMarkersData[id]["longitude"] +
                                '/@39.5188718,-3.6852469,5z/data=!3m1!4b1?entry=ttu';
                            var get_position = 'http://maps.google.com/maps?q=&layer=c&cbll=' + loadedMarkersData[id][
                                "latitude"
                            ] + ',' + loadedMarkersData[id]["longitude"];
                            get_position = 'http://maps.google.com/maps?q=' + loadedMarkersData[id]["latitude"] + ',' +
                                loadedMarkersData[id]["longitude"] + '&cbp';
                            var img_url = (loadedMarkersData[id]["marker_image"] !== "") ?
                                "{{ asset('assets/typestructures') }}/" + loadedMarkersData[id]["marker_image"] :
                                "{{ asset('admin/img/black-flat-marker.png') }}";
                            resultsHtml.push('<div class="ts-result-link" data-ts-id="' + loadedMarkersData[id]["id"] +
                                '" data-ts-ln="' + newMarkers[id].loopNumber + '">' +
                                '<span class="ts-center-marker"></span>' +
                                '<div  class="card ts-item ts-card ts-result">' +
                                ((loadedMarkersData[id]["name_abr"] !== undefined) ?
                                    '<div class="ts-ribbon-corner"><span>' + loadedMarkersData[id]["name_abr"] +
                                    '</span></div>' : "") +
                                '<div  class="card-img ts-item__image" style="background-image: url(' + img_url +
                                ') ;    background-size: contain; background-repeat: no-repeat; height: 4rem;"></div>' +
                                '<div class="card-body">' + '<div class="ts-item__info-badge">' + loadedMarkersData[id][
                                    "wilaya"
                                ] + '</div>' + '<figure class="ts-item__info">' + '<h4>' + loadedMarkersData[id][
                                    "title"
                                ] + '</h4>' + '<aside>' + '<i class="fa fa-map-marker mr-2"></i>' +
                                loadedMarkersData[id]["address"] + '</aside>' +
                                ((loadedMarkersData[id]["telfix"] !== "" && loadedMarkersData[id]["telfix"] !==
                                        undefined && loadedMarkersData[id]["telfix"] !== null) ?
                                    '<aside><i class="fa fa-phone mr-2"></i>' + loadedMarkersData[id]["telfix"] +
                                    '</aside>' : "") + '</figure>' + '<div class="ts-description-lists">' +
                                '<div class="row col-lg-12">' + '<div class="">' + '<button data-lat="' +
                                loadedMarkersData[id]["latitude"] + '" data-log="' + loadedMarkersData[id][
                                    "longitude"
                                ] +
                                '" href="#" style="font-size: 1.2rem;"  type="button" class="bnttomap btn btn-info btn-xs  "><i class="fas fa-location-arrow "></i> </button>' +
                                '</div>' + '<div class="">' + '<a  href="' + get_Directions +
                                '" style="font-size: 1.2rem;" target="_blank" type="button" class="btn btn-info btn-xs  "><i class="fas fa-location-arrow "></i> </a>' +
                                '</div>' + '<div class=" ">' + '<a  href="' + get_position +
                                '" style="font-size: 1.2rem; display: block !important;" target="_blank"   class="btn btn-success btn-xs "><i class="fas fa-street-view "></i></a>' +
                                '</div>' + '</div>' + '</div>' +
                                additionalInfoHTML({
                                    display: displayAdditionalInfo,
                                    i: i
                                }) + '</div>' + '</div>' + '</div>');
                        }
                        $(".ts-results-wrapper").html(resultsHtml);
                        var $results = $("#ts-results").find(".ts-sly-frame");
                        if ($results.hasClass("ts-loaded")) {
                            $results.sly("reload");
                        } else {
                            initializeSly();
                        }
                        var resultsBar = $(".scroll-wrapper.ts-results__vertical-list, .scroll-wrapper.ts-results__grid");
                        if ($(window).width() < 575) {
                            resultsBar.find(".ts-results__vertical").css("pointer-events", "none");
                            resultsBar.on("click", function() {
                                $(this).addClass("ts-expanded");
                                $(this).find(".ts-results__vertical").css("pointer-events", "auto");
                                $("#ts-map-hero").addClass("ts-dim-map");
                            });
                            $("#ts-map-hero").on("click", function() {
                                if (resultsBar.hasClass("ts-expanded")) {
                                    resultsBar.removeClass("ts-expanded");
                                    $("#ts-map-hero").removeClass("ts-dim-map");
                                    resultsBar.find(".ts-results__vertical").css("pointer-events", "none");
                                }
                            });
                        } else {
                            resultsBar.removeClass("ts-expanded");
                            resultsBar.find(".ts-results__vertical").css("pointer-events", "auto");
                            $("#ts-map-hero").removeClass("ts-dim-map");
                        }
                    }
                    $(document).on("click", ".ts-center-marker", function() {
                        $(".ts-marker").parent().removeClass("ts-active-marker");
                        map.setView(newMarkers[$(this).parent().attr("data-ts-ln")].getLatLng());
                        map.flyTo(newMarkers[$(this).parent().attr("data-ts-ln")].getLatLng(), 16, {
                            animate: true,
                            duration: 3
                        });
                        var id = $(this).parent().attr("data-ts-id");
                        $(".ts-marker[data-ts-id='" + id + "']").parent().addClass("ts-active-marker");
                    });
                    $(document).on("click", ".bnttomap", function() {
                        $(".ts-marker").parent().removeClass("ts-active-marker");
                        var lat = $(this).data('lat');
                        var log = $(this).data('log');
                        map.flyTo([lat, log], 16, {
                            animate: true,
                            duration: 3
                        });
                        var id = $(this).parent().attr("data-ts-id");
                        $(".ts-marker[data-ts-id='" + id + "']").parent().addClass("ts-active-marker");
                    });
                    var timer;
                    $(document).on({
                        mouseenter: function() {
                            var id = $(this).parent().attr("data-ts-id");
                            timer = setTimeout(function() {
                                $(".ts-marker").parent().addClass("ts-marker-hide");
                                $(".ts-marker[data-ts-id='" + id + "']").parent().addClass(
                                    "ts-active-marker");
                            }, 500);
                        },
                        mouseleave: function() {
                            clearTimeout(timer);
                            $(".ts-marker").parent().removeClass("ts-active-marker").removeClass(
                                "ts-marker-hide");
                        }
                    }, ".ts-result");

                    function formatPrice(price) {
                        return Number(price).toLocaleString(locale, {
                            style: 'currency',
                            currency: currency
                        }).replace(/\D\d\d$/, '');
                    }
                    var simpleMapId = "ts-map-simple";
                    if ($("#" + simpleMapId).length) {
                        mapElement = $(document.getElementById(simpleMapId));
                        mapDefaultZoom = parseInt(mapElement.attr("data-ts-map-zoom"), 10);
                        centerLatitude = mapElement.attr("data-ts-map-center-latitude");
                        centerLongitude = mapElement.attr("data-ts-map-center-longitude");
                        controls = parseInt(mapElement.attr("data-ts-map-controls"), 10);
                        scrollWheel = parseInt(mapElement.attr("data-ts-map-scroll-wheel"), 10);
                        leafletMapProvider = mapElement.attr("data-ts-map-leaflet-provider");
                        var markerDrag = parseInt(mapElement.attr("data-ts-map-marker-drag"), 10);
                        if (!mapDefaultZoom) {
                            mapDefaultZoom = 14;
                        }
                        map = L.map(simpleMapId, {
                            zoomControl: false,
                            scrollWheelZoom: scrollWheel
                        });
                        map.setView([centerLatitude, centerLongitude], mapDefaultZoom);
                        L.tileLayer(leafletMapProvider, {
                            attribution: leafletAttribution,
                            id: mapBoxId,
                            accessToken: mapBoxAccessToken
                        }).addTo(map);
                        (controls === 1) ? L.control.zoom({
                            position: "topright"
                        }).addTo(map): "";
                        var icon = L.icon({
                            iconUrl: "{{ asset('front2/assets/img/marker-small.png') }}",
                            iconSize: [22, 29],
                            iconAnchor: [11, 29]
                        });
                        var marker = L.marker([centerLatitude, centerLongitude], {
                            icon: icon,
                            draggable: markerDrag
                        }).addTo(map);
                    }

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
                        map.setView([latitude, longitude], 10);
                        var bounds = map.getBounds();
                        loadData_2();
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
                                document.getElementById("location").innerHTML =
                                    "The request to get user location timed out.";
                                break;
                            case error.UNKNOWN_ERROR:
                                document.getElementById("location").innerHTML = "An unknown error occurred.";
                                break;
                        }
                    }
                });

                function changeMapTemplate(index) {
                    mapTiles = [
                        /* L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png',{maxZoom:17,}),*/
                        L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
                            maxZoom: 19,
                            subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
                        }),
                        L.tileLayer(
                            'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                                maxZoom: 18,
                                attribution: ''
                            })
                    ];
                    if (index == 0) {
                        $('#default_style').css('display', 'none');
                        $('#satellite_style').css('display', 'block');
                    } else {
                        $('#default_style').css('display', 'block');
                        $('#satellite_style').css('display', 'none');
                    }
                    if (map && mapTiles && mapTiles[index]) {
                        map.eachLayer(function(layer) {
                            if (layer instanceof L.TileLayer) {
                                map.removeLayer(layer);
                            }
                        });
                        mapTiles[index].addTo(map);
                    } else {}
                }
            </script>

</body>

</html>
