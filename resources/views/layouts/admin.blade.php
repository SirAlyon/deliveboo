<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Deliveboo</title>
        <link rel="shortcut icon" href="https://cwa.roocdn.com/_next/static/favicon-32x32.9ac59871.png" type="image/png" sizes="32x32">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/validateForm.js') }}" defer></script>
        <script src="{{ asset('js/chart.js') }}" defer></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <!-- Resources -->
        <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
        <!-- Styles -->
        <style>
            #chartdiv {
            width: 100%;
            height: 500px;

            }
        </style>
    </head>

    <body>
        <div id="app">
            <header class="navbar navbar-dark sticky-top bg-head flex-md-nowrap p-0 shadow">
                <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/">Deliveboo</a>
                <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-nav px-3">
                    <div class="nav-item text-nowrap">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </header>

            <div class="container-fluid">
                <div class="row">
                    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-side sidebar collapse">
                        <div class="position-sticky pt-3">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link {{Route::currentRouteName() === 'dashboard' ? 'active' : '' }}" href="{{route('admin.dashboard')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-dash" width="20" height="20" fill="currentColor" class="bi bi-speedometer2" viewBox="0 0 16 16">
                                    <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
                                    <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z"/>
                                    </svg>
                                        Dashboard
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{Route::currentRouteName() === 'products' ? 'active' : '' }}" href="{{route('admin.products.index')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-dash" width="20" height="20" viewBox="0 0 26 26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart" aria-hidden="true"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                                        Products
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.orders.index')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon-dash"  width="20" height="20" viewBox="0 0 26 26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file" aria-hidden="true"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                                        Orders
                                    </a>
                                </li>

                            </ul>


                        </div>
                    </nav>
                    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                        @yield('content')
                        {{-- <div id="chartdiv"></div> --}}
                    </main>
                </div>
            </div>


    </body>

</html>
<!-- Chart code -->
{{-- <script>
    document.addEventListener("DOMContentLoaded", function(){
        axios
        .get('/api/orders')
        .then((response) => {
            am5.ready(function() {
                var root = am5.Root.new("chartdiv");

                root.setThemes([
                    am5themes_Animated.new(root)
                ]);

                var chart = root.container.children.push(am5xy.XYChart.new(root, {
                    panX: true,
                    panY: true,
                    wheelX: "panX",
                    wheelY: "zoomX",
                    pinchZoomX:true
                }));

                var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
                cursor.lineY.set("visible", false);

                var xRenderer = am5xy.AxisRendererX.new(root, { minGridDistance: 30 });
                xRenderer.labels.template.setAll({
                    rotation: -90,
                    centerY: am5.p50,
                    centerX: am5.p100,
                    paddingRight: 15
                });

                var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
                    maxDeviation: 0.3,
                    categoryField: "month",
                    renderer: xRenderer,
                    tooltip: am5.Tooltip.new(root, {})
                }));

                var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
                    maxDeviation: 0.3,
                    renderer: am5xy.AxisRendererY.new(root, {})
                }));


                // Create series
                // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
                var series = chart.series.push(am5xy.ColumnSeries.new(root, {
                    name: "Series 1",
                    xAxis: xAxis,
                    yAxis: yAxis,
                    valueYField: "value",
                    sequencedInterpolation: true,
                    categoryXField: "month",
                    tooltip: am5.Tooltip.new(root, {
                        labelText:"{valueY}"
                    })
                }));

                series.columns.template.setAll({ cornerRadiusTL: 5, cornerRadiusTR: 5 });
                series.columns.template.adapters.add("fill", function(fill, target) {
                    return chart.get("colors").getIndex(series.columns.indexOf(target));
                });

                series.columns.template.adapters.add("stroke", function(stroke, target) {
                    return chart.get("colors").getIndex(series.columns.indexOf(target));
                });


                // Set data
                var data = response.data;
                console.log(data);

                xAxis.data.setAll(data);
                series.data.setAll(data);

                series.appear(1000);
                chart.appear(1000, 100);
            });
        })
        .catch((error) => {
            console.error(error);
        });
    });
    </script>
 --}}
