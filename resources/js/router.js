import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

// 0. If using a module system (e.g. via vue-cli), import Vue and VueRouter
// and then call `Vue.use(VueRouter)`.

import Home from './Pages/Home';
import Restaurant from './Pages/Restaurant';
import Checkout from './Pages/Checkout';

// 1. Define route components.
// These can be imported from other files


// 2. Define some routes
// Each route should map to a component. The "component" can
// either be an actual component constructor created via
// `Vue.extend()`, or just a component options object.
// We'll talk about nested routes later.
const routes = [
    { path: '/', name: 'home', component: Home },
    { path: '/restaurant/:id', name: 'restaurant', component: Restaurant },
    { path: '/checkout', name: 'checkout', component: Checkout }
]

// 3. Create the router instance and pass the `routes` option
const router = new VueRouter({
    mode: 'history',
    routes
})

// 4. Create and mount the root instance
export default router;