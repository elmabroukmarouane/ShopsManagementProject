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
        Event.$on('init-datatable', (tableid) => {
            this.datatableThis(tableid);
        });
        Event.$on('destroy-datatable', () => {
            this.destroyThis();
        });
        Event.$on('show-modal-normal', (modalid) => {
            this.showModalNormal(modalid);
        });
        Event.$on('hide-modal-normal', (modalid) => {
            this.hideModalNormal(modalid);
        });
        Event.$on('logout-app', () => {
            this.logoutApp();
        });
        Event.$on('swal-message', (title, message, icon, timer) => {
            this.sweetAlertMessage(title, message, icon, timer);
        });
    },
    methods: {
        datatableThis(tableid) {
            this.table = $('#' + tableid).DataTable();
        },
        destroyThis() {
            this.table.destroy();
        },
        showModalNormal(modalid) {
            $("#" + modalid).modal("show");
        },
        hideModalNormal(modalid) {
            $("#" + modalid).modal("hide");
        },
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
