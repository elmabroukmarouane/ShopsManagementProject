<template>
    <div class="container-fluid">
      <!-- Breadcrumb-->
      <div class="row pt-2 pb-2">
          <div class="col-sm-3">
          <h4 class="page-title">{{ $route.name }}</h4>
      </div>
      <div class="col-sm-9" v-if="$route.name == 'Nearby Shops'">
        <div class="col-12">
          <vue-slider v-model="value" :min="0" :max="1000" formatter="{value} KM" :interval="10" tooltipDir="left"></vue-slider>
        </div> 
        <div class="col-12">
          <label>Distance</label>
        </div>
      </div>
      </div>
      <!-- End Breadcrumb-->
        <hr>
        <global-content-page></global-content-page>
      </div>
      <!-- End container-fluid-->
</template>

<script>
import vueSlider from "vue-slider-component";
export default {
  components: {
    vueSlider
  },
  data() {
    return {
      value: 100
    };
  },
  mounted() {}
};
</script>
