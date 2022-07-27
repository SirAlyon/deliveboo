<template>
  <div class="container page_wrapper my-3">
    <!-- Checkout test page -->

    <div class="row">
      <div class="col-12">
        <div class="shopping_cart box_shadow px-3 py-1">
          <div class="row">
            <div class="col-12 mb-2">
              <p class="display-5 pt-1">Riepilogo Ordine</p>
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
            <div class="col-6 d-flex align-items-center justify-content-end">
              <div class="circle ms-2 me-2">
                <a
                  class="remove decoration-none"
                  @click="changeQuantity('minus', purchased_product)"
                  ><i class="fas fa-minus"></i>
                </a>
                <!-- /.remove -->
              </div>
              <!-- /.circle -->

              <span class="qty fs-5 mx-1">{{ purchased_product.qty }}</span>
              <div class="circle ms-2 me-4">
                <a
                  class="add"
                  @click="changeQuantity('plus', purchased_product)"
                  ><i class="fas fa-plus"></i>
                </a>
                <!-- /.add -->
              </div>
              <!-- /.circle -->

              <span class="price ms-2 fs-5"
                >{{ purchased_product.price }}€</span
              >
              <a class="text-danger fs-4 ms-4" @click="removeProduct(index)">
                <i class="fas fa-times-circle p-0"></i>
              </a>
              <!-- /.btn btn-danger -->
            </div>
            <!-- /.col-6 -->
          </div>

          <!-- /.row purchased_products -->

          <div class="row total">
            <div class="col-6">
              <h5>Totale:</h5>
            </div>
            <!-- /.col-6 -->
            <div class="col-6 text-end">
              <h5 class="total fs-5" v-if="total >= 0">{{ total }}€</h5>
            </div>
            <!-- /.col-6 -->
          </div>
          <!-- /.row total -->
          <!-- /.purchesed_product -->
        </div>
      </div>
      <div class="container checkout_wrapper d-flex mt-4">
        <div class="row m-0 justify-content-between">
          <div class="col-xs-12 col-lg-6 px-0 box_shadow mb-4 mb-lg-0">
            <p class="display-6 pt-1 p-3">Spedizione</p>

            <input type="text" id="token" name="token" v-bind:value="csrf" />
            <input
              type="text"
              id="guest_name"
              name="guest_name"
              placeholder="name"
            />
            <input
              type="text"
              id="guest_lastname"
              name="guest_lastname"
              placeholder="lastname"
            />
            <input
              type="email"
              id="guest_email"
              name="guest_email"
              placeholder="email"
            />
            <input
              type="text"
              id="guest_address"
              name="guest_address"
              placeholder="address"
            />
            <input
              type="number"
              id="guest_phone_number"
              name="guest_phone_number"
              placeholder="phone"
            />

            
            <input
              id="total_price"
              name="total_price"
              type="number"
              :value="total"
            />
            <div class="btn btn-primary" @click="createOrder()">
              Create Order
            </div>
          </div>
          <div class="col-xs-12 col-lg-5 px-0">
            <div class="container payment_wrapper box_shadow">
              <div class="row row-cols-1">
                <p class="display-6 pt-1 mb-0">Pagamento</p>
                <div class="col p-0">
                  <form
                    id="payment-form"
                    action="/api/braintree/payment"
                    method="post"
                  >
                    <div id="dropin-container"></div>
                    <input
                      id="nonce"
                      name="payment_method_nonce"
                      type="hidden"
                    />
                    <input id="amount" name="amount" type="number" :value="total" hidden />
                    <button
                      type="submit"
                      class="btn bg-primary mb-4"
                      id="submit-button"
                    >
                      Request payment method
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Checkout",
  data() {
    return {
      clientToken: "",
      shopping_cart: [],
      products_id: [],
      total: 0,
      fields: {},
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
    };
  },
  methods: {
    callDropIn() {
      var submitButton = document.querySelector("#submit-button");
      var form = document.querySelector("#payment-form");
      let token = this.clientToken;

      console.log(token);
      braintree.dropin.create(
        {
          authorization: token,

          selector: "#dropin-container",
        },
        function (err, dropinInstance) {
          if (err) {
            // Handle any errors that might've occurred when creating Drop-in
            console.error(err);
            return;
          }
          form.addEventListener("submit", function (event) {
            event.preventDefault();
            dropinInstance.requestPaymentMethod(function (err, payload) {
              if (err) {
                // Handle errors in requesting payment method
                console.log("Error", err);
                return;
              }
              // Send payload.nonce to your server
              document.querySelector("#nonce").value = payload.nonce;
              console.log(document.querySelector("#nonce").value);
              form.submit();
            });
          });
        }
      );
    },
    getClientToken() {
      axios
        .get("/api/braintree/token")
        .then((response) => {
          console.log(response);
          this.clientToken = response.data;
          this.callDropIn();
        })
        .catch((error) => {
          console.error(error);
        });
    },
    changeQuantity(action, product) {
      //console.log('changed');
      if (action === "minus" && product.qty > 1) {
        product.qty--;
      } else if (action === "plus") {
        product.qty++;
      }
      this.calculateTotal(product.qty);
      this.saveShoppingCart();
    },
    removeProduct(index) {
      //console.log('remove');
      const cart = this.shopping_cart;
      //console.log(cart);
      cart.splice(index, 1);
      this.saveShoppingCart();
    },
    saveShoppingCart() {
      const parsed = JSON.stringify(this.shopping_cart);
      localStorage.setItem("shopping_cart", parsed);
      localStorage.setItem("total", this.total);
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
    createOrder() {
      axios
        .post("http://127.0.0.1:8000/api/orders", {
          guest_name: document.getElementById("guest_name").value,
          guest_lastname: document.getElementById("guest_lastname").value,
          guest_address: document.getElementById("guest_address").value,
          guest_email: document.getElementById("guest_email").value,
          guest_phone_number:
            document.getElementById("guest_phone_number").value,
          total_price: this.total,
          shopping_cart: this.shopping_cart,
          products_id: this.products_id,
        })
        .then((response) => {
          console.log("Successfully uploaded: ", response);
        })
        .catch((err) => {
          console.error("error occurred: ", err);
        });
    },
  },
  mounted() {
    this.getClientToken();
    if (
      localStorage.getItem("shopping_cart") &&
      localStorage.getItem("total")
    ) {
      this.shopping_cart = JSON.parse(localStorage.getItem("shopping_cart"));
      this.total = JSON.parse(localStorage.getItem("total"));
      this.shopping_cart.forEach((product) => {
        let item = { id: Number(product.id), qty: product.qty };
        this.products_id.push(item);
      });
    }
  },
};
</script>

<style lang="scss" scoped>
.page_wrapper {
  font-family: "Roboto", sans-serif;
}
.box_shadow {
  box-shadow: 0 3px 10px rgb(0 0 0 / 0.2);
}

.checkout_wrapper {
  width: 100%;
}

.payment_wrapper {
  min-width: 300px;
}
</style>