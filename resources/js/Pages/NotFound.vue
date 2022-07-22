<template>
    <div class="notfound_page">
        <div class="p-5 bg-light">
            <div class="container d-flex justify-content-between">
                <div class="ms-3">
                    <h1 class="display-3">Ops! Page not found, 404</h1>

                </div>
                <img src="https://picsum.photos/200" alt="">

            </div>

            <div class="container px-4">
                This page doesn't exist. Go back to:
                    <router-link :to="{name:'home'}">HomePage</router-link>
            </div>
        </div>
    </div>

</template>

<script>
export default {
   neme: 'NotFound'
}
</script>


<style lang="scss" scoped>
.notfound_page{
    min-height: 100vh;
}
</style>