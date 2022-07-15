<template>
    <div>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <router-link class="navbar-brand" :to="{name: 'home'}">
                <h1>DeliveBoo</h1>
            </router-link>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item px-3" v-for="item in menu_items" :key="item">
                        <router-link :to="{name: item.route_name}">
                            {{item.route_text}}
                        </router-link>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->


            </div>
        </div>
    </nav>

        <router-view></router-view>
    </div>
</template>


<script>
    export default {
        name: 'App',
        data(){
            return{
                menu_items:[
                    {
                        route_name: 'home',
                        route_text: 'Home'
                    },
                    {
                        route_name: 'restaurant',
                        route_text: 'Restaurant'
                    },
                    {
                        route_name: 'checkout',
                        route_text: 'Checkout'
                    }
                ]
            }
        }
    }
</script>
