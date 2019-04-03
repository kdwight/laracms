import './bootstrap';
// import './NoPay';
import Vue from 'vue';

import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css'
Vue.use(Vuetify);

window.events = new Vue();
window.flash = function (message, level = 'success') {
    window.events.$emit('flash', { message, level });
};

Vue.component('topbar', require('./layouts/Topbar.vue').default);
Vue.component('sidebar', require('./layouts/Sidebar.vue').default);

Vue.component('flash', require('./components/Flash.vue').default);
Vue.component('page', require('./components/Page.vue').default);
Vue.component('page-form', require('./components/PageForm.vue').default);
Vue.component('change-password', require('./components/ChangePassword.vue').default);
Vue.component('user-management', require('./components/UserManagement.vue').default);
Vue.component('user-form', require('./components/UserForm.vue').default);
Vue.component('user-roles', require('./components/UserRoles.vue').default);

const app = new Vue({
    el: '#app'
});
