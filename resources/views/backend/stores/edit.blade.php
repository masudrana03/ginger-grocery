@extends('backend.layouts.app')
@section('title', 'Edit Store')

@push('styles')
    <style>
        .note-insert {
            display: none !important;
        }

        .image_container {
		 	height: 120px;
		 	width: 200px;
		 	border-radius: 6px;
		 	overflow: hidden;
		 	margin: 10px;
		 }
		 .image_container img {
		 	height: 100%;
		 	width: auto;
		 	object-fit: cover;
		 }
		 .image_container span {
		 	top: -6px;
		 	right: 8px;
		 	color: red;
		 	font-size: 28px;
		 	font-weight: normal;
		 	cursor: pointer;
		 }

         .banner-image{
             min-width: 200px;
             min-width:100px ;
             max-width: 980px;
             max-height: 592px;
         }

    </style>
@endpush

@section('content')
<div class="main_content_iner ">
    <div class="container-fluid p-0 sm_padding_15px">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">Edit Store</h3>
                            </div>
                        </div>
                    </div>
                    <div class="white_card_body">
                        <form action="{{ route('admin.stores.update', $store->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="emailHelp" placeholder="Name" value="{{ old('name') ?? $store->name }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="type">Type</label>
                                <input type="text" name="type" class="form-control @error('type') is-invalid @enderror" id="type" aria-describedby="emailHelp" placeholder="type" value="{{ old('type') ?? $store->type }}">
                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="zone">Zone</label>
                                <select name="zone_id" id="choice_zones" onchange="get_zone_data(this.value)"
                                class="form-control @error('zone') is-invalid @enderror">
                                    <option >Seclect Zone</option>
                                @foreach ( $zones as $zone )
                                    <option value="{{$zone->id}}"  {{ $zone->id == $store->zone_id ? 'selected' : '' }} >{{$zone->name}}</option>
                                @endforeach

                                </select>
                                @error('zone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="latitude">Latitude</label>
                                <input type="text" name="latitude" id="latitude" class="form-control @error('latitude') is-invalid @enderror" id="latitude" aria-describedby="emailHelp" placeholder="Ex : -94.22213" value="{{ old('latitude') ?? $store->latitude }}">
                                @error('latitude')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="longitude">Longitude</label>
                                <input type="text" name="longitude" id="longitude" class="form-control @error('longitude') is-invalid @enderror" id="longitude" aria-describedby="emailHelp" placeholder="Ex : 103.344322" value="{{ old('longitude') ?? $store->longitude }}">
                                @error('longitude')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    {{-- image should be here --}}
                                    <div class="form-group">
                                        <label for="body">Store Image</label><br>
                                        <div class="card shadow-sm w-100">
                                            <div class="card-header d-flex justify-content-start">
                                                    <h4>Upload Images</h4>
                                                    
                                                        <input type="file" name="image" id="image" accept="image/*" class="d-none " onchange="showImage(this)">
                                                        <button class="btn btn-sm btn-primary ml-4" type="button" onclick="document.getElementById('image').click()">Select Image</button>
                                            </div>
                                            <div class="card-body d-flex flex-wrap justify-content-start" id="image-container">
                                                   <img class="banner-image" src="{{asset( 'assets/img/uploads/stores/thumbnail/' . $store->image );}}" id="thumbnil"> 	  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="form-group">
                                <label for="image">Image</label><br>
                                <input type="file" name="image" id="image">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> --}}
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="white_card card_height_100 mb_30">
                    <div class="white_card_header">
                        <div class="box_header m-0">
                            <div class="main-title">
                                <h3 class="m-0">Edit Store Coordinates</h3>
                            </div>

                        </div>
                    </div>
                    <div class="white_card_body">
                        <div class="col-xl-12">
                            <div class="card_box box_shadow mb_30">
                                <div class="white_box_tittle" style="padding: 20px !important">
                                    <div class="main-title2 ">
                                        <h5 class="mb-2 nowrap">Please Point Your Store</h5>
                                    </div>
                                </div>
                                <div class="col-md-12 map-warper" style="height: 450px;">
                                    <input id="pac-input" class="controls rounded" style="height: 3em; width: 230px;" type="text" placeholder="Search Your Zone"/>
                                    <div id="map-canvas" style="height: 100%; margin:0px; padding: 0px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



@push('script')
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDzdRftDdoy-kMMgxnJTWIrnfOnkHLiJdA&libraries=drawing,places&v=3"></script>
<script>

    $( document ).ready(function() {
        get_zone_data({{$store->zone_id}});
    });

     


    const bounds = new google.maps.LatLngBounds();
  function initialize() {

    var myLatlng = { lat: {{$store->latitude}}, lng: {{$store->longitude}} };
        var lastpolygon = null;

        var myOptions = {
            zoom: 13,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);
        drawingManager = new google.maps.drawing.DrawingManager({
            drawingMode: false,
            drawingControl: true,
            drawingControlOptions: {
            position: google.maps.ControlPosition.TOP_CENTER,
            drawingModes: []
            },
            polygonOptions: {
            editable: false
            }
        });
        drawingManager.setMap(map);


        //get current location block
        // Try HTML5 geolocation.
        infoWindow = new google.maps.InfoWindow();
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                const pos = {
                    lat: parseFloat(position.coords.latitude),
                    lng: parseFloat(position.coords.longitude),
                };
                map.setCenter(pos);
            });
        }

        function initMap() {
            // Create the initial InfoWindow.
            new google.maps.Marker({
                position: { lat: {{$store->latitude}}, lng: {{$store->longitude}} },
                map,
                title: "{{$store->name}}",
            });
            infoWindow.open(map);
        }
        initMap();

        google.maps.event.addListener(drawingManager, "overlaycomplete", function(event) {
            if(lastpolygon)
            {
                lastpolygon.setMap(null);
            }
            $('#coordinates').val(event.overlay.getPath().getArray());
            lastpolygon = event.overlay;
            auto_grow();
        });

        const resetDiv = document.createElement("div");
        resetMap(resetDiv, lastpolygon);
        map.controls[google.maps.ControlPosition.TOP_CENTER].push(resetDiv);

        // Create the search box and link it to the UI element.
        const input = document.getElementById("pac-input");
        const searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_CENTER].push(input);
        // Bias the SearchBox results towards current map's viewport.
        map.addListener("bounds_changed", () => {
            searchBox.setBounds(map.getBounds());
        });
        let markers = [];

        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place. geometry.

        searchBox.addListener("places_changed", () => {
            const places = searchBox.getPlaces();

            if (places.length == 0) {
            return;
            }
            // Clear out the old markers.
            markers.forEach((marker) => {
            marker.setMap(null);
            });
            markers = [];
            // For each place, get the icon, name and location.

            places.forEach((place) => {
            if (!place.geometry || !place.geometry.location) {
                console.log("Returned place contains no geometry");
                return;
            }
            const icon = {
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25),
            };
            // Create a marker for each place.
            markers.push(
                new google.maps.Marker({
                map,
                icon,
                title: place.name,
                position: place.geometry.location,
                })
            );

            if (place.geometry.viewport) {
                // Only geocodes have viewport.
                bounds.union(place.geometry.viewport);
            } else {
                bounds.extend(place.geometry.location);
            }
            });
            map.fitBounds(bounds);
        });
    }


    function resetMap(controlDiv) {
        // Set CSS for the control border.
        const controlUI = document.createElement("div");
        controlUI.style.backgroundColor = "#fff";
        controlUI.style.border = "2px solid #fff";
        controlUI.style.borderRadius = "3px";
        controlUI.style.boxShadow = "0 2px 6px rgba(0,0,0,.3)";
        controlUI.style.cursor = "pointer";
        controlUI.style.marginTop = "8px";
        controlUI.style.marginBottom = "22px";
        controlUI.style.textAlign = "center";
        controlUI.title = "Reset map";
        controlDiv.appendChild(controlUI);
        // Set CSS for the control interior.
        const controlText = document.createElement("div");
        controlText.style.color = "rgb(25,25,25)";
        controlText.style.fontFamily = "Roboto,Arial,sans-serif";
        controlText.style.fontSize = "10px";
        controlText.style.lineHeight = "16px";
        controlText.style.paddingLeft = "2px";
        controlText.style.paddingRight = "2px";
        controlText.innerHTML = "X";
        controlUI.appendChild(controlText);
        // Setup the click event listeners: simply set the map to Chicago.
        controlUI.addEventListener("click", () => {
            lastpolygon.setMap(null);
            $('#coordinates').val('');

        });
    }
    function auto_grow() {
    let element = document.getElementById("coordinates");
    element.style.height = "5px";
    element.style.height = (element.scrollHeight)+"px";
    }
    google.maps.event.addDomListener(window, 'load', initialize);

    var zonePolygon = null;

    function get_zone_data(id) {
            $.get({
                url: '{{url('/')}}/admin/zone/get-coordinates/'+id,
                dataType: 'json',
                success: function (data) {
                    if(zonePolygon)
                    {
                        zonePolygon.setMap(null);
                    }
                    zonePolygon = new google.maps.Polygon({
                        paths: data.coordinates,
                        strokeColor: "#FF0000",
                        strokeOpacity: 0.8,
                        strokeWeight: 2,
                        fillColor: 'white',
                        fillOpacity: 0,
                    });


                    zonePolygon.getPaths().forEach(function(path) {
                        path.forEach(function(latlng) {
                            bounds.extend(latlng);
                            map.fitBounds(bounds);
                        });
                    });


                    zonePolygon.setMap(map);
                    map.setCenter(data.center);
                    google.maps.event.addListener(zonePolygon, 'click', function (mapsMouseEvent) {
                        infoWindow.close();
                        // Create a new InfoWindow.
                        infoWindow = new google.maps.InfoWindow({
                        position: mapsMouseEvent.latLng,
                        content: JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2),
                        });
                        var coordinates = JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2);
                        var coordinates = JSON.parse(coordinates);

                        document.getElementById('latitude').value = coordinates['lat'];
                        document.getElementById('longitude').value = coordinates['lng'];
                        infoWindow.open(map);
                    });
                },
            });
    }

        $(document).on('ready', function (){
            var id = $('#choice_zones').val();
            $.get({
                url: '{{url('/')}}/admin/zone/get-coordinates/'+id,
                dataType: 'json',
                success: function (data) {
                    if(zonePolygon)
                    {
                        zonePolygon.setMap(null);
                    }
                    zonePolygon = new google.maps.Polygon({
                        paths: data.coordinates,
                        strokeColor: "#FF0000",
                        strokeOpacity: 0.8,
                        strokeWeight: 2,
                        fillColor: 'white',
                        fillOpacity: 0,
                    });
                    zonePolygon.setMap(map);
                    zonePolygon.getPaths().forEach(function(path) {
                        path.forEach(function(latlng) {
                            bounds.extend(latlng);
                            map.fitBounds(bounds);
                        });
                    });
                    map.setCenter(data.center);
                    google.maps.event.addListener(zonePolygon, 'click', function (mapsMouseEvent) {
                        infoWindow.close();
                        // Create a new InfoWindow.
                        infoWindow = new google.maps.InfoWindow({
                        position: mapsMouseEvent.latLng,
                        content: JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2),
                        });
                        var coordinates = JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2);
                        var coordinates = JSON.parse(coordinates);

                        document.getElementById('latitude').value = coordinates['lat'];
                        document.getElementById('longitude').value = coordinates['lng'];
                        infoWindow.open(map);
                    });
                },
            });

        });
       

       

        
</script>
@endpush

@push('script')
<script type="text/javascript">
    // image upload js code 
       function showImage(fileInput){
           var files = fileInput.files;
           for (var i = 0; i< files.length ; i++){
               var file = files[i];
               var imageType = /image.*/;
               if (!file.type.match(imageType)) {
                continue;
                }
                var img=document.getElementById('thumbnil');
                img.file = file;
                var reader = new FileReader();
                reader.onload = (function(aImg) {
                return function(e) {
                aImg.src = e.target.result;
                };
                })(img);
                reader.readAsDataURL(file);
           }
       }
</script>

@endpush
