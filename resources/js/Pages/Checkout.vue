<template>
  <div class="container page_wrapper my-3">
    <!-- Checkout test page -->

    <div class="row">
      <div class="col-12 p-3">
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
      <div class="container checkout_wrapper mt-4">
        <div class="row m-0 justify-content-between">
          <div class="col-xs-12 col-lg-6 p-3 box_shadow mb-4 mb-lg-0">
            <p class="display-6 pt-1">I tuoi dati per la spedizione</p>

            <form action="" novalidate class="needs-validation">
              <input type="text" id="token" name="token" hidden />
              <div class="mt-3">
                <input
                  class="form-control"
                  type="text"
                  id="guest_name"
                  name="guest_name"
                  placeholder="Nome"
                  minlength="2"
                  maxlength="50"
                  required
                />
                <div class="invalid-feedback">Il tuo nome è invalido!</div>
              </div>
              <div class="mt-3">
                <input
                  class="form-control"
                  type="text"
                  id="guest_lastname"
                  name="guest_lastname"
                  placeholder="Cognome"
                  minlength="2"
                  maxlength="50"
                  required
                />
                <div class="invalid-feedback">Il tuo cognome è invalido!</div>
              </div>

              <div class="mt-3">
                <input
                  class="form-control"
                  type="email"
                  id="guest_email"
                  name="guest_email"
                  placeholder="La tua email"
                  minlength="5"
                  required
                />
                <div class="invalid-feedback">La tua mail è invalida</div>
              </div>

              <div class="mt-3">
                <input
                  class="form-control"
                  type="text"
                  id="guest_address"
                  name="guest_address"
                  placeholder="Il tuo indirizzo"
                  required
                />
                <div class="invalid-feedback">Il tuo indirizzo è invalido</div>
              </div>

              <div class="mt-3">
                <input
                  class="form-control"
                  type="number"
                  id="guest_phone_number"
                  name="guest_phone_number"
                  placeholder="Il tuo numero di telefono"
                  pattern="[0-9]+"
                  required
                />
                <div class="invalid-feedback">
                  Il tuo numero di telefono è invalido!
                </div>
              </div>

              <input
                class="form-control"
                id="total_price"
                name="total_price"
                type="number"
                :value="total"
                hidden
              />
            </form>
          </div>
          <div class="col-xs-12 col-lg-5 px-0">
            <div class="container payment_wrapper box_shadow">
              <div class="row row-cols-1 p-3">
                <p class="display-6">Pagamento</p>
                <div class="col p-0">
                  <form
                    id="payment-form"
                    action="/api/braintree/payment"
                    method="post"
                  >
                    <div id="dropin-container"></div>
                    <input id="nonce" name="payment_method_nonce" hidden />

                    <input
                      class="mt-3 form-control"
                      id="guest_user_email"
                      name="guest_user_email"
                      hidden
                    />
                    <input
                      class="mt-3 form-control"
                      id="user_id"
                      name="user_id"
                      :value="user_id"
                      hidden
                    />
                    <input id="amount" name="amount" :value="total" hidden />
                    <div class="position-relative">
                      <button
                        type="submit"
                        class="btn bg-primary mb-4"
                        id="submit-button"
                      >
                        PAY NOW!
                      </button>
                      <button
                        class="btn bg-primary mb-4"
                        id="order-button"
                        @click="createOrder()"
                      >
                        PAY NOW!
                      </button>
                    </div>
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
      user_id: null,
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
              document.querySelector("#guest_user_email").value =
                document.getElementById("guest_email").value;
<<<<<<< HEAD

              form.submit();
=======
                form.submit();
>>>>>>> 07a7973c9d2ed15fe6737576d94427db5dd8e05d
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
          user_id: this.user_id,
        })
        .then((response) => {
          console.log("Successfully uploaded: ", response);
        })
        .catch((err) => {
          console.error("error occurred: ", err);
        });
    },
    validateInputs() {
      let inputs = document.querySelectorAll(".form-control");

      inputs.forEach((input) => {
        console.log(input.type, input.id);

        input.addEventListener("keyup", function () {
          if (input.type === "text" || input.type === "textarea") {
            if (input.value.trim().length == 0) {
              input.value = "";
            }
            //console.log(input.value);
            input.value = input.value.split("  ").join(" ");
            if (input.value.length < 3) {
              input.classList.remove("is-valid");

              input.classList.add("is-invalid");
            } else {
              input.classList.add("is-valid");

              input.classList.remove("is-invalid");
            }
          } else if (input.type === "email") {
            if (input.value.trim().length == 0) {
              input.value = "";
            }
            let filter =  /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (!filter.test(input.value)){
              input.classList.remove("is-valid");

              input.classList.add("is-invalid");
            }else {
              input.classList.add("is-valid");

              input.classList.remove("is-invalid");
            }
          }else if(input.type === 'number'){
            if(input.value.length < 8 || isNaN(Number(input.value))){
              input.classList.remove("is-valid");

              input.classList.add("is-invalid");
            }else {
              input.classList.add("is-valid");

              input.classList.remove("is-invalid");
            }
          }
        });
      });

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      const forms = document.querySelectorAll(".needs-validation");

      // Loop over them and prevent submission
      Array.prototype.slice.call(forms).forEach((form) => {
        console.log(form);

        form.addEventListener(
          "submit",
          (event) => {
            let inputs = document.querySelectorAll(".form-control");

            inputs.forEach((input) => {
              console.log(input.type);

              if (input.type === "text" || input.type === "textarea") {
                if (input.value.trim().length == 0) {
                  input.value = input.value.trim();
                }
                console.log(input.value);
                input.value = input.value.split("  ").join(" ");
              } else if (input.type === "file") {
                let fileExtension = input.value.split(".").pop();

                let allowedExtensione = ["jpg", "png", "jpeg", "gif"];
                console.log(fileExtension);
                if (!allowedExtensione.includes(fileExtension)) {
                  console.log("deleted", fileExtension === "jpg");
                  input.value = "";
                }
              }
            });
            if (!form.checkValidity()) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add("was-validated");
          },
          false
        );
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
        this.user_id = Number(product.user_id);
        console.log(this.user_id);
      });
    }
    this.validateInputs();
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
#order-button {
  opacity: 0.1;
  position: absolute;
  left: 0;
  top: 0;
}
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
