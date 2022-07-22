<head>
  <meta charset="utf-8">
  <script src="https://js.braintreegateway.com/web/dropin/1.33.2/js/dropin.min.js"></script>
</head>
<body>
  <form method="post" id="payment-form" action="/checkout">
    @csrf
    <input type="text"  value="{{$clientToken}}" id="token">
    <input id="nonce" name="payment_method_nonce" type="hidden" />
    <input id="amount" name="amount" type="number" />

    <div id="dropin-container"></div>
    <button id="submit-button">Request payment method</button>
  </form>
  <script>
    var submitButton = document.querySelector('#submit-button');
    var form = document.querySelector('#payment-form');
    let token = document.getElementById('token').value


     braintree.dropin.create({
       authorization: token,
       selector: '#dropin-container'
     }, function (err, dropinInstance) {
       if (err) {
         // Handle any errors that might've occurred when creating Drop-in
         console.error(err);
         return;
       }
       form.addEventListener('submit', function (event) {
        event.preventDefault();

         dropinInstance.requestPaymentMethod(function (err, payload) {
           if (err) {
             // Handle errors in requesting payment method
             console.log('Error', err);
              return;
           }

           // Send payload.nonce to your server
           document.querySelector('#nonce').value = payload.nonce;

          form.submit();
         });
       });
     });
  </script>
</body>