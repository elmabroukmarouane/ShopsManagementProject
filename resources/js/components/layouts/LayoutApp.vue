<template>
    <!-- <div>
      <router-view></router-view>
    </div> -->
  <!-- Start wrapper-->
  <div id="wrapper">
  
    <!--Start sidebar-wrapper-->
    <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
      <div class="brand-logo">
        <a href="index-2.html">
        <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
        <h5 class="logo-text">&nbsp;</h5>
      </a>
    </div>
    <ul class="sidebar-menu do-nicescrol">
        <li class="sidebar-header">MENU PROJECT</li>
        <li>
          <a href="javascript:void(0)" class="waves-effect">
            <i class="fa fa-shopping-basket"></i> <span>Nearby Shops</span>
          </a>
        </li>
      </ul>
    
    </div>
    <!--End sidebar-wrapper-->

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

  <div class="clearfix"></div>
    
    <div class="content-wrapper">
      <div class="container-fluid">
      <!-- Breadcrumb-->
      <div class="row pt-2 pb-2">
          <div class="col-sm-3">
          <h4 class="page-title">Nearby Shops</h4>
      </div>
      <div class="col-sm-9">
        <div class="col-12">
          <vue-slider v-model="value" :min="0" :max="1000" formatter="{value} KM" :interval="10" tooltipDir="left"></vue-slider>
        </div> 
        <div class="col-12">
          <label>Distance</label>
        </div>
      </div>
      </div>
      <!-- End Breadcrumb-->
        
        <h6 class="text-uppercase">Shops List</h6>
        <hr>
        <div class="row">
          <div class="col-lg-3">
          <div class="card card-primary">
            <img src="assets/images/gallery/1.jpg" class="card-img-top" alt="Card image cap">
            <div class="card-body text-center">
              <h5 class="card-title text-primary">Card Sample Title</h5>
              <hr>
              <a href="javascript:void();" class="btn btn-danger waves-effect waves-light m-1"><i class="fa fa-thumbs-o-down"></i></a>
              <a href="javascript:void();" class="btn btn-success waves-effect waves-light m-1"><i class="fa fa-thumbs-o-up"></i></a>
            </div>
          </div>
          </div>
          <div class="col-lg-3">
          <div class="card card-primary">
            <img src="assets/images/gallery/1.jpg" class="card-img-top" alt="Card image cap">
            <div class="card-body text-center">
              <h5 class="card-title text-primary">Card Sample Title</h5>
              <hr>
              <a href="javascript:void();" class="btn btn-danger waves-effect waves-light m-1"><i class="fa fa-thumbs-o-down"></i></a>
              <a href="javascript:void();" class="btn btn-success waves-effect waves-light m-1"><i class="fa fa-thumbs-o-up"></i></a>
            </div>
          </div>
          </div>
          <div class="col-lg-3">
          <div class="card card-primary">
            <img src="assets/images/gallery/1.jpg" class="card-img-top" alt="Card image cap">
            <div class="card-body text-center">
              <h5 class="card-title text-primary">Card Sample Title</h5>
              <hr>
              <a href="javascript:void();" class="btn btn-danger waves-effect waves-light m-1"><i class="fa fa-thumbs-o-down"></i></a>
              <a href="javascript:void();" class="btn btn-success waves-effect waves-light m-1"><i class="fa fa-thumbs-o-up"></i></a>
            </div>
          </div>
          </div>
          <div class="col-lg-3">
          <div class="card card-primary">
            <img src="assets/images/gallery/1.jpg" class="card-img-top" alt="Card image cap">
            <div class="card-body text-center">
              <h5 class="card-title text-primary">Card Sample Title</h5>
              <hr>
              <a href="javascript:void();" class="btn btn-danger waves-effect waves-light m-1"><i class="fa fa-thumbs-o-down"></i></a>
              <a href="javascript:void();" class="btn btn-success waves-effect waves-light m-1"><i class="fa fa-thumbs-o-up"></i></a>
            </div>
          </div>
          </div>
        </div><!--End Row-->
        <div class="row">
          <div class="col-lg-3">
          <div class="card card-primary">
            <img src="assets/images/gallery/1.jpg" class="card-img-top" alt="Card image cap">
            <div class="card-body text-center">
              <h5 class="card-title text-primary">Card Sample Title</h5>
              <hr>
              <a href="javascript:void();" class="btn btn-danger waves-effect waves-light m-1"><i class="fa fa-thumbs-o-down"></i></a>
              <a href="javascript:void();" class="btn btn-success waves-effect waves-light m-1"><i class="fa fa-thumbs-o-up"></i></a>
            </div>
          </div>
          </div>
          <div class="col-lg-3">
          <div class="card card-primary">
            <img src="assets/images/gallery/1.jpg" class="card-img-top" alt="Card image cap">
            <div class="card-body text-center">
              <h5 class="card-title text-primary">Card Sample Title</h5>
              <hr>
              <a href="javascript:void();" class="btn btn-danger waves-effect waves-light m-1"><i class="fa fa-thumbs-o-down"></i></a>
              <a href="javascript:void();" class="btn btn-success waves-effect waves-light m-1"><i class="fa fa-thumbs-o-up"></i></a>
            </div>
          </div>
          </div>
          <div class="col-lg-3">
          <div class="card card-primary">
            <img src="assets/images/gallery/1.jpg" class="card-img-top" alt="Card image cap">
            <div class="card-body text-center">
              <h5 class="card-title text-primary">Card Sample Title</h5>
              <hr>
              <a href="javascript:void();" class="btn btn-danger waves-effect waves-light m-1"><i class="fa fa-thumbs-o-down"></i></a>
              <a href="javascript:void();" class="btn btn-success waves-effect waves-light m-1"><i class="fa fa-thumbs-o-up"></i></a>
            </div>
          </div>
          </div>
          <div class="col-lg-3">
          <div class="card card-primary">
            <img src="assets/images/gallery/1.jpg" class="card-img-top" alt="Card image cap">
            <div class="card-body text-center">
              <h5 class="card-title text-primary">Card Sample Title</h5>
              <hr>
              <a href="javascript:void();" class="btn btn-danger waves-effect waves-light m-1"><i class="fa fa-thumbs-o-down"></i></a>
              <a href="javascript:void();" class="btn btn-success waves-effect waves-light m-1"><i class="fa fa-thumbs-o-up"></i></a>
            </div>
          </div>
          </div>
        </div><!--End Row-->
        <div class="row">
          <div class="col-lg-3">
          <div class="card card-primary">
            <img src="assets/images/gallery/1.jpg" class="card-img-top" alt="Card image cap">
            <div class="card-body text-center">
              <h5 class="card-title text-primary">Card Sample Title</h5>
              <hr>
              <a href="javascript:void();" class="btn btn-danger waves-effect waves-light m-1"><i class="fa fa-thumbs-o-down"></i></a>
              <a href="javascript:void();" class="btn btn-success waves-effect waves-light m-1"><i class="fa fa-thumbs-o-up"></i></a>
            </div>
          </div>
          </div>
          <div class="col-lg-3">
          <div class="card card-primary">
            <img src="assets/images/gallery/1.jpg" class="card-img-top" alt="Card image cap">
            <div class="card-body text-center">
              <h5 class="card-title text-primary">Card Sample Title</h5>
              <hr>
              <a href="javascript:void();" class="btn btn-danger waves-effect waves-light m-1"><i class="fa fa-thumbs-o-down"></i></a>
              <a href="javascript:void();" class="btn btn-success waves-effect waves-light m-1"><i class="fa fa-thumbs-o-up"></i></a>
            </div>
          </div>
          </div>
          <div class="col-lg-3">
          <div class="card card-primary">
            <img src="assets/images/gallery/1.jpg" class="card-img-top" alt="Card image cap">
            <div class="card-body text-center">
              <h5 class="card-title text-primary">Card Sample Title</h5>
              <hr>
              <a href="javascript:void();" class="btn btn-danger waves-effect waves-light m-1"><i class="fa fa-thumbs-o-down"></i></a>
              <a href="javascript:void();" class="btn btn-success waves-effect waves-light m-1"><i class="fa fa-thumbs-o-up"></i></a>
            </div>
          </div>
          </div>
          <div class="col-lg-3">
          <div class="card card-primary">
            <img src="assets/images/gallery/1.jpg" class="card-img-top" alt="Card image cap">
            <div class="card-body text-center">
              <h5 class="card-title text-primary">Card Sample Title</h5>
              <hr>
              <a href="javascript:void();" class="btn btn-danger waves-effect waves-light m-1"><i class="fa fa-thumbs-o-down"></i></a>
              <a href="javascript:void();" class="btn btn-success waves-effect waves-light m-1"><i class="fa fa-thumbs-o-up"></i></a>
            </div>
          </div>
          </div>
        </div><!--End Row-->
        <div class="row">
          <div class="col-lg-3">
          <div class="card card-primary">
            <img src="assets/images/gallery/1.jpg" class="card-img-top" alt="Card image cap">
            <div class="card-body text-center">
              <h5 class="card-title text-primary">Card Sample Title</h5>
              <hr>
              <a href="javascript:void();" class="btn btn-danger waves-effect waves-light m-1"><i class="fa fa-thumbs-o-down"></i></a>
              <a href="javascript:void();" class="btn btn-success waves-effect waves-light m-1"><i class="fa fa-thumbs-o-up"></i></a>
            </div>
          </div>
          </div>
          <div class="col-lg-3">
          <div class="card card-primary">
            <img src="assets/images/gallery/1.jpg" class="card-img-top" alt="Card image cap">
            <div class="card-body text-center">
              <h5 class="card-title text-primary">Card Sample Title</h5>
              <hr>
              <a href="javascript:void();" class="btn btn-danger waves-effect waves-light m-1"><i class="fa fa-thumbs-o-down"></i></a>
              <a href="javascript:void();" class="btn btn-success waves-effect waves-light m-1"><i class="fa fa-thumbs-o-up"></i></a>
            </div>
          </div>
          </div>
          <div class="col-lg-3">
          <div class="card card-primary">
            <img src="assets/images/gallery/1.jpg" class="card-img-top" alt="Card image cap">
            <div class="card-body text-center">
              <h5 class="card-title text-primary">Card Sample Title</h5>
              <hr>
              <a href="javascript:void();" class="btn btn-danger waves-effect waves-light m-1"><i class="fa fa-thumbs-o-down"></i></a>
              <a href="javascript:void();" class="btn btn-success waves-effect waves-light m-1"><i class="fa fa-thumbs-o-up"></i></a>
            </div>
          </div>
          </div>
          <div class="col-lg-3">
          <div class="card card-primary">
            <img src="assets/images/gallery/1.jpg" class="card-img-top" alt="Card image cap">
            <div class="card-body text-center">
              <h5 class="card-title text-primary">Card Sample Title</h5>
              <hr>
              <a href="javascript:void();" class="btn btn-danger waves-effect waves-light m-1"><i class="fa fa-thumbs-o-down"></i></a>
              <a href="javascript:void();" class="btn btn-success waves-effect waves-light m-1"><i class="fa fa-thumbs-o-up"></i></a>
            </div>
          </div>
          </div>
        </div><!--End Row-->
      </div>
      <!-- End container-fluid-->
      
    </div><!--End content-wrapper-->
    <!--Start Back To Top Button-->
      <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
      <!--End Back To Top Button-->
    
    <global-footer></global-footer>
    <div class="modal fade" id="logout-modal">
                  <div class="modal-dialog">
                    <div class="modal-content animated zoomInUp">
                      <div class="modal-header">
                        <h5 class="modal-title"><i class="fa fa-power-off"></i> Logout !</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p>Are you sure that you want to exit the application ?</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Nope :D !</button>
                        <button @click="logout()" type="button" class="btn btn-danger">Yeah, I'm sure :'( !</button>
                      </div>
                    </div>
                  </div>
                </div>
    </div><!--End wrapper-->
</template>

<script>
import vueSlider from "vue-slider-component";
export default {
  components: {
    vueSlider
  },
  data() {
    return {
      value: 100,
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
    },
    logout() {
      Event.$emit("logout-app");
    }
  }
};
</script>

<style>
#logout_ahref:active {
  background-color: transparent;
}
</style>


