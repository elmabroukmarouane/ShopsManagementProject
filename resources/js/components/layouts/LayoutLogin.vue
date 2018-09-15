<template>
    <!-- Start wrapper-->
    <div id="wrapper">
        <div class="card border-primary border-top-sm border-bottom-sm card-authentication1 mx-auto my-5 animated bounceInDown">
            <div class="card-body">
            <div class="card-content p-2">
                <div class="text-center">
                    <img src="assets/images/logo-icon.png">
                </div>
            <div class="nav-get-started" v-if="this.$route.name == 'Login'">
                <div class="card-title text-uppercase text-center py-3">Sign In</div>
            </div>
            <div class="nav-get-started" v-else-if="this.$route.name == 'Register'">
                <div class="card-title text-uppercase text-center py-3">Sign Up</div>
            </div>
            <router-view></router-view>
            </div>
            </div>
            </div>
        
        <!--Start Back To Top Button-->
        <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
        <!--End Back To Top Button-->
        </div><!--wrapper-->
</template>

<script>
export default {};
</script>
