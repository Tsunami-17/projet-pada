<x-maps-leaflet></x-maps-leaflet>

        {{-- set the centerpoint of the map: --}}
        <x-maps-leaflet :centerPoint="['lat' =>  7.53, 'long' => -5.54]"></x-maps-leaflet>

        {{--  set a zoomlevel: --}}
        <x-maps-leaflet :zoomLevel="6"></x-maps-leaflet>

        {{-- Set markers on the map: --}}
        <x-maps-leaflet :markers="[['lat' => 7.539989, 'long' => -5.547080]]"></x-maps-leaflet>
