<template>
    <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header"><i class="fa fa-table"></i> Users List</div>
            <div class="card-body">
                <div class="btn-group m-1" role="group">
                  <button type="button" class="btn btn-primary waves-effect waves-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dropdown_action_users">
                    Actions
                  </button>
                  <div class="dropdown-menu">
                    <button @click="initAdduser()" type="button" class="dropdown-item" style="cursor:pointer;"><i class="fa fa-plus"></i> ADD USER</button>
                    <div class="dropdown-divider"></div>
                    <button @click="refreshTable()" type="button" class="dropdown-item" style="cursor:pointer;"><i class="fa fa-refresh"></i> REFRESH TABLE</button>
                  </div>
                </div>
                <br>
                <br>
                <div class="table-responsive">
                    <parts-data-table id="users_list" :list_datatable_fields="list_datatable_fields">
                        <tr slot="tbody_tr_table" v-for="(user, index) in users" v-if="users.length > 0" :key="index">
                            <td>{{ user.name }}</td>
                            <td><a :href="user.email">{{ user.email }}</a></td>
                            <td>{{ user.address }} <strong style="color: #008cff;">({{ user.lat }}, {{ user.lng }})</strong></td>
                            <td>
                                <button @click="initUpdateUser(index)" type="button" class="btn btn-warning waves-effect waves-light m-1"><i class="fa fa-edit"></i></button>
                                <button @click="removeUser(index)" type="button" class="btn btn-danger waves-effect waves-light m-1"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    </parts-data-table>
                </div>
            </div>
          </div>
        </div>
        <parts-modal id="add-modal">
            <div slot="header_modal" class="modal-header">
                <h5 class="modal-title"><i class="fa fa-plus"></i> Add User !</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div slot="body_modal" class="modal-body">
                <form id="add_user_form" method="post" action="javascript:void(0)">
                    <div class="form-group row">
                        <label for="add_user_name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input v-on:keyup.enter="addUser()" v-model="user.name" type="text" class="form-control" id="add_user_name" name="add_user_name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="add_user_email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input v-on:keyup.enter="addUser()" v-model="user.email" type="email" name="add_user_email" id="add_user_email" class="form-control" placeholder="E-mail address" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="add_user_password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input v-on:keyup.enter="addUser()" v-model="user.password" type="password" name="add_user_password" id="add_user_password" class="form-control" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="add_user_role" class="col-sm-2 col-form-label">Role</label>
                        <div class="col-sm-10">
                            <select class="form-control" v-model="user.role" id="add_user_role" required>
                                <option value="super_admin">Super Administrator</option>
                                <option value="user" selected>User</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">CANCEL</button>
                        <button @click="addUser()" type="submit" class="btn btn-danger">ADD</button>
                    </div>
                </form>
            </div>
        </parts-modal>
        <parts-modal id="update-modal">
            <div slot="header_modal" class="modal-header">
                <h5 class="modal-title"><i class="fa fa-plus"></i> Update User !</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div slot="body_modal" class="modal-body">
                <form id="update_user_form" method="post" action="javascript:void(0)">
                    <div class="form-group row">
                        <label for="update_user_name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input v-on:keyup.enter="updateUser()" v-model="user_update.name" type="text" class="form-control" id="update_user_name" name="update_user_name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="update_user_email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input v-on:keyup.enter="updateUser()" v-model="user_update.email" type="email" name="update_user_email" id="update_user_email" class="form-control" placeholder="E-mail address" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="update_user_password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input v-on:keyup.enter="updateUser()" v-model="user_update.password" type="password" name="update_user_password" id="update_user_password" class="form-control" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="update_user_role" class="col-sm-2 col-form-label">Role</label>
                        <div class="col-sm-10">
                            <select class="form-control" v-model="user_update.role" name="update_user_role" id="update_user_role" required>
                                <option value="super_admin">Super Administrator</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">CANCEL</button>
                        <button @click="updateUser()" type="submit" class="btn btn-danger">UPDATE</button>
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
      user: {
        name: "",
        email: "",
        password: "",
        role: ""
      },
      user_update: {
        name: "",
        email: "",
        password: "",
        role: ""
      },
      list_datatable_fields: ["Name", "Email", "Address", "Actions"],
      users: []
    };
  },
  mounted() {
    this.init_components_forms();
    this.getUsers();
  },
  methods: {
    init_components_forms() {
      $("#dropdown_action_users").dropdown();
      $("#add_user_form").validate();
      $("#update_user_form").validate();
    },
    getUsers() {
      axios.get("users").then(response => {
        this.users = response.data.users;
        Vue.nextTick(function() {
          Event.$emit("init-datatable", "users_list");
        });
      });
    },
    initAdduser() {
      Event.$emit("show-modal-normal", "add-modal");
    },
    addUser() {
      if (
        this.user.name != "" &&
        this.user.email != "" &&
        this.user.password != "" &&
        this.user.role != ""
      ) {
        const formData = new FormData();
        formData.append("name", this.user.name);
        formData.append("email", this.user.email);
        formData.append("password", this.user.password);
        formData.append("role", this.user.role);
        axios
          .post("users", formData)
          .then(response => {
            this.reset();
            this.refreshTable();
            Event.$emit("hide-modal-normal", "add-modal");
            Event.$emit(
              "swal-message",
              "Add User",
              response.data.msg,
              "success",
              2000
            );
          })
          .catch(error => {
            Event.$emit("hide-modal-normal", "add-modal");
            Event.$emit(
              "swal-message",
              "Add User",
              "Error Axios ! " + error,
              "error",
              2000
            );
          });
      }
    },
    initUpdateUser(index) {
      this.user_update = this.users[index];
      $("#update-modal").modal("show");
    },
    updateUser() {
      if (
        this.user_update.name != "" &&
        this.user_update.email != "" &&
        this.user_update.role != ""
      ) {
        axios
          .patch("users/" + this.user_update.id, {
            name: this.user_update.name,
            email: this.user_update.email,
            password: this.user_update.password,
            role: this.user_update.role
          })
          .then(response => {
            Event.$emit("hide-modal-normal", "update-modal");
            Event.$emit(
              "swal-message",
              "Update User",
              response.data.msg,
              "success",
              2000
            );
          })
          .catch(error => {
            Event.$emit("hide-modal-normal", "update-modal");
            Event.$emit(
              "swal-message",
              "Update User",
              "Error Axios ! " + error,
              "error",
              2000
            );
          });
      }
    },
    removeUser(index) {
      swal({
        title: "Remove User ?",
        text: "Are you sure? !",
        icon: "warning",
        buttons: true,
        dangerMode: true
      }).then(willDelete => {
        if (willDelete) {
          axios
            .delete("users/" + this.users[index].id)
            .then(response => {
              this.users.splice(index, 1);
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
      this.getUsers();
    },
    reset() {
      this.user.name = "";
      this.user.name = "";
      this.user.email = "";
      this.user.password = "";
      this.user.role = "";
    }
  }
};
</script>

<style>
.table > tbody > tr > td {
  vertical-align: middle;
}
</style>