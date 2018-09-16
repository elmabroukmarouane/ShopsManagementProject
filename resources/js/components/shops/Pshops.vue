<template>
        <div class="row">
            <div class="col-lg-3" v-for="(shop, index) in shops" v-if="shops.length > 0" :key="index">
              <parts-card :id="getIDCard(index+1)">
                <img slot="shop_image" :src="getImgUrl(shop.image)" class="card-img-top" alt="Card image cap">
                <h5 slot="shop_name" class="card-title text-primary">{{ shop.name }}</h5>
                <span slot="shop_footer">
                  <button @click="removeShop(index)" type="button" class="btn btn-danger waves-effect waves-light m-1"><i class="fa fa-trash"></i> Remove</button>
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
</template>

<script>
export default {
  data() {
    return {
      shops: []
    };
  },
  mounted() {
    this.getPShops();
  },
  methods: {
    getPShops() {
      axios.get("listprefrredshops").then(response => {
        this.shops = response.data.shops;
      });
    },
    removeShop(index) {
      swal({
        title: "Remove shop from preferred list ?",
        text: "Are you sure? !",
        icon: "warning",
        buttons: true,
        dangerMode: true
      }).then(willDelete => {
        if (willDelete) {
          axios
            .delete("listprefrredshops/" + this.shops[index].id)
            .then(response => {
              this.shops.splice(index, 1);
              Event.$emit(
                "swal-message",
                "Remove",
                response.data.message,
                "success",
                2000
              );
            })
            .catch(error => {});
        } else {
          Event.$emit(
            "swal-message",
            "Canceled",
            "Action canceled !",
            "error",
            2000
          );
        }
      });
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
