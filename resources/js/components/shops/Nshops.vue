<template>
    <div>
        <div class="row">
          <div class="col-4">
            <label for="distance_slider">Distance from you <strong style="color: #008cff;">({{ address_logged }}) : </strong><h5 style="color: #008cff;">{{distance_value}} KM</h5></label>
          </div> 
          <div class="col-8">
            <div class="form-group">
            <input class="form-control" type="range" min="0" max="1000" step="50" id="distance_slider" name="distance_slider" @change="getShops()" v-model="distance_value" />
            <div id="googleMap" style="display:none;"></div>
            </div>
          </div> 
        </div>
        <br>
        <div class="row">
            <div class="col-lg-3" v-for="(shop, index) in shops" v-if="shops.length > 0" :key="index">
              <parts-card :id="getIDCard(index+1)">
                <img slot="shop_image" :src="getImgUrl(shop.image)" class="card-img-top" :alt="shop.name">
                <span slot="shop_name">
                  <h5 class="card-title text-primary">{{ shop.name }}</h5>
                  <strong>ADDRESS :</strong> <span style="color: #008cff;">{{ shop.address }}</span><br>
                  <strong>DISTANCE :</strong> <span style="color: #008cff;">{{ Math.round(shop.distance) }} KM</span>
                </span>
                <span slot="shop_footer">
                  <button @click="dislikeShop(index)" type="button" class="btn btn-danger waves-effect waves-light m-1"><i class="fa fa-thumbs-o-down"></i></button>
                  <button @click="likeShop(index)" type="button" class="btn btn-success waves-effect waves-light m-1"><i class="fa fa-thumbs-o-up"></i></button>
                </span>
              </parts-card>
            </div>
            <div class="col-lg-3" v-else-if="shops.length <= 0">
              <parts-card :id="getIDCard(1)">
                <span slot="shop_image"></span>
                <h5 slot="shop_name" class="card-title text-primary">No shop in your preferred list yet !</h5>
                <span slot="shop_footer"></span>
              </parts-card>
            </div>
        </div><!--End Row-->
    </div>
</template>

<script>
export default {
  data() {
    return {
      distance_value: 50,
      address_logged: "",
      shops: []
    };
  },
  mounted() {
    //this.calculateDistance("Tanger, Maroc", "Rabat, Maroc");
    this.getShops();
    this.getAddressLogged();
  },
  methods: {
    getAddressLogged() {
      axios.get("is-logged").then(response => {
        this.address_logged = response.data.address;
      });
    },
    getShops() {
      axios
        .get("get-shops-by-distance/" + this.distance_value)
        .then(response => {
          this.shops = response.data.shops;
        });
    },
    calculateDistance(origin, destination) {
      var myLatLng = { lat: 35.76727, lng: -5.79975 };
      var mapOptions = {
        center: myLatLng,
        zoom: 7,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      };
      var map = new google.maps.Map(
        document.getElementById("googleMap"),
        mapOptions
      );
      var directionsService = new google.maps.DirectionsService();
      var request = {
        origin: origin,
        destination: destination,
        travelMode: google.maps.TravelMode.DRIVING,
        unitSystem: google.maps.UnitSystem.metric
      };
      directionsService.route(request, function(result, status) {
        if (status == google.maps.DirectionsStatus.OK) {
          var array_result_distance = [];
          array_result_distance.push(result.routes[0].legs[0].distance.text);
          array_result_distance.push(result.routes[0].legs[0].duration.text);
          console.log(
            "result.routes[0].legs[0].distance.text => ",
            result.routes[0].legs[0].distance.text,
            "result.routes[0].legs[0].duration.text => ",
            result.routes[0].legs[0].duration.text
          );
        } else {
          Event.$emit(
            "swal-message",
            "Google Maps DistanceMatrix",
            "Could not retrieve driving distance !",
            "error",
            2000
          );
        }
      });
    },
    likeShop(index) {
      axios
        .post("listprefrredshops", {
          shop_id: this.shops[index].id
        })
        .then(response => {
          this.shops.splice(index, 1);
          Event.$emit(
            "swal-message",
            "Like",
            response.data.message,
            "success",
            2000
          );
        })
        .catch(error => {});
    },
    dislikeShop(index) {
      axios
        .post("shopsdislikes", {
          shop_id: this.shops[index].id
        })
        .then(response => {
          this.shops.splice(index, 1);
          Event.$emit(
            "swal-message",
            "Dislike",
            response.data.message,
            "error",
            2000
          );
        })
        .catch(error => {});
    },
    getImgUrl(shop_image_name) {
      var shop_image_path = "assets/images/gallery/" + shop_image_name;
      return shop_image_path;
    },
    getIDCard(index) {
      var card_id = "card_" + index;
      return card_id;
    }
  }
};
</script>
