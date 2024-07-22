<template>
  <WebLayout>
    <div class="row p-5" style="margin-top: 95px">
      <div class="col-4 shadow rounded p-3">
        <div class="col mb-3">
          <label for="your_address">ចេញដំណើរ</label>
          <input type="text" class="form-control" placeholder="Your address" v-model="sourceAddress" id="source">
        </div>
        <div class="col">
          <label for="destination_address">គោលដៅ</label>
          <input type="text" class="form-control" placeholder="Destination address" v-model="destAddress" id="dest">
        </div>
        <div class="col mb-3">
          <label for="date_time"></label>
          <button @click="calcRoute" class="btn btn-primary mt-3">Get Directions</button>
        </div>
        <button @click="getCurrentLocation" class="btn btn-secondary mt-3">Get Current Location</button>
        <div id="route-info" class="mt-3">
          <div v-for="(route, index) in routeInfo" :key="index">
            <strong>{{ route.mode }}:</strong> {{ route.duration }} ({{ route.distance }})
          </div>
        </div>
      </div>
      <div class="col-8 ">
        <div class="card-body">
          <div class="rounded" id="map" style="height: 500px; width: 100%;"></div>
        </div>
      </div>
    </div>
  </WebLayout>
</template>

<script>
import { onMounted, ref } from 'vue';
import WebLayout from '@/Components/Layouts/WebLayout.vue';
export default {
  name: 'GoogleMap',
  components: { WebLayout },
  setup() {
    const sourceAddress = ref('');
    const destAddress = ref('');
    const routeInfo = ref([]);
    const currentLocation = ref(null);
    let map, directionsService, directionsRenderer;
    let sourceAutocomplete, desAutocomplete;

    onMounted(() => {
      initMap();
    });

    function initMap() {
      map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: 12.5657, lng: 104.9910 }, // Centering the map on Cambodia
        zoom: 7.5,
        rotateControl: true,
        zoomControl: true,
        zoomControlOptions: {
          position: google.maps.ControlPosition.RIGHT_CENTER
        },
        rotateControlOptions: {
          position: google.maps.ControlPosition.RIGHT_TOP
        },
        mapTypeControl: true,
        mapTypeControlOptions: {
          style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
          position: google.maps.ControlPosition.TOP_CENTER
        },
        streetViewControl: true,
        streetViewControlOptions: {
          position: google.maps.ControlPosition.RIGHT_BOTTOM
        }
      });

      var input = document.createElement('input');
      input.placeholder = 'Enter location...';
      input.classList.add('controls');
      input.style.marginTop = '20px';
      input.style.height = '40px';
      input.style.fontSize = '15px';
      input.style.margin = '5px';
      map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

      var searchBox = new google.maps.places.SearchBox(input);
      map.addListener('bounds_changed', function () {
        searchBox.setBounds(map.getBounds());
      });
      var markers = [];
      searchBox.addListener('places_changed', function () {
        var places = searchBox.getPlaces();

        if (places.length == 0) {
          return;
        }

        // Clear out the old markers
        markers.forEach(function (marker) {
          marker.setMap(null);
        });
        markers = [];

        // For each place, get the icon, name and location
        var bounds = new google.maps.LatLngBounds();
        places.forEach(function (place) {
          if (!place.geometry) {
            console.log("Returned place contains no geometry");
            return;
          }

          var icon = {
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(25, 25)
          };

          // Create a marker for each place
          markers.push(new google.maps.Marker({
            map: map,
            icon: icon,
            title: place.name,
            position: place.geometry.location
          }));

          if (place.geometry.viewport) {
            // Only geocodes have viewport
            bounds.union(place.geometry.viewport);
          } else {
            bounds.extend(place.geometry.location);
          }
        });
        map.fitBounds(bounds);
      });

      google.maps.event.addListener(map, "click", function (event) {
        this.setOptions({ scrollwheel: true });
      });
      directionsService = new google.maps.DirectionsService();
      directionsRenderer = new google.maps.DirectionsRenderer();
      directionsRenderer.setMap(map);
      sourceAutocomplete = new google.maps.places.Autocomplete(
        document.getElementById('source')
      );
      desAutocomplete = new google.maps.places.Autocomplete(
        document.getElementById('dest')
      );
    }
    function getCurrentLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(position => {
          const lat = position.coords.latitude;
          const lng = position.coords.longitude;
          currentLocation.value = { lat, lng };
          map.setCenter(currentLocation.value);
          new google.maps.Marker({
            position: currentLocation.value,
            map: map,
            title: "Current Location"
          });
        }, error => {
          console.error('Error getting location', error);
        });
      } else {
        console.error('Geolocation is not supported by this browser.');
      }
    }
    function calcRoute() {
      const source = currentLocation.value ? currentLocation.value : sourceAddress.value;
      const dest = destAddress.value;
      const travelModes = ["DRIVING", "WALKING", "BICYCLING"];
      directionsRenderer.set('directions', null); // Clear previous directions
      routeInfo.value = []; // Clear previous route info
      travelModes.forEach(mode => {
        let request = {
          origin: source,
          destination: dest,
          travelMode: mode
        };
        directionsService.route(request, function (result, status) {
          if (status == "OK") {
            if (mode === "DRIVING") {
              directionsRenderer.setDirections(result);
            }
            displayRouteInfo(result, mode);
          } else {
            console.error('Directions request failed due to ' + status);
          }
        });
      });
    }
    function displayRouteInfo(result, mode) {
      let route = result.routes[0].legs[0];
      let duration = route.duration.text;
      let distance = route.distance.text;
      let modeText = mode.charAt(0) + mode.slice(1).toLowerCase();
      routeInfo.value.push({
        mode: modeText,
        duration: duration,
        distance: distance
      });
    }
    return {
      sourceAddress,
      destAddress,
      routeInfo,
      getCurrentLocation,
      calcRoute
    };
onMounted(() => {
  map = leaflet.map('map').setView([userMarker.value.latitude, userMarker.value.longitude], 13)

  leaflet
    .tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    })
    .addTo(map)

  nearbyMarkers.value.forEach(({ latitude, longitude }) => {
    leaflet
      .marker([latitude, longitude])
      .addTo(map)
      .bindPopup(
        Saved Marker at (<strong>${latitude.toFixed(2)},${longitude.toFixed(2)}</strong>)
      )
  })

  map.addEventListener('click', (e) => {
    const { lat: latitude, lng: longitude } = e.latlng

    leaflet
      .marker([latitude, longitude])
      .addTo(map)
      .bindPopup(
        Saved Marker at (<strong>${latitude.toFixed(2)},${longitude.toFixed(2)}</strong>)
      )

    nearbyMarkers.value.push({ latitude, longitude })
  })
})

watchEffect(() => {
  if (
    coords.value.latitude !== Number.POSITIVE_INFINITY &&
    coords.value.longitude !== Number.POSITIVE_INFINITY
  ) {
    userMarker.value.latitude = coords.value.latitude
    userMarker.value.longitude = coords.value.longitude

    if (userGeoMarker) {
      map.removeLayer(userGeoMarker)
    }

    userGeoMarker = leaflet
      .marker([userMarker.value.latitude, userMarker.value.longitude])
      .addTo(map)
      .bindPopup('User Marker')

    map.setView([userMarker.value.latitude, userMarker.value.longitude], 13)

    const el = userGeoMarker.getElement()
    if (el) {
      el.style.filter = 'hue-rotate(120deg)'
    }
  }
}
</script>
<style>
</style>