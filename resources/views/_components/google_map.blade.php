<div id="{{ $id or 'googleMap' }}" style="width:100%;height:400px;" class="full-width"></div>
@push('scripts')
    {{--Google map scripts--}}
    <script>
        function initMap() {

            var latitude = parseFloat(document.getElementById('latitude').value);
            var longitude = parseFloat(document.getElementById('longitude').value);
            var zeitoon = {lat: latitude, lng: longitude};
            var mapProp = {
                center: zeitoon,
                zoom: 15
            };
            var map = new google.maps.Map(document.getElementById("{{ $id or 'googleMap' }}"), mapProp);
            var marker = new google.maps.Marker({
                position: zeitoon,
                map: map
//                draggable: draggable
            });

            @if(!isset($static_marker))
            marker.setOptions({draggable: true});
            @endif


            map.addListener('click', function (event) {
                latitude = event.latLng.lat();
                longitude = event.latLng.lng();
                console.log(latitude + ', ' + longitude);
                document.getElementById('latitude').value = latitude;
                document.getElementById('longitude').value = longitude;
                marker.setPosition({lat: latitude, lng: longitude});

            });

            marker.addListener('drag', function (event) {
                var latitude = event.latLng.lat();
                var longitude = event.latLng.lng();
                console.log(latitude + ', ' + longitude);
                document.getElementById('latitude').value = latitude;
                document.getElementById('longitude').value = longitude;
            });
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkNPTdqgO1vQF14SOzjeBbA871tq3jrfI&callback=initMap">
    </script>
    {{--End of google map scripts--}}
@endpush