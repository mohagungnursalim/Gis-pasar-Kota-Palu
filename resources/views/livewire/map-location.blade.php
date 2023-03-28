
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Map') }}
        </h2>

    </x-slot>

    <head>
        {{-- Leaflet Maps --}}
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
            integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
        <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
            integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>

            @push('MapCss')
            <style>
                #map {
    
                    height: 500px;
                    /* width: 1170px; */
    
                }
    
            </style>
            @endpush
        
    </head>
    <div class="py-3">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    
                <div id="map"></div>   
                      <div class="flex justify-center">
                        
                        <form class="w-full max-w-sm">
                            <div class="md:flex md:items-center mb-6">
                              <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-latitude">
                                  Latitude
                                </label>
                              </div>
                              <div class="md:w-2/3">
                                
                                <input wire:model="lat" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="latitude" type="text" value="latitude">
                              </div>
                            </div>
                            <div class="md:flex md:items-center mb-6">
                              <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-longitude">
                                 Longitude
                                </label>
                              </div>
                              <div class="md:w-2/3">
                                <input wire:model="long" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" name="longitude"  type="ptext" placeholder="longitude">
                              </div>
                            </div>
                            
                            <div class="md:flex md:items-center">
                              <div class="md:w-1/3"></div>
                              <div class="md:w-2/3">
                                <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                                  Add
                                </button>
                              </div>
                            </div>
                          </form>
                      </div>
                    
                </div>


               
                
            </div>
        </div>
        
    </div>

    @push('ScriptMap')         
    <script>
     
     document.addEventListener('livewire:load', function () {


           // Set view
        const map = L.map('map').setView([-0.7322978,119.8630532], 13);

        // tile setting
        // Hybrid: s,h;
        // Satellite: s;
        // Streets: m;
        // Terrain: p;
        const googleHybrid = L.tileLayer('http://{s}.google.com/vt?lyrs=s,h&x={x}&y={y}&z={z}',{
        maxZoom: 20,
        subdomains:['mt0','mt1','mt2','mt3']

        }).addTo(map);

        // Marker
        var pasarIcon = L.icon({
            iconUrl: '{{asset('img/market.png')}}',
            // shadowUrl: 'leaf-shadow.png',

            iconSize: [24, 28], // size of the icon
            shadowSize: [50, 64], // size of the shadow
            iconAnchor: [22, 94], // point of the icon which will correspond to marker's location
            shadowAnchor: [4, 62], // the same for the shadow
            popupAnchor: [-3, -
                76] // point from which the popup should open relative to the iconAnchor
        });

        // L.marker([-0.7322978,119.8630532], {icon: pasarIcon}).addTo(map);
        // var marker = L.marker([-0.7322978,119.8630532],{icon:pasarIcon}).addTo(map).on('click',function(e){
        //     alert(e.latlng);
        // });
        
        

        // Circle
        const circle = L.circle([-0.7322978,119.8630532], {
            color: 'red',
            fillColor: '#f03',
            fillOpacity: 0.5,
            radius: 500
        }).addTo(map);


        // mendapat Longtitude & Lattitude

        // map.on('click',(e) => {
        //     const longtitude= e.lngLat.lng
        //     const lattitude = e.lngLat.lat

        //     console.log(longtitude,lattitude);

        // })
       
        // let marker = null;
            map.on('click', (event)=> {

            // if(marker !== null){
            //     map.removeLayer(marker);
            // }
            marker = L.marker([event.latlng.lat , event.latlng.lng]).addTo(map);

            

            const latitude = event.latlng.lat
            const longitude = event.latlng.lng

            @this.lat = latitude
            @this.long = longitude

            
            
            
        })  

     })


    </script>
    @endpush