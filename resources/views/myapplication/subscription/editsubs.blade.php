@extends('app')

@section('content')

<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="{{route('index')}}">Home</a></li>
            <li>My Application</li>
        </ol>
        <h2>Subscription</h2>

    </div>
</section>

<section class="inner-page">
    <div class="container" data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">

        <div class="col-12 mb-3">
            <a class="btn btn-primary" href="#"><i class='bx bx-chevrons-left'></i>
                List Subscription
            </a>
        </div>

        <div class="row">
            <div class="col-12 col-md-6">
                <h4><i class="bi bi-node-plus-fill"></i> Edit Subscription</h4>
            </div>
            <div class="col-12 col-md-6 d-flex justify-content-end">
                <a class="btn btn-success my-2" href="#"><i class='bx bx-add-to-queue text-light'></i>  Colective Subscribe</a>
            </div>
            <hr>
        </div>

        <div class="my-2">
            <p class="fw-bold"><i class="bi bi-list"></i> List API</p>
        </div>
        <div class="row">

            <h1>Edit subs</h1>

        </div>
    </div>
</section>
@endsection
