import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

function requireAuth(to, from, next) {
    if (to.name !== "Login" || to.name !== "Register") {
        axios.get("is-logged").then(response => {
            if (response.data.auth_check == true) {
                next();
            } else {
                next({
                    path: "/auth/login"
                });
            }
        });
    }
}

const routes = [{
        path: '/',
        component: require('./components/layouts/LayoutApp.vue'),
        beforeEnter: requireAuth,
        children: [{
            name: 'Nearby Shops',
            path: '/nearby-shops',
            component: require('./components/shops/Nshops.vue'),
        }],
    },
    {
        path: '/auth',
        component: require('./components/layouts/LayoutLogin.vue'),
        children: [{
                name: 'Login',
                path: 'login',
                component: require('./components/auth/Login.vue')
            },
            {
                name: 'Register',
                path: 'register',
                component: require('./components/auth/Register.vue')
            },
        ],
    },
];

export const router = new VueRouter({
    routes
});
export default router
