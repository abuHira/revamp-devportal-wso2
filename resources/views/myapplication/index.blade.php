@extends('app')

@section('content')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="{{route('index')}}">Home</a></li>
            <li>My Application</li>
        </ol>
        <h2>Overview</h2>

    </div>
</section><!-- End Breadcrumbs -->

<section class="inner-page">
    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
        <div class="container">

            <div class="mb-5">
                <a class="btn btn-primary" href="{{route('listapp')}}"><i class='bx bx-chevrons-right'></i> List
                    Application</a>
            </div>

            <div class="row">
                <div class="col-lg-6 mt-2 mb-tg-0 order-2 order-lg-1">
                    <ul class="nav nav-tabs flex-column">
                        <li class="nav-item" data-aos="fade-up">
                            <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">
                                <h4>1. Create Application</h4>
                                <p>Setelah login, daftarkan aplikasi Anda dengan cara mengisi formulir Create
                                    Application. Anda akan mendapatkan customer key dan customer secret sebagai
                                    identitas aplikasi Anda.</p>
                            </a>
                        </li>
                        <li class="nav-item mt-2" data-aos="fade-up" data-aos-delay="100">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab-2">
                                <h4>2. Obtain Token</h4>
                                <p>Ada 2 jenis key, yaitu Production dan Sandbox. Token ini wajib dikirim ketiika invoke
                                    API sebagai credential aplikasi yang digunakan saat proses autentikasi dan
                                    autorisasi.</p>
                            </a>
                        </li>
                        <li class="nav-item mt-2" data-aos="fade-up" data-aos-delay="200">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab-3">
                                <h4>3. Subscription API</h4>
                                <p>PIlih API yang ingin digunakan dan lakukan subscription dengan level policy yang
                                    tersedia.</p>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in">
                    <div class="tab-content">
                        <div class="tab-pane active show" id="tab-1">
                            <figure>
                                <img src="assets/landingpage/img/features-1.png" alt="" class="img-fluid">
                            </figure>
                        </div>
                        <div class="tab-pane" id="tab-2">
                            <figure>
                                <img src="assets/landingpage/img/features-2.png" alt="" class="img-fluid">
                            </figure>
                        </div>
                        <div class="tab-pane" id="tab-3">
                            <figure>
                                <img src="assets/landingpage/img/features-3.png" alt="" class="img-fluid">
                            </figure>
                        </div>
                        <div class="tab-pane" id="tab-4">
                            <figure>
                                <img src="assets/landingpage/img/features-4.png" alt="" class="img-fluid">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Features Section -->
</section>

@endsection
