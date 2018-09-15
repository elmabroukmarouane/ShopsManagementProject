<template>
    <div class="nav-top flex-grow-1">
        <div class="container d-flex flex-row h-100 align-items-center">
          <div class="text-center navbar-brand-wrapper d-flex align-items-center">
            <a class="navbar-brand brand-logo" href="index-2.html"><img src="images/logo.svg" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="index-2.html"><img src="images/logo-mini.svg" alt="logo"/></a>
          </div>
          <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between flex-grow-1">
            <form class="search-field d-none d-md-flex" action="#">
              <div class="form-group mb-0">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-magnifier"></i></span>
                  </div>
                  <input type="text" class="form-control" placeholder="search here...">
                </div>
              </div>
            </form>
            <ul class="navbar-nav navbar-nav-right mr-0 ml-auto">
              <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                  <img src="images/faces/face4.jpg" alt="profile"/>
                  <span class="nav-profile-name">{{ username_logged }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                  <a class="dropdown-item">
                    <i class="icon-logout text-primary mr-2"></i>
                    Logout
                  </a>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="icon-menu text-dark"></span>
            </button>
          </div>
        </div>
      </div>
</template>

<script>
export default {
  data() {
    return {
      username_logged: ""
    };
  },
  mounted() {
    this.initComponents();
    this.getUsernameLogged();
  },
  methods: {
    getUsernameLogged() {
      axios.get("is-logged").then(response => {
        this.username_logged = response.data.name_user;
      });
    },
    initComponents() {
      var current = location.pathname
        .split("/")
        .slice(-1)[0]
        .replace(/^\/|\/$/g, "");
      $(
        ".navbar.horizontal-layout .nav-bottom .page-navigation .nav-item"
      ).each(function() {
        var $this = $(this);
        if (current === "") {
          //for root url
          if (
            $this
              .find(".nav-link")
              .attr("href")
              .indexOf("index.html") !== -1
          ) {
            $(this)
              .find(".nav-link")
              .parents(".nav-item")
              .last()
              .addClass("active");
            $(this).addClass("active");
          }
        } else {
          //for other url
          if (
            $this
              .find(".nav-link")
              .attr("href")
              .indexOf(current) !== -1
          ) {
            $(this)
              .find(".nav-link")
              .parents(".nav-item")
              .last()
              .addClass("active");
            $(this).addClass("active");
          }
        }
      });

      $(".navbar.horizontal-layout .navbar-menu-wrapper .navbar-toggler").on(
        "click",
        function() {
          $(".navbar.horizontal-layout .nav-bottom").toggleClass(
            "header-toggled"
          );
        }
      );

      // Navigation in mobile menu on click
      var navItemClicked = $(".page-navigation >.nav-item");
      navItemClicked.on("click", function(event) {
        if (window.matchMedia("(max-width: 991px)").matches) {
          if (!$(this).hasClass("show-submenu")) {
            navItemClicked.removeClass("show-submenu");
          }
          $(this).toggleClass("show-submenu");
        }
      });

      //checkbox and radios
      $(".form-check .form-check-label,.form-radio .form-check-label")
        .not(".todo-form-check .form-check-label")
        .append('<i class="input-helper"></i>');

      $(window).scroll(function() {
        if (window.matchMedia("(min-width: 992px)").matches) {
          var header = ".navbar.horizontal-layout";
          if ($(window).scrollTop() >= 70) {
            $(header).addClass("fixed-on-scroll");
          } else {
            $(header).removeClass("fixed-on-scroll");
          }
        }
      });
    } /* ,
    showModalLogout() {
      $("#logout-modal").modal("show");
    } */
  }
};
</script>
