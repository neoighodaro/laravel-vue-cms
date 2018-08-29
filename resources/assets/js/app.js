
require('./bootstrap');
import Vue          from 'vue'
import VueRouter    from 'vue-router'
Vue.use(VueRouter)
import Homepage from './components/Homepage'
import Create   from './components/Create'
import Read     from './components/Read'
import Update   from './components/Update'
import Comments from './components/Comments'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/admin/dashboard',
            name: 'read',
            component: Read,
            props: true
        },
        {
            path: '/admin/create',
            name: 'create',
            component: Create,
            props: true
        },
        {
            path: '/admin/update',
            name: 'update',
            component: Update,
            props: true
        },
    ],
});
const app = new Vue({
    el: '#app',
    components: { Homepage, Comments },
    router,
});