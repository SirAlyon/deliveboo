<template>
  <div v-if="!loading">
    <JumbotronComponent></JumbotronComponent>

    <div class="container-fluid main_content my-3">
      <div class="row d-flex">
        <div class="col-12 col-md-2 types_wrapper container">
          <h3 class="types_title">Categorie</h3>
          <div class="row flex-column">
            <div class="col-12" v-for="type in types" :key="type.id">
              <div class="my_cat_card">
                <label class="btn active border-0 text-dark d-flex">
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
        <div class="col-12 col-md-10 restaurants_wrapper container">
          <h3 class="restaurants_title">Ristoranti che consegnano a Milano</h3>
          <div
            class="row row-cols-1 row-cols-sm-2 row-cols-xl-5 gy-3 mt-1"
            v-if="restaurants.length > 0"
          >
            <div
              class="col"
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
                      :src="'/img' + '/' + restaurant.restaurant_name + '.jpeg'"
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

                  <span v-if="restaurant.free_shipping === 1" class="h6"
                    >CONSEGNA GRATUITA</span
                  >
                </div>
                <div class="scrollable">
                  <div class="card_text p-2 text-center">
                    <router-link
                      class="text-decoration-none text-reset"
                      :to="{
                        name: 'restaurant',
                        params: { id: restaurant.id },
                      }"
                    >
                      <h4 class="card_title">{{ restaurant.restaurant_name }}</h4>
                    </router-link>

                    <div class="types_widget">
                      <ul
                        class="
                          list-unstyled
                          d-flex
                          justify-content-center
                        "
                      >
                        <li
                          class="type ms-2 text-muted"
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
    <!-- /.container-fluid -->
  </div>
  <!-- TO DO: Add Loader component -->
  <LoaderComponent v-else></LoaderComponent>
</template>

<script>
import JumbotronComponent from "../components/JumbotronComponent.vue";
import LoaderComponent from "../components/LoaderComponent.vue";
export default {
  components: { LoaderComponent, JumbotronComponent },
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
          console.log(response, "new script");
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
        if (restaurant.types.length == 0) {
          included = false;
        } else {
          this.checkedTypes.forEach((type) => {
            console.log(type);
            let present = false;
            restaurant.types.forEach((Rtype) => {
              console.log(Rtype.name);
              if (Rtype.name == type) {
                present = true;
              }
            });
            console.log(present);
            if (!present) {
              included = false;
            }
          });
        }
        if (included) {
          this.filteredRestaurants.push(restaurant);
        }
      });
    },
  },
  mounted() {
    this.getTypes();
    this.getRestaurants();
    console.log("mounted");
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

.types_title {
  font-size: 1rem;
  padding: 0 0.75rem;
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

.restaurants_title {
  font-size: 1.375rem;
}

.my_rest_card {
  min-height: 200px;
  text-align: center;
  border: 0.5px solid lightgrey;
  box-shadow: 1px 1px 8px 0px lightgrey;
  border-radius: 5px;

  .card_image {
    position: relative;
    img {
      width: 100%;
      height: 170px;
      object-fit: cover;
      object-position: center;
  
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

  .card_title {
    font-size: 1rem;
    text-transform: capitalize;
  }

  .type {
    font-size: 0.75rem;
  }

  .scrollable {
    overflow-y: auto;
    max-height: 300px;
    .card_text {
      text-align: left;
      overflow: auto;
    }
  }

  span {
    font-weight: bolder;
    font-size: 15px;
  }
}
</style>

