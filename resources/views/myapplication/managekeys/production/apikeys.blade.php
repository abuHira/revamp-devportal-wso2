@extends('app')

@section('content')

<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="{{route('index')}}">Home</a></li>
            <li>My Application</li>
        </ol>
        <h2>Manage Keys</h2>

    </div>
</section>

<section class="inner-page">
    <div class="container" data-aos="fade-up">

        <div class="row">
            <div class="col-12 col-lg-3">
                <a class="btn btn-primary" href="{{route('managekeys',$app->applicationId)}}"><i class='bx bx-chevrons-left'></i>
                    List Application
                </a>
            </div>
            <div class="col-12 mt-5">
                <div class="mb-3">
                    <div class="mb-4">
                        <h2 class="mb-2">Manage an application key</h2>
                        <p>Key Restrictions</p>
                    </div>
                </div>
                <div class="border-start border-primary border-4 p-3">
                    <div class="d-flex align-items-start">
                        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            <button class="nav-link active" id="v-pills-none-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-none" type="button" role="tab" aria-controls="v-pills-none"
                                aria-selected="true">None</button>
                            <button class="nav-link" id="v-pills-ipaddress-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-ipaddress" type="button" role="tab"
                                aria-controls="v-pills-ipaddress" aria-selected="false">IP Addresses</button>
                            <button class="nav-link" id="v-pills-http-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-http" type="button" role="tab" aria-controls="v-pills-http"
                                aria-selected="false">HTTP Referrers (Web Sites)</button>
                        </div>
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-none" role="tabpanel"
                                aria-labelledby="v-pills-none-tab">
                                None
                            </div>
                            <div class="tab-pane fade" id="v-pills-ipaddress" role="tabpanel"
                                aria-labelledby="v-pills-ipaddress-tab">
                                <div class="mb-3">
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-http" role="tabpanel"
                                aria-labelledby="v-pills-http-tab">...</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
