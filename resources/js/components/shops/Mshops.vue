<template>
    <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> Shops List</div>
            <div class="card-body">
                <div class="btn-group m-1" role="group">
                  <button type="button" class="btn btn-primary waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dropdown_action_shops">
                    Actions
                  </button>
                  <div class="dropdown-menu">
                    <button @click="initAddShop()" type="button" class="dropdown-item" style="cursor:pointer;"><i class="fa fa-plus"></i> ADD SHOP</button>
                    <div class="dropdown-divider"></div>
                    <button @click="refreshTable()" type="button" class="dropdown-item" style="cursor:pointer;"><i class="fa fa-refresh"></i> REFRESH TABLE</button>
                  </div>
                </div>
                <br>
                <br>
                <div class="table-responsive">
                    <parts-data-table id="shops_list" :list_datatable_fields="list_datatable_fields">
                        <tr slot="tbody_tr_table" v-for="(shop, index) in shops" v-if="shops.length > 0" :key="index">
                            <td>{{ shop.name }}</td>
                            <td> 
                                <a :href="getImgUrl(shop.image)" data-fancybox="images" :data-caption="shop.name">
                                    <img :src="getImgUrl(shop.image)" :alt="shop.name" class="lightbox-thumb img-thumbnail">
                                </a>
                            </td>
                            <td>{{ shop.address }} <strong style="color: #008cff;">({{ shop.lat }}, {{ shop.lng }})</strong></td>
                            <td>
                                <button @click="initUpdateShop(index)" type="button" class="btn btn-warning waves-effect waves-light m-1"><i class="fa fa-edit"></i></button>
                                <button @click="removeShop(index)" type="button" class="btn btn-danger waves-effect waves-light m-1"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    </parts-data-table>
                </div>
            </div>
          </div>
        </div>
        <parts-modal id="add-modal">
            <div slot="header_modal" class="modal-header">
                <h5 class="modal-title"><i class="fa fa-plus"></i> Add Shop !</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div slot="body_modal" class="modal-body">
                <form id="add_shop_form" method="post" action="javascript:void(0)">
                    <div class="form-group row">
                        <label for="add_shop_name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input v-on:keyup.enter="addShop()" v-model="shop.name" type="text" class="form-control" id="add_shop_name" name="add_shop_name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="add_shop_image" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <input @change="onSelectedImage" type="file" class="form-control" id="add_shop_image" name="add_shop_image" accept="image/*" required>
                        </div>
                    </div>
                    <!-- <div class="form-group row">
                        <label for="add_shop_address" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <textarea v-on:keyup.enter="addShop()" v-model="shop.address" class="form-control" rows="4" id="add_shop_address" name="add_shop_address" required></textarea>
                        </div>
                    </div> -->
                    <div class="form-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">CANCEL</button>
                        <button @click="addShop()" type="submit" class="btn btn-danger">ADD</button>
                    </div>
                </form>
            </div>
        </parts-modal>
        <parts-modal id="update-modal">
            <div slot="header_modal" class="modal-header">
                <h5 class="modal-title"><i class="fa fa-plus"></i> Update Shop !</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div slot="body_modal" class="modal-body">
                <form id="update_shop_form" method="post" action="javascript:void(0)">
                    <div class="form-group row">
                        <label for="update_shop_name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input v-on:keyup.enter="updateShop()" v-model="shop_update.name" type="text" class="form-control" id="update_shop_name" name="update_shop_name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="update_shop_image" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <input @change="onSelectedImageUpdate" type="file" class="form-control" id="update_shop_image" name="update_shop_image" accept="image/*">
                        </div>
                    </div>
                    <!-- <div class="form-group row">
                        <label for="update_shop_address" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <textarea v-on:keyup.enter="updateShop()" v-model="shop_update.address" class="form-control" rows="4" id="update_shop_address" name="update_shop_address" required></textarea>
                        </div>
                    </div> -->
                    <div class="form-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">CANCEL</button>
                        <button @click="updateShop()" type="submit" class="btn btn-danger">UPDATE</button>
                    </div>
                </form>
            </div>
        </parts-modal>
      </div><!-- End Row-->
</template>

<script>
export default {
  data() {
    return {
      shop: {
        name: "",
        selectedImage: null /* ,
        address: "" */
      },
      shop_update: {
        name: "",
        selectedImage: null /* ,
        address: "" */
      },
      list_datatable_fields: ["Name", "Image", "Address", "Actions"],
      shops: []
    };
  },
  mounted() {
    this.init_components_forms();
    this.getShops();
  },
  methods: {
    init_components_forms() {
      $("#dropdown_action_shops").dropdown();
      $("#add_shop_form").validate();
      $("#update_shop_form").validate();
    },
    getShops() {
      axios.get("shops").then(response => {
        this.shops = response.data.shops;
        Vue.nextTick(function() {
          Event.$emit("init-datatable", "shops_list");
        });
      });
    },
    initAddShop() {
      Event.$emit("show-modal-normal", "add-modal");
    },
    addShop() {
      if (
        this.shop.name != "" &&
        this.shop.selectedImage != "" /* &&
        this.shop.address != "" */
      ) {
        const formData = new FormData();
        formData.append("name", this.shop.name);
        //formData.append("address", this.shop.address);
        formData.append("selectedImage", this.shop.selectedImage);
        axios
          .post("shops", formData)
          .then(response => {
            this.reset();
            this.refreshTable();
            Event.$emit("hide-modal-normal", "add-modal");
            Event.$emit(
              "swal-message",
              "Add Shop",
              response.data.msg,
              "success",
              2000
            );
          })
          .catch(error => {
            Event.$emit("hide-modal-normal", "add-modal");
            Event.$emit(
              "swal-message",
              "Add Shop",
              "Error Axios ! " + error,
              "error",
              2000
            );
          });
      }
    },
    initUpdateShop(index) {
      this.shop_update = this.shops[index];
      $("#update-modal").modal("show");
    },
    updateShop() {
      if (
        this.shop_update.name != "" &&
        this.shop_update.selectedImage !=
          "" /* &&
        this.shop.address != "" */
      ) {
        const formData = new FormData();
        formData.append("id", this.shop_update.id);
        formData.append("name", this.shop_update.name);
        //formData.append("address", this.shop_update.address);
        formData.append("selectedImage", this.shop_update.selectedImage);
        axios
          .post("update-shop", formData)
          .then(response => {
            if (response.data.image_upload == true) {
              this.refreshTable();
            }
            Event.$emit("hide-modal-normal", "update-modal");
            Event.$emit(
              "swal-message",
              "Update Shop",
              response.data.msg,
              "success",
              2000
            );
          })
          .catch(error => {
            Event.$emit("hide-modal-normal", "update-modal");
            Event.$emit(
              "swal-message",
              "Update Shop",
              "Error Axios ! " + error,
              "error",
              2000
            );
          });
      }
    },
    removeShop(index) {
      swal({
        title: "Remove shop ?",
        text: "Are you sure? !",
        icon: "warning",
        buttons: true,
        dangerMode: true
      }).then(willDelete => {
        if (willDelete) {
          axios
            .delete("shops/" + this.shops[index].id)
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
    destroyDataTable() {
      Event.$emit("destroy-datatable");
    },
    refreshTable() {
      this.destroyDataTable();
      this.getShops();
    },
    reset() {
      this.shop.name = "";
      this.shop.selectedImage = "";
      //this.shop.address = "";
    },
    onSelectedImage(event) {
      this.shop.selectedImage = event.target.files[0];
    },
    onSelectedImageUpdate(event) {
      this.shop_update.selectedImage = event.target.files[0];
    },
    getImgUrl(shop_image_name) {
      var shop_image_path = "assets/images/gallery/" + shop_image_name;
      return shop_image_path;
    }
  }
};
</script>

<style>
.table > tbody > tr > td {
  vertical-align: middle;
}
</style>

