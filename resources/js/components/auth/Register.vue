<template>
    <form id="signupForm" action="javascript:void(0)">
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
				  <label for="name" class="sr-only">Name</label>
				  <input v-on:keyup.enter="register()" v-model="name" type="text" id="name" name="name" class="form-control form-control-rounded" placeholder="Firstname & Lastname">
				  <div class="form-control-position">
					  <i class="icon-user"></i>
				  </div>
			   </div>
			  </div>
			  <div class="form-group">
			   <div class="position-relative has-icon-right">
				  <label for="email" class="sr-only">Email</label>
				  <input v-on:keyup.enter="register()" v-model="email" type="email" name="email" id="email" class="form-control form-control-rounded" placeholder="E-mail address">
				  <div class="form-control-position">
					  <i class="icon-envelope-open"></i>
				  </div>
			   </div>
			  </div>
			  <div class="form-group">
			   <div class="position-relative has-icon-right">
				  <label for="password" class="sr-only">Password</label>
				  <input v-on:keyup.enter="register()" v-model="password" type="password" name="password" id="password" class="form-control form-control-rounded" placeholder="Password">
				  <div class="form-control-position">
					  <i class="icon-lock"></i>
				  </div>
			   </div>
			  </div>
			  <div class="form-group">
			   <div class="position-relative has-icon-right">
				  <label for="confirm_password" class="sr-only">Retry Password</label>
				  <input v-on:keyup.enter="register()" v-model="confirm_password" type="password" name="confirm_password" id="confirm_password" class="form-control form-control-rounded" placeholder="Retry Password">
				  <div class="form-control-position">
					  <i class="icon-lock"></i>
				  </div>
			   </div>
			  </div>
        <!-- <div class="form-group row">
				  <label for="address" class="sr-only">Address</label>
				  <textarea v-on:keyup.enter="register()" v-model="address" name="address" class="form-control form-control-rounded" id="address" placeholder="Address"></textarea>
				</div> -->
			 <button @click="register()" type="submit" class="btn btn-primary shadow-primary btn-round btn-block waves-effect waves-light">Sign Up</button>
			  <div class="text-center pt-3">
				<p class="text-muted">Already have an account? <a href="javascript:void(0)" @click="$router.push({ path: '/auth/login' })"> Sign In here</a></p>
			  </div>
			 </form>
</template>

<script>
export default {
  data() {
    return {
      color_alert: "alert alert-icon-info alert-dismissible alert-round",
      icon_alert: "alert-icon icon-part-info icon-part-round",
      msg_login_success: "Please fill all the information below !",
      name: "",
      email: "",
      password: "",
      confirm_password: ""
      //address: ""
    };
  },
  mounted() {
    this.init_validate_signup_form();
  },
  methods: {
    init_validate_signup_form() {
      $("#signupForm").validate({
        rules: {
          name: "required",
          email: {
            required: true,
            email: true
          },
          password: {
            required: true,
            minlength: 6
          },
          confirm_password: {
            required: true,
            minlength: 6,
            equalTo: "#password"
          }
          //address: "required"
        },
        messages: {
          name: "Please enter your First & Lastname",
          email: {
            required: "Please enter your email address",
            email: "Please enter a valid email address"
          },
          password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 6 characters long"
          },
          confirm_password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 6 characters long",
            equalTo: "Please enter the same password as above"
          }
          //address: "Please enter your address"
        }
      });
    },
    register() {
      if (
        this.name != "" &&
        this.email != "" &&
        this.password != "" /* &&
        this.address != "" */
      ) {
        axios
          .post("register", {
            name: this.name,
            email: this.email,
            password: this.password /* ,
            address: this.address */
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
      }
    },
    redirectFunction() {
      this.$router.push({ path: "/auth/login" });
    }
  }
};
</script>