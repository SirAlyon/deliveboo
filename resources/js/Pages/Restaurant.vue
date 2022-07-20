<template>
  <div>
    <div class="container mt-4">
      <div class="row row-cols-2">
        <div class="col restaurant_image">
          <img
            class="image_fluid"
            src="/img/coming_soon.jpeg"
            alt="coming soon image"
            v-if="restaurant.image === null"
          />
          <img
            class="image-fluid"
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
        </div>
        <div class="col restaurant_info">
          <div class="title">
            <h1 class="display-3 bg-light">{{ restaurant.name }}</h1>
          </div>
          <div class="info">
            <div class="tipologie mb-4">
              <strong>Tipologie:</strong>
                <span class="ms-2" v-for="type in restaurant.types" :key="type.id">{{type.name}}</span>
              </div>

            <div class="address">
              <strong>Indirizzo:</strong>
              <span>{{restaurant.address}}</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- prodotti del ristorante -->

    <div class="container text-center display-5 mt-4 p-4">
      <div class="hr_separator mb-4"></div>
      <div>I Nostri Piatti</div>
    </div>

    <div class="container">
      <div class="row row-cols-3 g-3 mt-1">
        <div class="col" v-for="product in restaurant.products" :key="product.id">
          <div class="my_plate_card">
            <div class="card_image">
              <img
            class="image_fluid"
            src="/img/coming_soon.jpeg"
            alt="coming soon image"
            v-if="product.image === null"
          />
              <img
                :src="'/storage/' + '/' + product.image"
                alt="product.name"
                v-else
              />
              <!-- prezzo -->
              <span class="h5">{{product.price}} €</span>
            </div>
            <div class="card_text">
              <h2 class="product_title pt-3">{{product.name}}</h2>
              <hr />
              <p>{{product.description}}</p>
              <a href="#" class="product_btn btn">Aggiungi al carrello</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- separatore per vedere meglio le card -->

    <div class="container"></div>
  </div>
</template>

<script>
export default {
  name: "Restaurant",
  data() {
    return {
      restaurant: "",
    };
  },

  methods: {
    getRestaurant() {
      axios
        .get("/api/restaurant/" + this.$route.params.id)
        .then((response) => {
          console.log(response.data);
          if (response.data.status_code === 404) {
            this.loading = false;
          } else {
            this.restaurant = response.data;
            this.loading = false;
          }
        })
        .catch((e) => {
          console.error(e);
        });
    },
  },
  mounted() {
    this.getRestaurant();
  },
};
</script>

<style lang="scss" scoped>
.restaurant_image {
  img {
    width: 100%;
    height: 500px;
    object-fit: cover;
    object-position: center;
    border-radius: 10px;
  }
}

// prodotti ristorante

.hr_separator {
  width: 50%;
  border: 1px solid #00c1b2;
  border-radius: 5px;
  margin: auto;
}

.my_plate_card {
  padding: 1rem;
  text-align: center;
  box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px,
    rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
  border-radius: 10px;

  .card_image {
    position: relative;
    img {
      width: 100%;
      height: 170px;
      object-fit: cover;
      object-position: center;
      border-radius: 10px 10px 0 0;
    }

    // prezzo
    span {
      position: absolute;
      bottom: -11px;
      right: -7px;
      padding: 8px 27px;
      background-color: #00c1b2;
      color: white;
      border-radius: 3px;
    }
  }

  .card_text {
    text-align: left;
    position: relative;

    span {
      font-weight: bolder;
      font-size: 15px;
    }

    .product_title {
      font-size: 30px;
    }

    hr {
      height: 2px;
      width: 20%;
      background-color: #00c1b2;
      margin: 16px 0 16px;
    }

    .product_btn {
      background-color: rgba(red, 0.95);
      color: white;
    }
  }
}
</style>