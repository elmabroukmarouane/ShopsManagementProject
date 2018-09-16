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
        Event.$on('swal-message', (title, message, icon, timer) => {
            this.sweetAlertMessage(title, message, icon, timer);
        });
    },
    methods: {
        logoutApp() {
            $('#logout-modal').modal('hide');
            axios.get('logout')
                .then((response) => {
                    location.reload();
                });
        },
        sweetAlertMessage(title, message, icon, timer) {
            swal({
                title: title,
                text: message,
                icon: icon,
                timer: timer
            });
        }
    }
});
