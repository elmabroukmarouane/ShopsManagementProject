<template>
    <form action="javascript:void(0)" ref="form">
                    <h3 class="mr-auto">Register</h3>
                    <br />
                    <div :class="color_alert" role="alert">
                    {{ msg_login_success }}
                    </div>
                    <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-user"></i></span>
                        </div>
                        <input v-on:keyup.enter="register()" type="text" v-model="name" name="name" class="form-control" placeholder="Firstname & Lastname" required>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-user"></i></span>
                        </div>
                        <input v-on:keyup.enter="register()" v-model="email" name="email" placeholder="E-mail address" type="email" class="form-control" required>
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-lock"></i></span>
                        </div>
                        <input v-on:keyup.enter="register()" type="password" v-model="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    </div>
                    <div class="form-group" style="border: 1px solid #e5e5e5; border-radius: 6px;">
                      <textarea v-on:keyup.enter="register()" v-model="address" name="address" class="form-control" id="address" placeholder="Address" required></textarea>
                    </div>
                    <div class="form-group">
                    <button @click="register()" class="btn btn-primary submit-btn">SIGN UP</button>
                    </div>
                </form>
</template>

<script>
export default {
  data() {
    return {
      color_alert: "mb-5 mr-auto alert alert-primary",
      msg_login_success: "Please fill all the information below !",
      name: "",
      email: "",
      password: "",
      address: ""
    };
  },
  methods: {
    register() {
      if (
        this.name != "" &&
        this.email != "" &&
        this.password != "" &&
        this.address != ""
      ) {
        axios
          .post("register", {
            name: this.name,
            email: this.email,
            password: this.password,
            address: this.address
          })
          .then(response => {
            this.color_alert = "mb-5 mr-auto alert alert-success";
            this.msg_login_success = response.data.msg;
            setTimeout(this.redirectFunction, 2000);
          })
          .catch(error => {
            this.$refs.form.reset();
            this.color_alert = "mb-5 mr-auto alert alert-danger";
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