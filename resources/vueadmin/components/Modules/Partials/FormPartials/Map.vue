<template>
  <div class="row">
    <span>با حرکت دادن مکان‌نما محدوده ملک خود را مشخص کنید</span>
    <input v-model="data.latitude" type="hidden" name="latitude" />
    <input v-model="data.longitude" type="hidden" name="longitude" />
    <div id="mapid" class="col-md-6" style="z-index: 0;"></div>
    <div class="form-group col-md-6">
      <label for="formGroupExampleInput">استان</label>
      <input
        v-model="data.province"
        type="text"
        class="form-control"
        name="province"
        readonly
      />
      <label for="formGroupExampleInput">شهر</label>
      <input
        v-model="data.city"
        type="text"
        class="form-control"
        name="city"
        readonly
      />
      <label for="formGroupExampleInput">منطقه</label>
      <input
        v-model="data.region"
        type="text"
        class="form-control"
        name="region"
        readonly
      />
      <label for="formGroupExampleInput">محله</label>
      <input
        v-model="data.neighborhood"
        type="text"
        class="form-control"
        name="neighborhood"
        readonly
      />

      <div class="form-group">
        <label for="formGroupExampleInput">آدرس</label>
        <textarea
          v-model="data.address"
          name="address"
          type="text"
          class="form-control"
          placeholder="آدرس"
        ></textarea>
      </div>
    </div>
  </div>
</template>

<script>
import { onMounted } from "vue";
import * as $ from "jquery";
import "../../../../../../node_modules/leaflet/dist/leaflet.css";
import "../../../../../../node_modules/leaflet/dist/leaflet.js";

export default {
  props: {
    data: Object,
  },
  // updated() {
  //   console.log(this.$props.data);
  // },
  // created() {
  //   console.log(this.$props.data);
  // },
  // renderTracked() {
  //   console.log(this.$props.data);
  // },
  // renderTriggered() {
  //   console.log(this.$props.data);
  // },
  // activated() {
  //   console.log(this.$props.data);
  // },
  // serverPrefetch() {
  //   console.log(this.$props.data);
  // },
  setup(props) {
    onMounted(() => {
      let latitude = props.data.latitude ?? 36.575643580840264;
      let longitude = props.data.longitude ?? 52.01935719209333;
      var mymap = L.map("mapid").setView([latitude, longitude], 15);
      L.tileLayer(
        "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
        {
          attribution:
            'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
          maxZoom: 18,
          id: "mapbox/streets-v11",
          tileSize: 512,
          zoomOffset: -1,
          accessToken:
            "pk.eyJ1IjoiaG9zc3MiLCJhIjoiY2t1MTlnaWViMWh5bDJucWh1Z2p6ZHlsOSJ9.mhgrXXbEhSIfHKGioJh2Xg",
        }
      ).addTo(mymap);

      var myIcon = L.icon({
        iconUrl: "/images/map/marker-icon.png",
        iconRetinaUrl:
          "/images/map/marker-icon.png",
        iconSize: [30, 40],
        iconAnchor: [10, 40],
        popupAnchor: [0, 0],
        shadowUrl: "/images/map/marker-icon.png",
        shadowRetinaUrl:
          "/images/map/marker-icon.png",
        shadowSize: [0, 0],
        shadowAnchor: [0, 0],
      });

      var marker = L.marker([latitude, longitude], { icon: myIcon }).addTo(
        mymap
      );

      mymap.on("click", function (e) {
        mymap.removeLayer(marker);
        latitude = e.latlng.lat;
        longitude = e.latlng.lng;
        marker = L.marker([e.latlng.lat, e.latlng.lng], { icon: myIcon }).addTo(
          mymap
        );
        let url = `https://map.ir/reverse?lat=${latitude}&lon=${longitude}&x-api-key=eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjI4NDAxOGI1YWJkNGU0NzA1Yjg0MzNjYmE1MGYyYjY4MjdjYjliYzVlNzI5NzVlOTgwN2FjZTQzNGU3ODc4OGQ2OWFlNTBjMDk5ZGM2MzlkIn0.eyJhdWQiOiIxNTYwOSIsImp0aSI6IjI4NDAxOGI1YWJkNGU0NzA1Yjg0MzNjYmE1MGYyYjY4MjdjYjliYzVlNzI5NzVlOTgwN2FjZTQzNGU3ODc4OGQ2OWFlNTBjMDk5ZGM2MzlkIiwiaWF0IjoxNjMyNjQ0MDA1LCJuYmYiOjE2MzI2NDQwMDUsImV4cCI6MTYzNTE0OTYwNSwic3ViIjoiIiwic2NvcGVzIjpbImJhc2ljIl19.llZpUhTVPXDi7Kcd-AIrMQDUbQbJUj0J1sJa_8Jv1PnNYN2FGqEZRjZhqQhgJamOCBDjXTyco_3sf-4GODUkGPX0v1nrYptI1L43-hbFHxdNERMpTsWvT2d5spzcAsES_PM0jVIN_H-IrcdvG3hPmSVBNRAbk8a3mX0riMF2L6NmSBx8kiXVC0gO6z3wqUZIRZr07GBfNaLVtGFWEgHSkWBvGl6_dmeq8WgiApP1sEbd7H1WR1tn70CJgmdrkvBkFTtQR8WOpE81g1MPOilPwSKGOs88kHB1_1mcTSkUHdJWVsESiWNAhsBIp4UpnIfrxAS9oAonecGnyDkROEHIeA`;
        $.ajax({
          type: "GET",
          url: url,
          success: function (result) {
            // $("input[name=province]").val(result.province).change();
            props.data.province = result.province;
            props.data.city = result.city;
            props.data.region = result.region;
            props.data.neighborhood = result.neighbourhood;
            props.data.address = result.address;
            props.data.latitude = result.latitude;
            props.data.province = result.province;
            props.data.latitude = latitude;
            props.data.longitude = longitude;
          },
          error: function (jqXhr, textStatus, errorMessage) {
            // error callback
            // alert(jqXhr + " " + textStatus);
          },
        });
      });
    });
    return {};
  },
};
</script>

<style>
#mapid {
  height: 400px;
}
</style>
