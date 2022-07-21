<x-maps-leaflet></x-maps-leaflet>

        {{-- set the centerpoint of the map: --}}
        //<x-maps-leaflet :centerPoint="['lat' =>  7.539989, 'long' => -5.547080]"></x-maps-leaflet>

        {{--  set a zoomlevel: --}}
        //<x-maps-leaflet :zoomLevel="1"></x-maps-leaflet>

        {{-- Set markers on the map: --}}
        <x-maps-leaflet :markers="[['lat' => 5.3275904, 'long' => -4.0090447]]"></x-maps-leaflet>
