<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Document</title>
    <style>
        .mail{
            padding: 0.5rem;
            width: 100%
        }
        .infos{
            display: flex;
            padding: 0 1rem;
            justify-content: space-between;
            background-color: rgba(211, 211, 211, 0.7)
        }
        .text-center{
            text-align: center
        }
        .mt-3{
            margin-top: 1.5rem;
        }
        .mb-3{
            margin-bottom: 1.5rem;
        }
        .w-100{
            width: 100%;
        }
        .fs-3{
            font-size: 2rem;
        }
        .th-1{
            font-weight: bold;
            font-size: 1.3rem;
            background-color: rgba(211, 211, 211, 0.7);
        }
        .th-1{
            font-weight: normal;
        }

        .logo{
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 3rem;
        }
        .logo>img{
            max-width: 100%;
            height: 70px;
            width: auto
        }

        .logo>span{
            font-weight: bold;
            font-size: 3rem;
            margin-left: 0.5rem;
        }

        .prev{
            font-style: italic;
        }
        
    </style>
</head>
<body class="mail">
    <div class="logo">
        <img src="https://www.lavorareconnoi.com/wp-content/uploads/2020/07/logo-deliveroo.jpg" alt="">
        <span>deliverboo</span>
    </div>
    <div class="text-center fs-3">Hi <strong>{{$order->guest_name}}</strong>! Thank you for the order!</div >


    <p class="mt-3 text-center">Your order is on its way</p>
    <span class="text-center prev">Delivery of healthy food is the best solution for business people. Who wants to eat right, look healthy and work productively all day.</span>

    <div class="infos w-100 mt-3">
        <div class="col-6 mb-3">
            <h3>SUMMARY:</h3>
            <div>Order #: <strong>{{$order->id}}</strong></div>
            <div>Order Date: <strong>{{$order->created_at}}</strong></div>
            <div>Order Total: <strong>€ {{$order->total_price}}</strong></div>
        </div>
        <div class="col-6 mb-3">
            <h3>SHIPPING ADDRESS:</h3>
            <div>{{$order->guest_name}} {{$order->guest_lastname}}</div>
            <div>{{$order->guest_address}}</div>
            <div>Milan, Italy 20100</div>
        </div>
    </div>

    <div class="products mt-3">
        <table class="table table-striped w-100">
            <thead>
              <tr>
                <th class="th-1">Products</th>
                <th class="th-1">Price</th>
                <th class="th-1">Quantity</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($cart as $product)
                    <tr>
                    <th class="th-2">{{$product['name']}}</th>
                    <th class="th-2">€ {{$product['price']}}</th>
                    <th class="th-2">{{$product['qty']}}</th>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
    <div class="text-center mt-3">
        Thanks, <strong>deliverboo.</strong>
    </div>


</body>
</html>
