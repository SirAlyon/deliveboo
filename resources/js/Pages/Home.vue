<template>
  <div v-if="!loading">
    <div class="container-fluid main_content mt-3">
      <div class="row">
        <div class="col-12">
          <div class="types_wrapper">
            <h3 class="display-6">Che menù scegliere oggi?</h3>
            <div class="row g-3 mt-1 flex-nowrap overflow-auto">
              <div class="col-4 col-md-3 col-lg-2" v-for="type in types" :key="type.id">
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
                        @change="filterReustarants()"
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
          <div class="restaurants_wrapper mt-4">
            <h3 class="display-6">Ristoranti che consegnano a Milano</h3>
            <div class="row g-3 mt-1" v-if="restaurants.length > 0">
              <div
                class="col-4 col-md-3 col-lg-2"
                v-for="restaurant in filteredReustarants"
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
                        v-if="restaurant.name === 'Fra'"
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
      filteredReustarants: [],
      loading: true,
    };
  },

  methods: {
    getRestaurants() {
      axios
        .get("/api/restaurants")
        .then((response) => {
          //console.log(response);
          this.restaurants = response.data.data;

          this.filteredReustarants = this.restaurants;
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

    filterReustarants() {
      if (this.checkedTypes.length > 0) {
        this.filteredReustarants = [];
      } else {
        this.filteredReustarants = this.restaurants;
      }

      this.restaurants.forEach((restaurant) => {
        restaurant.types.forEach((type) => {
          if (
            this.checkedTypes.includes(type.name) &&
            !this.filteredReustarants.includes(restaurant)
          ) {
            this.filteredReustarants.push(restaurant);
          }
        });
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

// Tipologie

.restaurants.title {
  font-weight: bold;
}
.my_cat_card {
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

