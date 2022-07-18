<template>
<div>
    <!-- Homepage test page da togliere-->
    <h1>Homepage 2</h1>

    <!-- carousel -->
    <div class="fluid-container my_carousel">
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

    <div class="container">
        <div class="row row-cols-4 g-3 mt-1">
            <div class="col">
                <div class="my_cat_card">
                    <img class="cat_image image_fluid" src="https://images.pexels.com/photos/11961854/pexels-photo-11961854.jpeg?auto=compress&cs=tinysrgb&w=800" alt="">
                    <div class="card_text">
                        <span>Breakfast</span>
                    </div>
                </div>
            </div>
            


        </div>
    </div>


</div>

</template>

<script>

export default ({
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

})
</script>

<style lang="scss" scoped>
.carousel-inner {

    font-family: Arial, Helvetica, sans-serif!important;


    img{
        max-height: 500px;
        object-fit: cover;
        filter: contrast(0.5);
    }
    h1{

        font-size: 70px!important;
        font-weight: 800;
        text-transform: uppercase;
    }

    .my_carousel_caption{
        position: absolute;
        right: 15%;
        bottom: 1.25rem;
        left: 8%;
        padding-top: 1.25rem;
        padding-bottom: 1.25rem;
        color: #fff;
        text-align: left;
        font-size: 50px;
    }
}


// Tipologie 

.my_cat_card{
    padding: 1rem;
    text-align: center;

    .card_text{
        padding: 1rem;
    }

    img{
        width: 200px;
        height: 170px;
        object-fit: cover;
        object-position: center;
        border-radius: 10px;
    }
    span{
        font-weight:bolder;
        font-size: 15px;
    }
    
}




</style>