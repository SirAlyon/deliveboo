<template>
  <div class="container">
    <!-- Checkout test page -->
    <h1>Checkout</h1>
    <div class="row">
      <div class="col-12">
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
            <div class="col-6 d-flex align-items-center justify-content-end">
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
          <!-- /.purchesed_product -->
        </div>
      </div>
      <div class="col-6">
        <form method="post" id="payment-form" action="api/braintree/payment">
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
            id="nonce"
            name="payment_method_nonce"
            type="hidden"
            v-bind:value="csrf"
          />
          <input id="amount" name="amount" type="number" :value="total" />

          <div id="dropin-container"></div>
          <button id="submit-button">Request payment method</button>
        </form>
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
  },
  mounted() {
    this.getClientToken();
    if (
      localStorage.getItem("shopping_cart") &&
      localStorage.getItem("total")
    ) {
      this.shopping_cart = JSON.parse(localStorage.getItem("shopping_cart"));
      this.total = JSON.parse(localStorage.getItem("total"));
    }
  },
};
</script>
