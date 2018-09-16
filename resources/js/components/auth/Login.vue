<template>
<form id="signinForm" action="javascript:void(0)">
              <div :class="color_alert" role="alert">
                <!-- <button type="button" class="close" data-dismiss="alert">×</button> -->
                  <div :class="icon_alert">
                    <i class="icon-info"></i>
                  </div>
                  <div class="alert-message">
                    <span><strong>{{ msg_login_success }}</strong> </span>
                  </div>
                </div>
                <div class="form-group">
                <div class="position-relative has-icon-right">
                    <label for="email" class="sr-only">Email</label>
                    <input v-on:keyup.enter="login()" v-model="email" type="email" name="email" id="email" class="form-control form-control-rounded" placeholder="Email">
                    <div class="form-control-position">
                        <i class="icon-user"></i>
                    </div>
                </div>
                </div>
                <div class="form-group">
                <div class="position-relative has-icon-right">
                    <label for="password" class="sr-only">Password</label>
                    <input v-on:keyup.enter="login()" v-model="password" type="password" name="password" id="password" class="form-control form-control-rounded" placeholder="Password">
                    <div class="form-control-position">
                        <i class="icon-lock"></i>
                    </div>
                </div>
                </div>
                <div class="form-row mr-0 ml-0">
                <div class="form-group col-6">
                <div class="demo-checkbox">
                    <input type="checkbox" id="user-checkbox" class="filled-in chk-col-primary" checked="" />
                    <label for="user-checkbox">Remember me</label>
                </div>
                </div>
                </div>
                <button @click="login()" type="submit" class="btn btn-primary shadow-primary btn-round btn-block waves-effect waves-light">Sign In</button>
                <div class="text-center pt-3">
                    <p class="text-muted">Do not have an account? <a href="javascript:void(0)" @click="$router.push({ path: '/auth/register' })"> Sign Up here</a></p>
                </div>
                </form>
</template>

<script>
export default {
  data() {
    return {
      color_alert: "alert alert-icon-info alert-dismissible alert-round",
      icon_alert: "alert-icon icon-part-info icon-part-round",
      msg_login_success: "Please enter your Email and password !",
      email: "",
      password: ""
    };
  },
  mounted() {
    this.init_validate_signin_form();
  },
  methods: {
    init_validate_signin_form() {
      $("#signinForm").validate({
        rules: {
          email: {
            required: true,
            email: true
          },
          password: {
            required: true,
            minlength: 6
          }
        },
        messages: {
          password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 6 characters"
          },
          email: {
            required: "Please enter your email address",
            email: "Please enter a valid email address"
          }
        }
      });
    },
    login() {
      axios
        .post("login", {
          email: this.email,
          password: this.password
        })
        .then(response => {
          this.color_alert =
            "alert alert-icon-success alert-dismissible alert-round";
          this.icon_alert = "alert-icon icon-part-success icon-part-round";
          this.msg_login_success = response.data.msg;
          setTimeout(this.redirectFunction, 2000);
        })
        .catch(error => {
          this.email = "";
          this.password = "";
          this.color_alert =
            "alert alert-icon-danger alert-dismissible alert-round";
          this.icon_alert = "alert-icon icon-part-danger icon-part-round";
          this.msg_login_success = error.response.data.msg;
        });
    },
    redirectFunction() {
      this.$router.push({ path: "/nearby-shops" });
    }
  }
};
</script>