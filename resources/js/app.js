require('./bootstrap');
window.Vue = require('vue');
window.Event = new Vue();
require('./global');
require('./modals');
require('./parts');

Vue.component('app', require('./components/App.vue'));
import {
    router
} from './routes.js';

const app = new Vue({
    el: '#app',
    router,
    data() {
        return {
            table: ''
        }
    },
    created() {
        Event.$on('logout-app', () => {
            this.logoutApp();
        });
    },
    methods: {
        logoutApp() {
            $('#logout-modal').modal('hide');
            axios.get('logout')
                .then((response) => {
                    location.reload();
                });
        }
    }
});
