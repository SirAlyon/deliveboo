<template>
  
  <div v-if="!loading">

    <!-- Jumbotron carousel -->
    <div class="jumbotron fluid-container my_carousel">
      <div
        id="carouselExampleCaptions"
        class="carousel slide"
        data-bs-ride="carousel"
      >
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img
              src="https://images.pexels.com/photos/2983101/pexels-photo-2983101.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
              class="d-block w-100"
              alt="#"
            />
            <div class="my_carousel_caption container">
              <h1>Il cibo che vuoi...</h1>
              <p class="d-none d-md-block">
                I migliori ristoranti della città...
              </p>
            </div>
          </div>
          <div class="carousel-item">
            <img
              src="https://images.pexels.com/photos/1279330/pexels-photo-1279330.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
              class="d-block w-100"
              alt="#"
            />
            <div class="my_carousel_caption ">
              <h1>dove vuoi...</h1>
              <p class="d-none d-md-block">
                  a pochi passi da te...
              </p>
            </div>
          </div>
          <div class="carousel-item">
            <img
              src="https://images.pexels.com/photos/406152/pexels-photo-406152.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
              class="d-block w-100"
              alt="#"
            />
            <div class="my_carousel_caption">
              <h1>...e quando vuoi!</h1>
              <p class="d-none d-md-block">
                ...pronti in un battito d'occhio!
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="container-fluid main_content mt-3">
      <div class="row">
        <div class="">
          <div class="types_wrapper container">
            <h3 class="display-6">Che menù scegliere oggi?</h3>
            <div class="row  g-2 mt-1 flex-nowrap overflow-auto">
              <div class="col-6 col-md-3 col-lg-2" v-for="type in types" :key="type.id">
                <div class="my_cat_card position-relative">
                  <img
                    class="cat_image image_fluid"
                    :src="type.image"
                    alt="type.name"
                  />
                  <div class="card_text">
                    <!-- <h4>{{ type.name }}</h4> -->
                  </div>
                    <label class="btn btn-primary active border-0 position-absolute top-0 right-0 text-light d-flex">
                        <input
                        type="checkbox"
                        class="me-2"
                        :value="type.name"
                        :id="type.name"
                        v-model="checkedTypes"
                        @change="filterRestaurants()"
                        />
                        {{ type.name }}
                    </label>
                </div>
              </div>
            </div>
            <!-- /.tipologie -->
          </div>
          <!-- /.types_wrapper -->
          <!-- tipologie -->

          <!-- ristoranti -->
          <div class="restaurants_wrapper container mt-4">
            <h3 class="display-6">Ristoranti che consegnano a Milano</h3>
            <div class="row g-3 mt-1" v-if="restaurants.length > 0">
              <div
                class="col-xs-1 col-sm-6 col-lg-3"
                v-for="restaurant in filteredRestaurants"
                :key="restaurant.id"
              >
                <div class="my_rest_card">
                  <div class="card_image">
                    <router-link
                      :to="{
                        name: 'restaurant',
                        params: { id: restaurant.id },
                      }"
                    >
                      <img
                        class="image_fluid"
                        :src="
                          '/img' +
                          '/' +
                          restaurant.restaurant_name +
                          '.jpeg'
                        "
                        alt="restaurant.name"
                        v-if="restaurant.name === 'User'"
                      />
                      <img
                        class="image-fluid"
                        src="img/coming_soon.jpeg"
                        alt="coming soon image"
                        v-else-if="restaurant.image === null"
                      />
                      <img
                        class="image_fluid"
                        :src="
                          '/storage/restaurant_img' +
                          '/' +
                          restaurant.id +
                          '/' +
                          restaurant.image
                        "
                        alt="restaurant.name"
                        v-else
                      />
                    </router-link>

                    <span class="h6">CONSEGNA GRATUITA</span>
                  </div>
                  <div class="scrollable">
                    <div class="card_text">
                    <router-link
                    class="text-decoration-none text-reset"
                      :to="{
                        name: 'restaurant',
                        params: { id: restaurant.id },
                      }"
                    >
                      <h4>{{ restaurant.restaurant_name }}</h4>
                    </router-link>

                    <div class="types_widget">

                      <ul class="list-unstyled d-flex flex-column justify-content-center">
                        <li
                          class="ms-2"
                          v-for="type in restaurant.types"
                          :key="type.id"
                        >
                          {{ type.name }}
                        </li>
                      </ul>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row" v-else>
              <div class="col-12">
                <h3 class="text-center">No restaurants yet!</h3>
              </div>
            </div>
            <!-- /.row -->
          </div>
          <!-- /.restaurants_wrapper -->

          <!-- /.ristoranti-->
        </div>
        <!-- /.col-9 -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- TO DO: Add Loader component -->
  <LoaderComponent v-else></LoaderComponent>
</template>

<script>
import LoaderComponent from '../components/LoaderComponent.vue';
export default {
  components: { LoaderComponent },
  name: "Home",
  data() {
    return {
      types: "",
      restaurants: [],
      checkedTypes: [],
      filteredRestaurants: [],
      loading: true,
    };
  },
  methods: {
    getRestaurants() {
      axios
        .get("/api/restaurants")
        .then((response) => {
          console.log(response, 'new script');
          this.restaurants = response.data.data;
            //console.log(this.restaurants);
          this.filteredRestaurants = this.restaurants;
          this.loading = false;
          //console.log(this.restaurants);
        })
        .catch((error) => {
          console.error(error);
        });
    },
    getTypes() {
      axios
        .get("/api/types")
        .then((response) => {
          console.log(response);
          this.types = response.data.data;
          //console.log(this.types);
          this.loading = false;
        })
        .catch((error) => {
          console.error(error);
        });
    },
    filterRestaurants() {
      if (this.checkedTypes.length == 0) {
        this.filteredRestaurants = this.restaurants;
        return;
      }
      this.filteredRestaurants = [];
      this.restaurants.forEach((restaurant) => {
        let included = true;
        if(restaurant.types.length == 0){
            included = false;
        }else{
            this.checkedTypes.forEach(type => {
                console.log(type);
                let present = false;
                restaurant.types.forEach(Rtype => {
                    console.log(Rtype.name);
                    if(Rtype.name == type){
                        present = true;
                    }
                });
                console.log(present);
                if(!present){
                    included = false;
                }
            });
        }
        if(included){
            this.filteredRestaurants.push(restaurant);
        }
      })
    },
  },
  mounted() {
    this.getTypes();
    this.getRestaurants();
    console.log('mounted');
  },
  computed: {
    filterTypes() {
      return this.restaurants.filter((restaurant) => {
        //console.log(restaurant);
        restaurant.types.forEach((type) => {
          //console.log(type);
          console.log(this.checkedTypes);
          if (this.checkedTypes.includes(type.name)) {
            //console.log(type.name);
            this.filteredTypes.push(restaurant);
            //console.log(this.filteredTypes);
          }
        });
      });
    },
  },
};
</script>

<style lang="scss" scoped>

// jumbo

.jumbotron {
  min-width: 320px;

  .carousel-inner {
  font-family: 'Roboto', sans-serif !important;

  img {
    width: 100%;
    min-width: 100px;
    max-height: 400px;
    object-fit: cover;
    filter: contrast(0.7);
  }
  h1 {
    font-size: calc(0.75em + 3vmin)!important;
    font-weight: 800;
    text-transform: uppercase;
  }

  .my_carousel_caption {
    position: absolute;
    bottom: 1.25em;
    left: 2.5em;
    padding-top: 1.25rem;
    padding-bottom: 1.25rem;
    color: #fff;
    text-align: left;
    font-size: calc(0.75em + 2vmin)!important;
  }
}
}



// Tipologie

.types_wrapper{
  min-width: 320px;
}
.restaurants.title {
  font-weight: bold;
}
.my_cat_card {
  text-align: center;
  max-width: 100%;

  .card_text {
    padding: 1rem;
  }

  img {
    width: 100%;
    height: 105px;
    object-fit: cover;
    object-position: center;
    border-radius: 10px;
  }
  span {
    font-weight: bolder;
    font-size: 15px;
  }
}

// ristoranti

.restaurants_wrapper{
  min-width: 320px;
}

.my_rest_card {
  min-height: 200px;
  text-align: center;

  .card_image {
    position: relative;
    img {
      width: 100%;
      height: 170px;
      object-fit: cover;
      object-position: center;
      border-radius: 10px 10px 0 0;
    }

    span {
      position: absolute;
      bottom: 143px;
      right: -7px;
      padding: 5px 18px;
      background-color: #00c1b2;
      color: white;
      border-radius: 3px;
    }
  }

  .scrollable{
  overflow-y: auto;
  max-height: 300px;
    .card_text {
      text-align: left;
      overflow: auto
    }


  }


  span {
    font-weight: bolder;
    font-size: 15px;
  }
}
</style>

