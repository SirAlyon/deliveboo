<template>
  <div v-if="!loading">
    <div class="container-fluid mt-4">
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
            alt="restaurant.restaurant_name"
            v-else
          />
        </div>
        <div class="col restaurant_info">
          <div class="title">
            <h1 class="display-3 bg-light">{{ restaurant.restaurant_name }}</h1>
          </div>
          <div class="info">
            <div class="tipologie mb-4">
              <strong>Tipologie:</strong>
              <span
                class="ms-2"
                v-for="type in restaurant.types"
                :key="type.id"
                >{{ type.name }}</span
              >
            </div>

            <div class="address">
              <strong>Indirizzo:</strong>
              <span>{{ restaurant.address }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- prodotti del ristorante -->

    <section class="products">
      <div class="container-fluid text-center display-5 mt-4 p-4">
        <div class="hr_separator mb-4"></div>
        <h2>I Nostri Piatti</h2>
      </div>

      <div class="container-fluid">
        <div class="row">
          <div class="col-8">
            <div class="row row-cols-3 g-3 mt-1">
              <div
                class="col"
                v-for="product in restaurant.products"
                :key="product.id"
              >
                <div class="my_plate_card">
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
                    <p>{{ product.description }}</p>

                    <!-- Button trigger modal -->
                    <button v-if="shopping_cart.length > 0 && currentRestaurant === false" type="button" class="product_btn btn add_to_cart" data-bs-toggle="modal" data-bs-target="#modelId">
                      Add to cart
                    </button>

                     <button 
                      class="product_btn btn add_to_cart"
                      @click="renderProductsInCart($event)"
                      :data-product-img="product.image"
                      :data-product-price="product.price"
                      :data-product-name="product.name"
                      :data-product-id="product.id"
                      :data-product-user_id="product.user_id"
                      v-else
                    >
                      Add to cart
                    </button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">You can't place orders from different restuarants</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            Do you want to empty your shopping cart? Then you will be able to add new products.
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" @click="changeRestaurant()" data-bs-dismiss="modal">Save</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                   
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.col-10 -->
          <div class="col-4" v-if="shopping_cart.length > 0">
            <div class="shopping_cart p-3">
              <div class="row">
                <div class="col-12">
                  <h5>Il tuo ordine</h5>
                </div>
                <!-- /.col-12 -->
              </div>
              <!-- /.row -->
              <div
                class="row purchased_products mb-3"
                v-for="(purchased_product, index) in shopping_cart"
                :key="purchased_product.id"
              >
                <div class="col-6">
                  <span class="name text-capitalize fs-5">
                    {{ purchased_product.name }}
                  </span>
                  <!-- /.name -->
                </div>
                <!-- /.col-6 -->
                <div
                  class="col-6 d-flex align-items-center justify-content-end"
                >
                  <div class="circle">
                    <a
                      class="remove decoration-none"
                      @click="changeQuantity('minus', purchased_product)"
                      >-</a
                    >
                    <!-- /.remove -->
                  </div>
                  <!-- /.circle -->

                  <span class="qty fs-5 mx-1">{{ purchased_product.qty }}</span>
                  <div class="circle">
                    <a
                      class="add"
                      @click="changeQuantity('plus', purchased_product)"
                      >+</a
                    >
                    <!-- /.add -->
                  </div>
                  <!-- /.circle -->

                  <span class="price ms-2 fs-5"
                    >{{ purchased_product.price }}€</span
                  >
                  <a
                    class="btn btn-danger ms-2 text-white"
                    @click="removeProduct(index)"
                    >Remove</a
                  >
                  <!-- /.btn btn-danger -->
                </div>
                <!-- /.col-6 -->
              </div>

              <!-- /.row purchased_products -->

              <div class="row total">
                <div class="col-6">
                  <h5>Total:</h5>
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
                  <router-link name="buy_now" id="buy_now" class="btn btn-primary text-white"  :to="{name: 'checkout'}">Buy now</router-link>
                </div>
                <!-- /.col-12 -->
              </div>
              <!-- /.row buy_now -->
              <!-- /.purchesed_product -->
            </div>
            <!-- /.shopping_cart -->
          </div>
          <!-- /.col-4 -->
          <div class="col-4" v-else>
            <div
              class="
                empty_shopping_cart
                d-flex
                justify-content-center
                align-items-center
              "
            >
              <h4 class="text-muted">The cart is empty!</h4>
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
      currentRestaurant: true,
    };
  },
  methods: {
    getRestaurant() {
      axios
        .get("/api/restaurant/" + this.$route.params.id)
        .then((response) => {
          //console.log(response.data);
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
        cart.push(purchased_product);
        
      }  

      // //check if products id and products id in shopping cart corresponds
      cart.forEach(product => {
        //console.log(product);
        //console.log(restaurant);
        if(product.user_id != restaurant.id) {
          //change currentRestaurant value
          this.currentRestaurant = false;
          //console.log(product.user_id, restaurant.id);
        } else {
          //change currentRestaurant value
          this.currentRestaurant = true;
          //console.log(product.user_id, restaurant.id);
        }
      })

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
      } else if (action === "plus") {   //verify button action
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

    changeRestaurant(){
      //empty shopping cart
      this.shopping_cart = [];
      //update local storage shopping cart
      this.saveShoppingCart();
    },

    getShoppingCartItems(){
      //get items from shopping cart
      if (
      localStorage.getItem("shopping_cart") &&
      localStorage.getItem("total")
    ) {
      try {
        this.shopping_cart = JSON.parse(localStorage.getItem("shopping_cart"));
        this.total = JSON.parse(localStorage.getItem("total"));
      } catch (e) {
        localStorage.removeItem("shopping_cart");
        localStorage.removeItem("total");
      }
    }
    }
  },
  mounted() {
    //render restaurant
    this.getRestaurant();
    //get shopping cart items
    this.getShoppingCartItems();
    
    
  },
};
</script>

<style lang="scss" scoped>
/* Restaurant */
.restaurant_image {
  img {
    width: 100%;
    height: 500px;
    object-fit: cover;
    object-position: center;
    border-radius: 10px;
  }
}
/* Shopping cart */
.shopping_cart {
  border: 1px solid lightgray;
}
.circle {
  width: 18px;
  height: 18px;
  border: 2px solid #00ccbc;
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
  a {
    text-decoration: none;
    color: #00ccbc;
    cursor: pointer;
  }
}
.empty_shopping_cart {
  height: 350px;
  border: 1px solid lightgray;
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