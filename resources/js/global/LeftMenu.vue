<template>
    <!--Start sidebar-wrapper-->
    <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
      <div class="brand-logo">
        <a href="index-2.html">
        <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
        <h5 class="logo-text">Shops Project</h5>
      </a>
    </div>
    <ul class="sidebar-menu do-nicescrol">
        <li class="sidebar-header">MENU PROJECT</li>
        <li :class="[$route.name == 'Nearby Shops' ? 'active':'']">
          <a href="javascript:void(0)" class="waves-effect" @click="$router.push({ path: '/nearby-shops' })">
            <i class="fa fa-shopping-basket"></i> <span>Nearby Shops</span>
          </a>
        </li>
        <li :class="[$route.name == 'My Preferred Shops' ? 'active':'']">
          <a href="javascript:void(0)" class="waves-effect" @click="$router.push({ path: '/preferred-shops' })">
            <i class="fa fa-heart"></i> <span>My Preferred Shops</span>
          </a>
        </li>
        <li :class="[$route.name == 'Shops Management' ? 'active':'']" v-if="role == 'super_admin'">
          <a href="javascrip:void(0)" class="waves-effect">
            <i class="fa fa-gears"></i> <span>Configurations</span> <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="sidebar-submenu">
            <li :class="[$route.name == 'Shops Management' ? 'active':'']"><a href="javascript:void(0)" @click="$router.push({ path: '/shops-management' })"><i class="fa fa-shopping-cart"></i> Shops Management</a></li>
          </ul>
        </li>
      </ul>
    
    </div>
    <!--End sidebar-wrapper-->
</template>

<script>
export default {
  data() {
    return {
      role: ""
    };
  },
  mounted() {
    this.getroleLogged();
  },
  methods: {
    getroleLogged() {
      axios.get("is-logged").then(response => {
        this.role = response.data.role;
      });
    }
  }
};
</script>
