<template>
  <div v-if="!loading">
    <div class="container mt-4 restaurant_main border-bottom">
      <div class="row">
        <div class="col col-xs-12 col-lg-8 p-3 mb-4 mb-lg-0 restaurant_info">
          <div class="title">
            <h1 class="bg-light ms-1 fw-bold">
              {{ restaurant.restaurant_name }}
            </h1>
          </div>
          <div class="info">
            <div class="tipologie my-4">
              <!-- <strong>Tipologie:</strong> -->
              <span
                class="bg_brand rounded-pill ms-2 wrap_next_line"
                v-for="type in restaurant.types"
                :key="type.id"
                >{{ type.name }}</span
              >
            </div>

            <div class="address ms-2 fs-13">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                fill="currentColor"
                class="bi bi-geo-alt-fill icon-single"
                viewBox="0 0 16 16"
              >
                <path
                  d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"
                />
              </svg>
              <span>Indirizzo: {{ restaurant.address }}</span>
            </div>

            <div class="email ms-2 fs-13">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                fill="currentColor"
                class="bi bi-envelope-fill icon-single"
                viewBox="0 0 16 16"
              >
                <path
                  d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"
                />
              </svg>
              <span>Email: {{ restaurant.email }}</span>
            </div>
          </div>

          <div class="caption mt-4">
            <p>
              Order your favourite dish
              <strong class="rest_name">{{
                restaurant.restaurant_name
              }}</strong>
              thanks to home delivery
            </p>
          </div>
        </div>
        <div class="col-xs-12 col-lg-4 p-3 mb-4 mb-lg-0 restaurant_image">
          <img
            class="image_fluid"
            :src="'/img' + '/' + restaurant.restaurant_name + '.jpeg'"
            alt="restaurant.name"
            v-if="restaurant.name === 'User'"
          />
          <img
            class="image-fluid"
            src="/img/coming_soon.jpeg"
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
        </div>
      </div>
    </div>

    <!-- prodotti del ristorante -->

    <section class="products mb-4">
      <!-- <div class="container-fluid text-center display-5 mt-4 p-4">
        <div class="hr_separator mb-4"></div>
        <span class="display-5">I Nostri Piatti</span>
      </div> -->

      <div class="container">
        <div class="row">
          <div class="menu mt-4">
            <h3><i class="fas fa-utensils"></i> Menu</h3>
            <p class="caption-menu">
              Select a dish and add it to the cart
            </p>
          </div>
          <div class="col-12 col-lg-8">
            <div class="row g-3 mt-1 mb-4 mb-lg-0">
              <div
                class="col-12 col-md-6 col-lg-4"
                v-for="product in restaurant.products"
                :key="product.id"
              >
                <div
                  class="my_plate_card alternative"
                  v-if="product.visibility == 1"
                >
                  <div class="card_image">
                    <img :src="'/storage/' + '/' + product.image" alt="" />
                    <!-- prezzo -->
                    <span class="h5">{{ product.price }}€</span>
                  </div>
                  <div class="card_text">
                    <h2 class="product_title pt-3">
                      {{ product.name }}
                    </h2>
                    <hr />
                    <p>NOT AVAILABLE!</p>
                  </div>
                </div>
                <div
                  class="
                    my_plate_card
                    d-flex
                    flex-column
                    justify-content-between
                  "
                  v-else
                >
                  <div class="card_content">
                    <div class="card_image">
                      <img
                        v-if="product.image === null"
                        src="/img/coming_soon.jpeg"
                        alt="default img"
                      />
                      <img
                        v-else
                        :src="'/storage/' + '/' + product.image"
                        alt="product.name"
                      />
                      <!-- prezzo -->
                      <span class="h5">{{ product.price }}€</span>
                    </div>
                    <div class="card_text">
                      <h2 class="product_title pt-3">
                        {{ product.name }}
                      </h2>
                      <hr />
                      <p class="scrollable">
                        {{ trimText(product.description) }}
                      </p>
                    </div>
                  </div>
                  <!-- Button trigger modal -->
                  <div class="buttons_add">
                    <button
                      v-if="
                        shopping_cart.length > 0 &&
                        currentRestaurant != product.user_id
                      "
                      type="button"
                      class="
                        product_btn
                        btn
                        bg_brand
                        text-white
                        add_to_cart
                        w-100
                      "
                      data-bs-toggle="modal"
                      data-bs-target="#modelId"
                    >
                      Add
                    </button>
                    <button
                      class="
                        product_btn
                        btn
                        bg_brand
                        text-
                        white
                        add_to_cart
                        w-100
                        text-white
                      "
                      @click="renderProductsInCart($event)"
                      :data-product-img="product.image"
                      :data-product-price="product.price"
                      :data-product-name="product.name"
                      :data-product-id="product.id"
                      :data-product-user_id="product.user_id"
                      v-else
                    >
                      Add
                    </button>
                  </div>

                  <!-- Modal -->
                  <div
                    class="modal fade"
                    id="modelId"
                    tabindex="-1"
                    role="dialog"
                    aria-labelledby="modelTitleId"
                    aria-hidden="true"
                  >
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">
                            Sorry! You can't place orders from different restaurants!
                          </h5>
                          <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                          ></button>
                        </div>
                        <div class="modal-body">
                          Do you want to empty your cart? You'll be able to add new products
                        </div>
                        <div class="modal-footer">
                          <button
                            type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal"
                          >
                            No
                          </button>
                          <button
                            type="button"
                            class="btn bg_brand text-white"
                            @click="changeRestaurant()"
                            data-bs-dismiss="modal"
                          >
                            Empty
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.col-10 -->
          <div class="col-12 col-lg-4" v-if="shopping_cart.length > 0">
            <div class="shopping_cart p-3 mt-0 mt-lg-4">
              <div class="row">
                <div class="col-12">
                  <h5>Your order</h5>
                </div>
                <!-- /.col-12 -->
              </div>
              <!-- /.row -->
              <div
                class="row purchased_products mb-3 align-items-center"
                v-for="(purchased_product, index) in shopping_cart"
                :key="purchased_product.id"
              >
                <div class="col-6">
                  <span class="name text-capitalize fs-14 font-basket">
                    {{ purchased_product.name }}
                  </span>
                  <!-- /.name -->
                </div>
                <!-- /.col-6 -->
                <div
                  class="col-6 d-flex align-items-center justify-content-end"
                >
                  <div class="circle ms-2 me-2">
                    <a
                      class="remove decoration-none"
                      @click="changeQuantity('minus', purchased_product)"
                      >-</a
                    >
                    <!-- /.remove -->
                  </div>
                  <!-- /.circle -->

                  <span class="qty fs-14 mx-1">{{
                    purchased_product.qty
                  }}</span>
                  <div class="circle ms-2 me-4">
                    <a
                      class="add"
                      @click="changeQuantity('plus', purchased_product)"
                      >+</a
                    >
                    <!-- /.add -->
                  </div>
                  <!-- /.circle -->

                  <span class="price ms-2 fs-14"
                    >{{ purchased_product.price }}€</span
                  >
                  <a class="text-danger fs-4 ms-4" @click="removeProduct(index)"
                    ><i class="fas fa-times-circle p-0"></i
                  ></a>
                  <!-- /.btn btn-danger -->
                </div>
                <!-- /.col-6 -->
              </div>
              <hr />

              <!-- /.row purchased_products -->

              <div class="row total">
                <div class="col-6">
                  <h5 class="fs-h5">TOTAL:</h5>
                </div>
                <!-- /.col-6 -->
                <div class="col-6 text-end">
                  <h5 class="total fs-5" v-if="total >= 0">{{ total }}€</h5>
                </div>
                <!-- /.col-6 -->
              </div>
              <!-- /.row total -->
              <div class="row buy_now">
                <div class="col-12 text-center mt-3">
                  <router-link
                    name="buy_now"
                    id="buy_now"
                    class="btn bg_brand text-white"
                    :to="{ name: 'checkout' }"
                    >Buy now</router-link
                  >
                </div>
                <!-- /.col-12 -->
              </div>
              <!-- /.row buy_now -->
              <!-- /.purchesed_product -->
            </div>
            <!-- /.shopping_cart -->
          </div>
          <!-- /.col-4 -->
          <div class="col-12 col-lg-4" v-else>
            <div
              class="
                empty_shopping_cart
                d-flex
                flex-column
                justify-content-center
                align-items-center
              "
            >
              <span class="basket">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="45"
                  height="45"
                  fill="currentColor"
                  class="bi bi-cart4"
                  viewBox="0 0 16 16"
                >
                  <path
                    d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"
                  />
                </svg>
              </span>
              <span>
                <h5 class="text-muted">The cart is empty!</h5>
              </span>

              <div class="button_disabled">
                <button class="btn btn-basket" disabled type="button">
                   <span>Checkout</span>
              </button>
              </div>
              
               
            </div>
            <!-- /.empty_shopping_cart -->
          </div>
          <!-- /.col-4 -->
        </div>
        <!-- /.row -->
      </div>
    </section>
    <!-- /.products -->

    <!-- separatore per vedere meglio le card -->
  </div>
  <LoaderComponent v-else></LoaderComponent>
</template>

<script>
import LoaderComponent from "../components/LoaderComponent.vue";
export default {
  components: { LoaderComponent },
  name: "Restaurant",
  data() {
    return {
      restaurant: [],
      loading: true,
      shopping_cart: [],
      total: 0,
      qty: 1,
      currentRestaurant: null,
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
    renderProductsInCart(event) {
      //console.log(event.target);
      //define a variable for the shopping cart
      const cart = this.shopping_cart;
      //get attributes values from html
      const name = event.target.getAttribute("data-product-name");
      const price = parseFloat(event.target.getAttribute("data-product-price"));
      const img = event.target.getAttribute("data-product-img");
      const id = event.target.getAttribute("data-product-id");
      const user_id = event.target.getAttribute("data-product-user_id");
      // define a variable for restaurant object
      const restaurant = this.restaurant;
      //console.log(restaurant);
      let qty = this.qty;
      //console.log(name, price, img);
      //create an object for the purchased products
      const purchased_product = { id, name, price, img, qty, user_id };
      //console.log(purchased_product);
      //check if the object is alredy in the array
      if (!cart.some((product) => product.id === purchased_product.id)) {
        //push the purchased products in the shopping cart array
        //console.log(purchased_product.user_id);
        cart.push(purchased_product);

        //console.log(this.currentRestaurant);
        localStorage.setItem("restaurant_id", this.restaurant.id);
        this.currentRestaurant = Number(localStorage.getItem("restaurant_id"));
        window.dispatchEvent(
          new CustomEvent("restaurant_id-changed", {
            detail: {
              storage: localStorage.getItem("restaurant_id"),
            },
          })
        );
      }

      //console.log(cart);
      console.log(this.currentRestaurant);

      //calculate total
      this.calculateTotal(qty);
      //save shopping cart in local storage
      this.saveShoppingCart();
    },
    calculateTotal() {
      let sum = 0;
      this.shopping_cart.forEach((product) => {
        //console.log(product);
        sum += product.price * product.qty;
      });
      //console.log(sum);
      this.total = sum.toFixed(2);
      //console.log(this.total);
    },
    changeQuantity(action, product) {
      //console.log('changed');
      //verify button action
      if (action === "minus" && product.qty > 1) {
        //remove quantity
        product.qty--;
      } else if (action === "plus") {
        //verify button action
        //add quantity
        product.qty++;
      }
      //calculate total
      this.calculateTotal(product.qty);
      //save chopping cart in local storage
      this.saveShoppingCart();
    },
    removeProduct(index) {
      //console.log('remove');
      const cart = this.shopping_cart;
      //console.log(cart);
      //remove product from shopping cart
      cart.splice(index, 1);
      //calculate total
      this.calculateTotal();
      //update local storage shopping cart
      this.saveShoppingCart();
    },

    saveShoppingCart() {
      //save datas in local storage
      if (this.shopping_cart.length > 0) {
        const parsed = JSON.stringify(this.shopping_cart);
        localStorage.setItem("shopping_cart", parsed);
        localStorage.setItem("total", this.total);
      } else {
        //clean local storage
        localStorage.removeItem("shopping_cart");
        localStorage.removeItem("total");
      }
    },

    changeRestaurant() {
      //empty shopping cart
      this.shopping_cart = [];
      //update local storage shopping cart
      this.saveShoppingCart();
    },

    getShoppingCartItems() {
      //get items from shopping cart
      if (
        localStorage.getItem("shopping_cart") &&
        localStorage.getItem("total")
      ) {
        try {
          this.shopping_cart = JSON.parse(
            localStorage.getItem("shopping_cart")
          );
          this.total = JSON.parse(localStorage.getItem("total"));
        } catch (e) {
          localStorage.removeItem("shopping_cart");
          localStorage.removeItem("total");
        }
      }
    },

    trimText(text) {
            if (text.length > 80) {
                return text.slice(0, 80) + "...";
            }
            return text;
        },
  },
  mounted() {
    //render restaurant
    this.getRestaurant();
    //get shopping cart items
    this.getShoppingCartItems();
    if (localStorage.getItem("restaurant_id")) {
      this.currentRestaurant = Number(localStorage.getItem("restaurant_id"));
    }
    window.addEventListener("restaurant_id-changed", () => {
      this.currentRestaurant = Number(localStorage.getItem("restaurant_id"));
      //console.log("storage updated");
    });
  },
};
</script>

<style lang="scss" scoped>
.restaurant_main {
  min-width: 320px;
}

h2,
h4 {
  font-family: "Rubik", sans-serif;
}
.icon-single {
  color: #00ccbc;
}

.fs-13 {
  font-size: 13px;
}

.fs-h5 {
  font-size: 15px;
}
.fs-14 {
  font-size: 14px;
}

h6 {
  font-family: "Rubik", sans-serif !important;
  font-size: 30px !important;
}
.caption {
  font-size: 14px;
  font-weight: 500;
  text-transform: uppercase;
  color: #959292;
}

.rest_name {
  color: #666464;
}

.caption-menu {
  color: rgb(135 119 119);
  font-family: "Montserrat", sans-serif;
  font-size: 13px;
}

.border-bottom {
  box-shadow: inset 0px 0px 1px 0 rgb(178 179 180);
  width: 100vw !important;
  border-radius: 4px;
}
.products {
  min-width: 320px;
}

.bg_brand {
  background-color: #00ccbc;
}

.wrap_next_line {
  font-family: "Rubik", sans-serif;
  white-space: normal;
  color: white;
  font-weight: 600;
  padding: 5px 20px;
}

/* Restaurant */
.restaurant_image {
  img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    object-position: center;
    border-radius: 8px;
  }
}
/* Shopping cart */
.shopping_cart {
  border: 1px solid #dfdcdc;
  min-width: 320px;
  box-shadow: -1px 2px 4px -1px;
  border-radius: 6px;
}
.address,
.email {
  font-family: "Montserrat", sans-serif;
}
.basket {
  color: #6c757d;
  margin-bottom: 15px;
}

.btn-basket {
  background-color: lightgray;
  padding: 8px 30px;
  margin-top: 15px;
  color: rgb(157, 155, 155);
  font-weight: 500;
  cursor: not-allowed;
}
.circle {
  min-width: 18px;
  height: 18px;
  padding: 2px;
  background-color: #00ccbc;
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
  a {
    text-decoration: none;
    color: white;
    cursor: pointer;
  }
}
.empty_shopping_cart {
  height: 260px;
  border: 1px solid lightgray;
  border-radius: 8px;
}
/* Section products */
section.products {
  background-color: #f9fafa;
}
.hr_separator {
  width: 50%;
  border: 1px solid #00c1b2;
  border-radius: 5px;
  margin: auto;
}
.my_plate_card {
  min-height: 371px;
  text-align: center;
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
    font-family: "prompt", sans-serif;

    span {
      font-weight: bolder;
      font-size: 15px;
    }
    .product_title {
      font-size: 18px;
    }
    hr {
      height: 2px;
      width: 20%;
      background-color: #00c1b2;
      margin: 16px 0 16px;
    }
    .product_btn {
      // background-color: rgba(red, 0.95);
      color: white;
    }
  }
}

.scrollable {
  overflow-y: auto;
  max-height: 300px;
  .card_text {
    text-align: left;
    overflow: auto;
  }
}

.my_plate_card.alternative {
  filter: brightness(0.5);
}

/* Effects */
.my_plate_card {
  transition: all 2000ms;
}
.my_plate_card:hover {
  transform: scale(1.1);
  transition: all 1000ms;
}
</style>
