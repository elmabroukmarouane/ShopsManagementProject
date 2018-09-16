<template>
    <!--Start topbar header-->
  <header class="topbar-nav">
  <nav class="navbar navbar-expand fixed-top bg-white">
    <ul class="navbar-nav mr-auto align-items-center">
      <li class="nav-item">
        <a class="nav-link toggle-menu" href="javascript:void();">
        <i class="icon-menu menu-icon"></i>
      </a>
      </li>
    </ul>
      
    <ul class="navbar-nav align-items-center right-nav-link">
      <li class="nav-item">
        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#" id="logout_dropdown">
          <span class="user-profile"><img src="assets/images/avatars/avatar.png" class="img-circle" alt="user avatar"></span>
        </a>
        <ul class="dropdown-menu dropdown-menu-right">
        <li class="dropdown-item user-details">
          <a href="javaScript:void();">
            <div class="media">
              <div class="avatar"><img class="align-self-start mr-3" src="assets/images/avatars/avatar.png" alt="user avatar"></div>
              <div class="media-body">
              <h6 class="mt-2 user-title">{{ username_logged }}</h6>
              </div>
            </div>
            </a>
          </li>
          <li class="dropdown-divider"></li>
          <li class="dropdown-item" id="logout_ahref"><a @click="showModalLogout()" href="javascript:void();"><i class="icon-power mr-2"></i> Logout</a></li>
        </ul>
      </li>
    </ul>
  </nav>
  </header>
  <!--End topbar header-->
</template>

<script>
export default {
  data() {
    return {
      username_logged: ""
    };
  },
  mounted() {
    this.init_components();
    this.getUsernameLogged();
  },
  methods: {
    getUsernameLogged() {
      axios.get("is-logged").then(response => {
        this.username_logged = response.data.name_user;
      });
    },
    init_components() {
      "use strict";

      //sidebar menu js
      $.sidebarMenu($(".sidebar-menu"));

      // === toggle-menu js

      $(".toggle-menu").on("click", function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });

      // === sidebar menu activation js

      $(function() {
        for (
          var i = window.location,
            o = $(".sidebar-menu a")
              .filter(function() {
                return this.href == i;
              })
              .addClass("active")
              .parent()
              .addClass("active");
          ;

        ) {
          if (!o.is("li")) break;
          o = o
            .parent()
            .addClass("in")
            .parent()
            .addClass("active");
        }
      }),
        /* Back To Top */

        $(document).ready(function() {
          $(window).on("scroll", function() {
            if ($(this).scrollTop() > 300) {
              $(".back-to-top").fadeIn();
            } else {
              $(".back-to-top").fadeOut();
            }
          });
          $(".back-to-top").on("click", function() {
            $("html, body").animate({ scrollTop: 0 }, 600);
            return false;
          });
        });

      $(function() {
        $('[data-toggle="popover"]').popover();
      });

      $(function() {
        $('[data-toggle="tooltip"]').tooltip();
      });
      $("#logout_dropdown").dropdown();
    },
    showModalLogout() {
      $("#logout-modal").modal("show");
    }
  }
};
</script>

<style>
#logout_ahref:active {
  background-color: transparent;
}
</style>