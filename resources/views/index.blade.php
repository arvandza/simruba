<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMRUBA | Selamat Datang</title>

    <!--vendor css ================================================== -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/addons/css/vendor.css') }}">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <!--Bootstrap ================================================== -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

    <!-- Style Sheet ================================================== -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/addons/style.css') }}">

    <!-- Google Fonts ================================================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">


    <!-- script ================================================== -->
    <script src="{{ asset('assets/addons/js/modernizr.js') }}"></script>

</head>

<body data-bs-spy="scroll" data-bs-target="#header-nav" tabindex="0">

    <nav class="navbar navbar-expand-lg  navbar-light container-fluid py-3 position-fixed ">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="index.html">
                <img src="{{ asset('assets/images/logo.webp') }}" style="width: 48px;" alt="logo" class="me-2">
                <span class="fw-bold" style="color: #772E72">SIMRUBA</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav align-items-center justify-content-end flex-grow-1 pe-3">

                    </ul>

                    <div class="d-flex mt-5 mt-lg-0 ps-xl-5 align-items-center justify-content-center ">
                        <ul class="navbar-nav align-items-center justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="btn btn-outline-primary nav-button mx-3">Login</a>

                            </li>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="tabs-listing">
                                                <nav>
                                                    <div class="nav nav-tabs d-flex justify-content-center align-items-center border-0"
                                                        id="nav-tab" role="tablist">
                                                        <img src="{{ asset('assets/images/logo.webp') }}"
                                                            style="width: 48px;" alt="logo" class="me-2">
                                                        <h4 class="mb-0" style="color: #772E72">SIMRUBA</h4>
                                                    </div>
                                                </nav>
                                                <div class="tab-content" id="nav-tabContent">
                                                    <div class="tab-pane fade active show" id="nav-sign-in"
                                                        role="tabpanel" aria-labelledby="nav-sign-in-tab">
                                                        <form id="form1" class="form-group flex-wrap p-3 ">
                                                            <div class="form-input col-lg-12 my-4">
                                                                <label for="exampleInputEmail1"
                                                                    class="form-label fs-6 text-uppercase fw-bold text-black">Email
                                                                </label>
                                                                <input type="text" id="exampleInputEmail1"
                                                                    name="email" placeholder="Email"
                                                                    class="form-control ps-3">
                                                            </div>
                                                            <div class="form-input col-lg-12 my-4">
                                                                <label for="inputPassword1"
                                                                    class="form-label  fs-6 text-uppercase fw-bold text-black">Password</label>
                                                                <input type="password" id="inputPassword1"
                                                                    placeholder="Password" class="form-control ps-3"
                                                                    aria-describedby="passwordHelpBlock">
                                                                <div id="passwordHelpBlock"
                                                                    class="form-text text-center">

                                                                </div>

                                                            </div>
                                                            <label class="py-3">
                                                                <input type="checkbox" required=""
                                                                    class="d-inline">
                                                                <span class="label-body text-black">Remember Me</span>
                                                            </label>
                                                            <div class="d-grid my-3">
                                                                <button
                                                                    class="btn btn-primary btn-lg btn-dark text-uppercase btn-rounded-none fs-6">Log
                                                                    In</button>

                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="tab-pane fade" id="nav-register" role="tabpanel"
                                                        aria-labelledby="nav-register-tab">
                                                        <form id="form2" class="form-group flex-wrap p-3 ">
                                                            <div class="form-input col-lg-12 my-4">
                                                                <label for="exampleInputEmail2"
                                                                    class="form-label fs-6 text-uppercase fw-bold text-black">Email
                                                                    Address</label>
                                                                <input type="text" id="exampleInputEmail2"
                                                                    name="email" placeholder="Email"
                                                                    class="form-control ps-3">
                                                            </div>
                                                            <div class="form-input col-lg-12 my-4">
                                                                <label for="inputPassword2"
                                                                    class="form-label  fs-6 text-uppercase fw-bold text-black">Password</label>
                                                                <input type="password" id="inputPassword2"
                                                                    placeholder="Password" class="form-control ps-3"
                                                                    aria-describedby="passwordHelpBlock">
                                                            </div>
                                                            <label class="py-3">
                                                                <input type="checkbox" required=""
                                                                    class="d-inline">
                                                                <span class="label-body text-black">I agree to the <a
                                                                        href="#"
                                                                        class="text-black password border-bottom">Privacy
                                                                        Policy</a>
                                                                </span>
                                                            </label>
                                                            <div class="d-grid my-3">
                                                                <button
                                                                    class="btn btn-primary btn-lg btn-dark text-uppercase btn-rounded-none fs-6">Sign
                                                                    Up</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </ul>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal2" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="tabs-listing">
                                            <nav>
                                                <div class="nav nav-tabs d-flex justify-content-center border-0"
                                                    id="nav-tab2" role="tablist">
                                                    <button class="btn btn-outline-primary text-uppercase me-4 "
                                                        id="nav-sign-in-tab2" data-bs-toggle="tab"
                                                        data-bs-target="#nav-sign-in2" type="button" role="tab"
                                                        aria-controls="nav-sign-in2" aria-selected="false">Log
                                                        In</button>
                                                </div>
                                            </nav>
                                            <div class="tab-content" id="nav-tabContent1">
                                                <div class="tab-pane fade " id="nav-sign-in2" role="tabpanel"
                                                    aria-labelledby="nav-sign-in-tab2">
                                                    <form id="form3" class="form-group flex-wrap p-3 ">
                                                        <div class="form-input col-lg-12 my-4">
                                                            <label for="exampleInputEmail3"
                                                                class="form-label fs-6 text-uppercase fw-bold text-black">Email
                                                                Address</label>
                                                            <input type="text" id="exampleInputEmail3"
                                                                name="email" placeholder="Email"
                                                                class="form-control ps-3">
                                                        </div>
                                                        <div class="form-input col-lg-12 my-4">
                                                            <label for="inputPassword3"
                                                                class="form-label  fs-6 text-uppercase fw-bold text-black">Password</label>
                                                            <input type="password" id="inputPassword3"
                                                                placeholder="Password" class="form-control ps-3"
                                                                aria-describedby="passwordHelpBlock">
                                                            <div id="passwordHelpBlock2"
                                                                class="form-text text-center">
                                                                <a href="#" class=" password">Forgot Password
                                                                    ?</a>
                                                            </div>

                                                        </div>
                                                        <label class="py-3">
                                                            <input type="checkbox" required="" class="d-inline">
                                                            <span class="label-body text-black">Remember Me</span>
                                                        </label>
                                                        <div class="d-grid my-3">
                                                            <button
                                                                class="btn btn-primary btn-lg btn-dark text-uppercase btn-rounded-none fs-6">Log
                                                                In</button>

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
                </div>
            </div>
        </div>
    </nav>

    <!-- hero section start  -->
    <section id="hero" class=" position-relative overflow-hidden">
        <div class="pattern-overlay pattern-right position-absolute">

        </div>
        <div class="pattern-overlay pattern-left position-absolute">

        </div>
        <div class="hero-content container text-center">
            <div class="row">
                <div class="detail mb-4">
                    <h1 class="">Peminjaman <span class="text-primary"> Ruangan </span>dan <span
                            class="text-primary"> Barang </span>
                    </h1>
                    <p class="hero-paragraph"></p>
                </div>
            </div>
        </div>
    </section>

    <!-- search section start  -->
    <section id="search">
        <div class="container search-block p-5">

            <form class="row justify-content-center">
                <div class="col-12 col-md-6 col-lg-5 mt-4 mt-lg-0">
                    <label for="pick-up-date" class="label-style text-capitalize form-label">Tanggal
                        Peminjaman</label>
                    <div class="input-group date" id="datepicker1">
                        <input type="text" class="form-control p-3" id="pick-up-date" />

                        <span class="input-group-append">
                            <span class="search-icon-position position-absolute p-3">
                                <iconify-icon class="search-icons" icon="solar:calendar-broken"></iconify-icon>
                            </span>
                        </span>

                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-5 mt-4 mt-lg-0">
                    <label for="return-date" class="label-style text-capitalize form-label">Tanggal
                        Pengembalian</label>
                    <div class="input-group date" id="datepicker2">
                        <input type="text" class="form-control p-3" id="return-date" />

                        <span class="input-group-append">
                            <span class="search-icon-position position-absolute p-3">
                                <iconify-icon class="search-icons" icon="solar:calendar-broken"></iconify-icon>
                            </span>
                        </span>

                    </div>
                </div>
            </form>
            <div class="d-grid gap-2 mt-4 col-lg-10 mx-auto">
                <a class="btn btn-primary " href="{{ route('searchroom') }}">Cari Ruang atau Barang</a>
            </div>
        </div>

    </section>

    <!-- process section start  -->
    <section id="process">
        <div class=" process-content container">
            <h2 class=" text-center my-5 pb-5">Proses <span class="text-primary"> Peminjaman </span> </h2>
            <hr class="progress-line">
            <div class="row process-block">
                <div class="col-6 col-lg-3 text-start my-4">
                    <div class="bullet"></div>
                    <h5 class="text-uppercase mt-5"> Login </h5>
                    <p>Melakukan login dengan kredensial masing-masing pengguna</p>
                </div>

                <div class="col-6 col-lg-3 text-start my-4">
                    <div class="bullet"></div>
                    <h5 class="text-uppercase mt-5"> Cari Ruangan atau Barang </h5>
                    <p>Pengguna mencari ketersediaan ruangan maupun barang yang akan dipinjam</p>
                </div>

                <div class="col-6 col-lg-3 text-start my-4">
                    <div class="bullet"></div>
                    <h5 class="text-uppercase mt-5"> Pinjam Ruangan atau Barang </h5>
                    <p>Melakukan peminjaman dengan cara mengajukan permohonan</p>
                </div>

                <div class="col-6 col-lg-3 text-start my-4">
                    <div class="bullet"></div>
                    <h5 class="text-uppercase mt-5"> Tunggu Persetujuan </h5>
                    <p>Permohonan akan disetujui oleh admin</p>
                </div>

            </div>


        </div>
    </section>

    <!-- rental section start  -->
    <section id="rental" class="position-relative">
        <div class="container my-5 py-5">
            <h2 class=" text-center my-5">Ruangan <span class="text-primary"> yang Tersedia </span> </h2>

            <div class="swiper-button-next rental-swiper-next  rental-arrow position-absolute"></div>
            <div class="swiper-button-prev rental-swiper-prev rental-arrow position-absolute"></div>

            <div class="swiper rental-swiper mb-5">
                <div class="swiper-wrapper">
                    @foreach ($rooms as $room => $item)
                        <div class="swiper-slide">
                            <div class="card">
                                <a href="car-single.html"><img src="{{ asset('storage/' . $item->image) }}"
                                        class="card-img-top" alt="..."></a>
                                <div class="card-body p-4">
                                    <a href="car-single.html">
                                        <h4 class="card-title">{{ $item->name }}</h4>
                                    </a>
                                    <div class="card-text ">
                                        <ul class="d-flex list-unstyled">

                                            <li class="rental-list" style="color: green">
                                                @if ($item->status == 'available')
                                                    Tersedia
                                                @endif

                                            </li>
                                            <li class="rental-list"> <img
                                                    src="{{ asset('assets/addons/images/dot.png') }}" class="px-3"
                                                    alt="image">
                                            </li>
                                            <li class="rental-list display-small"> Kapasitas {{ $item->capacity }}
                                            </li>
                                        </ul>
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between">
                                        <h3 class="pt-2"><span class="rental-price"></span></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

    </section>

    <!-- pricing section start  -->
    <section id="pricing" style="display: none">
        <div class="container py-5 my-5">
            <h2 class=" text-center my-5">See our <span class="text-primary">pricing plan</span> </h2>
            <div class="">
                <input class="form-check-input mx-2" type="hidden" role="switch" id="flexSwitchCheckChecked"
                    checked>
                <label class="pt-2" id="yearly-label" for="flexSwitchCheckChecked"></label>
            </div>
        </div>
    </section>

    <!-- faq section start  -->

    <!-- Footer Section Starts -->
    <section id="footer">

        <footer class="d-flex flex-wrap justify-content-between align-items-center border-top"></footer>

        <div class="container">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-2 pt-4">
                <div class="col-md-6 d-flex align-items-center">
                    <p>© 2025 Codewaves - All rights reserved</p>

                </div>

            </footer>
        </div>
    </section>




    <!-- script ================================================== -->
    <script src="{{ asset('assets/addons/js/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ asset('assets/addons/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/addons/js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.7/dist/iconify-icon.min.js"></script>

</body>

</html>
