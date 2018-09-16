<template>
    <div>
        <div class="row">
          <div class="col-2">
            <label for="distance_slider">Distance : <strong style="color: #008cff;">{{distance_value}} KM</strong></label>
          </div> 
          <div class="col-10">
            <div class="form-group">
            <input class="form-control" type="range" min="0" max="1000" step="50" id="distance_slider" name="distance_slider" @change="getShopsByDistance()" v-model="distance_value" />
            </div>
          </div> 
        </div>
        <br>
        <div class="row">
            <div class="col-lg-3" v-for="(shop, index) in shops" v-if="shops.length > 0" :key="index">
              <parts-card :id="getIDCard(index+1)">
                <img slot="shop_image" :src="getImgUrl(shop.image)" class="card-img-top" :alt="shop.name">
                <h5 slot="shop_name" class="card-title text-primary">{{ shop.name }}</h5>
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
      shops: []
    };
  },
  mounted() {
    this.getShops();
  },
  methods: {
    getShops() {
      axios.get("shops").then(response => {
        this.shops = response.data.shops;
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
    },
    getShopsByDistance() {
      console.log("Distance Value => ", this.distance_value);
    }
  }
};
</script>
