<template>
<div>

    <!-- carousel -->
    <div class="fluid-container my_carousel ">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://images.pexels.com/photos/2983101/pexels-photo-2983101.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" class="d-block w-100" alt="#">
                        <div class="my_carousel_caption ">
                            <h1>Carne</h1>
                            <p class="d-none d-md-block">Some representative placeholder content for the first slide.</p>
                        </div>
                </div>
                <div class="carousel-item">
                    <img src="https://images.pexels.com/photos/1279330/pexels-photo-1279330.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" class="d-block w-100" alt="#">
                        <div class="my_carousel_caption">
                            <h1>Pasta</h1>
                            <p class="d-none d-md-block">Some representative.</p>
                        </div>
                </div>
                <div class="carousel-item">
                    <img src="https://images.pexels.com/photos/406152/pexels-photo-406152.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" class="d-block w-100" alt="#">
                    <div class="my_carousel_caption ">
                        <h1>Messicano</h1>
                        <p class="d-none d-md-block">Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- tipologie -->

    <div class="container mymt">
        <h2 class="text-center mt-4 display-3 ">Oggi cosa vorresti mangiare? </h2>
        <div class="row row-cols-6 g-3 mt-1">
            <div class="col">
                <div class="my_cat_card">
                    <img class="cat_image image_fluid" src="https://images.pexels.com/photos/11961854/pexels-photo-11961854.jpeg?auto=compress&cs=tinysrgb&w=800" alt="">
                    <div class="card_text">
                        <h4>Colazione</h4>
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>

    <!-- ristoranti -->

    <div class="container">
        <h2 class="text-center mt-4 display-3 ">Ristoranti</h2>
        <div class="row row-cols-3 g-3 mt-1">
            <div class="col">
                <div class="my_rest_card">
                    <div class="card_image">
                        <img class="image_fluid" src="https://images.pexels.com/photos/11961854/pexels-photo-11961854.jpeg?auto=compress&cs=tinysrgb&w=800" alt="">
                        <span class="h6">CONSEGNA GRATUITA</span>
                    </div>
                    <div class="card_text">
                        <h4>nome ristorante</h4>

                    </div>
                </div>
            </div>
            
        </div>
    </div>




</div>

</template>

<script>

export default ({
<<<<<<< HEAD
    name:'Home'
=======
    name:'Home',
    data() {
        return {
            types : '',
        }
    },

    mounted() {
        axios.get('/api/types').then(response => {
            console.log(response);
            this.types = response.data.data
            console.log(this.types);
        }).catch(error => {
            console.error(error);
        })
    }

>>>>>>> parent of 6c08280 (Merge branch 'dev' of https://github.com/SirAlyon/deliveboo into dev)
})
</script>
