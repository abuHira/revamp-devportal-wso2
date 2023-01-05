@include('component.header')

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
                <a class="btn btn-primary" href="{{route('managekeys')}}"><i class='bx bx-chevrons-left'></i>
                    OAuth2 Keys
                </a>
            </div>
            <div class="col-12 mt-5">
                <div class="mb-3">
                    <div class="mb-4">
                        <h2 class="mb-2">API Keys</h2>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-4 bg-light rounded" data-aos="fade-up-right">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <p class="fw-bold">
                                        Application Name:
                                    </p>
                                    Mobile APPS
                                </li>
                                <li class="list-group-item">
                                    <p class="fw-bold">
                                        Business Plan:
                                    </p>
                                    Unlimited
                                </li>
                                <li class="list-group-item text-break">
                                    <p class="fw-bold">
                                        Description:
                                    </p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci maiores quo
                                    temporibus, odit rem voluptatibus?
                                </li>
                            </ul>
                            <div class="d-grid gap-2 my-3">
                                <button class="btn btn-outline-primary" type="button"><i class='bx bxs-key'></i> Generate Key</button>
                                <small class="text-muted p-3">(Use the Generate Key button to generate a self-contained JWT token.)</small>
                            </div>
                        </div>
                        <div class="col-12 col-lg-8 mt-1" data-aos="fade-up-left">
                            <h4 class="p-2">Sandbox API Keys</h4>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('component.footer')
