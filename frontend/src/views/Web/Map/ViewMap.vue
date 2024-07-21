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
  }
};
</script>

<style>
/* Add your styles here if necessary */
</style>
