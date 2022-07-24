<template>
  <div class="container">
    <!-- Checkout test page -->
    <h1>Checkout</h1>
    <div class="row">
      <div class="col-6">

      </div>
      <div class="col-6">
        <form method="post" id="payment-form" action="api/braintree/payment">
          <input type="text" id="token" name="token" v-bind:value="csrf" />
          <input type="text" id="guest_name" name="guest_name" placeholder="name"/>
          <input type="text" id="guest_lastname" name="guest_lastname" placeholder="lastname"/>
          <input type="email" id="guest_email" name="guest_email" placeholder="email"/>
          <input type="text" id="guest_address" name="guest_address" placeholder="address" />
          <input type="number" id="guest_phone_number" name="guest_phone_number" placeholder="phone" />
          <input type="number" id="total_price" name="total_price" placeholder="price" />
          <input
            id="nonce"
            name="payment_method_nonce"
            type="hidden"
            v-bind:value="csrf"
          />
          <input id="amount" name="amount" type="number" v-bind:value="csrf" />

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
  },
  mounted() {
    this.getClientToken();
  },
};
</script>
