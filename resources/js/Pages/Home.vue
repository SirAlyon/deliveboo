<template>
  <div>
    <!-- carousel -->
    <div class="fluid-container my_carousel">
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
            <div class="my_carousel_caption">
              <h1>Carne</h1>
              <p class="d-none d-md-block">
                Some representative placeholder content for the first slide.
              </p>
            </div>
          </div>
          <div class="carousel-item">
            <img
              src="https://images.pexels.com/photos/1279330/pexels-photo-1279330.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
              class="d-block w-100"
              alt="#"
            />
            <div class="my_carousel_caption">
              <h1>Pasta</h1>
              <p class="d-none d-md-block">Some representative.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img
              src="https://images.pexels.com/photos/406152/pexels-photo-406152.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
              class="d-block w-100"
              alt="#"
            />
            <div class="my_carousel_caption">
              <h1>Messicano</h1>
              <p class="d-none d-md-block">
                Some representative placeholder content for the first slide.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- tipologie -->

    <div class="container mymt">
      <h2 class="text-center mt-4 display-3">Oggi cosa vorresti mangiare?</h2>
      <div class="row row-cols-6 g-3 mt-1">
        <div class="col" v-for="type in types" :key="type.id">
          <div class="my_cat_card">
            <img
              class="cat_image image_fluid"
              :src="type.image"
              alt="type.name"
            />
            <div class="card_text">
              <h4>{{ type.name }}</h4>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Filter Checbox -->
    <div class="choose_types text-center">
      <div
        class="btn-group"
        role="group"
        data-bs-toggle="buttons"
        v-for="type in types"
        :key="type.id"
      >
        <label class="btn btn-primary active">
          <input
            type="checkbox"
            class="me-2"
            :value="type.name"
            :id="type.name"
            v-model="checkedTypes"
          />
          {{ type.name }}
        </label>
      </div>
    </div>

    <!-- ristoranti -->

    <div class="container">
      <h2 class="text-center mt-4 display-3">Ristoranti</h2>
      <div class="row row-cols-3 g-3 mt-1">
        <div
          class="col"
          v-for="restaurant in filteredTypes"
          :key="restaurant.id"
        >
          <div class="my_rest_card">
            <div class="card_image">
              <img
                class="image_fluid"
                :src="
                  'storage/restaurant_img' +
                  '/' +
                  restaurant.id +
                  '/' +
                  restaurant.image
                "
                alt=""
              />
              <span class="h6">CONSEGNA GRATUITA</span>
            </div>
            <div class="card_text">
              <h4>{{ restaurant.name }}</h4>
              <ul>
                <li v-for="type in restaurant.types" :key="type.id">
                  {{ type.name }}
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Home",
  data() {
    return {
      types: "",
      restaurants: [],
      checkedTypes: [],
      filteredTypes: [],
    };
  },

  methods: {
    getRestaurants() {
      axios
        .get("/api/restaurants")
        .then((response) => {
          console.log(response);
          this.restaurants = response.data.data;
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
          this.types = response.data;
          //console.log(this.types);
        })
        .catch((error) => {
          console.error(error);
        });
    },
  },

  mounted() {
    this.getTypes();
    this.getRestaurants();
  },

  computed: {
   filterTypes() {
      return this.restaurants.filter((restaurant) => {
        //console.log(restaurant);
        return restaurant.types.forEach((type) => {
          //console.log(type);
          if (this.checkedTypes.includes(type.name)){
            while (!this.filteredTypes.includes(restaurant)) {
              this.filteredTypes.push(restaurant);
              console.log(this.filteredTypes);
            }
          } 
            
        });
      });
    },

    // filteredTypes: function () {
    //     return this.restaurants.filter(function (restaurant) {
    //       return this.checkedTypes.includes(restaurant.types);
    //     }, this);
    //   },
  },
};
</script>

<style lang="scss" scoped>
.carousel-inner {
  font-family: Arial, Helvetica, sans-serif !important;

  img {
    width: 100%;
    max-height: 500px;
    object-fit: cover;
    filter: contrast(0.5);
  }
  h1 {
    font-size: 70px !important;
    font-weight: 800;
    text-transform: uppercase;
  }

  .my_carousel_caption {
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

.mymt {
  margin-top: 100px !important;
}

.my_cat_card {
  padding: 1rem;
  text-align: center;

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

.my_rest_card {
  padding: 1rem;
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

  .card_text {
    text-align: left;
  }

  span {
    font-weight: bolder;
    font-size: 15px;
  }
}
</style>