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
                <a class="btn btn-primary" href="{{route('listapp')}}"><i class='bx bx-chevrons-left'></i>
                    List Application
                </a>
            </div>
            <div class="col-12 mt-5">
                <div class="mb-3">
                    <div class="mb-4">
                        <h2 class="mb-2">Manage an application key</h2>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-4 bg-light rounded" data-aos="fade-up-right">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <p class="fw-bold">
                                        Application Name:
                                    </p>
                                    {{$data->name}}
                                </li>
                                <li class="list-group-item">
                                    <p class="fw-bold">
                                        Business Plan:
                                    </p>
                                    {{$data->throttlingPolicy}}
                                </li>
                                <li class="list-group-item text-break text-capitalize">
                                    <p class="fw-bold">
                                        Description:
                                    </p>
                                    {{$data->description}}
                                </li>
                            </ul>
                            <div class="d-grid gap-2 my-3">

                                <button class="btn btn-outline-primary generate" type="submit" form="generatekey"><i
                                        class='bx bxs-key'></i>
                                    Generate Key</button>
                                {{-- <button class="btn btn-outline-primary" type="button"><i class='bx bx-key' ></i> Generate Access Token</button>
                                <button class="btn btn-outline-primary" type="button"><i class='bx bx-key' ></i> CURL to Generate Access Token</button> --}}
                            </div>
                            <div>
                                {{-- <a class="btn btn-primary" href="{{route ('sandboxapikeys',$data->applicationId)}}"><i
                                        class='bx bx-chevrons-right'></i> API Keys</a> --}}
                            </div>
                        </div>
                        <div class="col-12 col-lg-8 mt-1" data-aos="fade-up-left">
                            <ul class="nav nav-pills mb-3 gap-5" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="sandbox-tab" data-bs-toggle="pill"
                                        data-bs-target="#sandbox" type="button" role="tab" aria-controls="sandbox"
                                        aria-selected="true">SandBox</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="production-tab" data-bs-toggle="pill"
                                        data-bs-target="#production" type="button" role="tab" aria-controls="production"
                                        aria-selected="false">Production</button>
                                </li>
                            </ul>
                            <hr>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="sandbox" role="tabpanel"
                                    aria-labelledby="sandbox-tab" tabindex="0">
                                    @include('myapplication.managekeys.sandbox.oauthkeys')
                                </div>
                                <div class="tab-pane fade" id="production" role="tabpanel"
                                    aria-labelledby="production-tab" tabindex="0">
                                    @include('myapplication.managekeys.sandbox.oauthkeys')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('script')
<script>
    $(document).on('submit', '#generatekey', function (event) {
        event.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: new FormData(this),
            processData: false,
            dataType: 'json',
            contentType: false,
            beforeSend: function () {
                '<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> Loading ...'
            },
            success: function (data) {
                console.log(data);
                $('.consumer').show();
                $('.infoconsumer').hide();
                $('input[name="consumerkey"]').val(data.consumerKey);
                $('input[name="secretkey"]').val(data.consumerSecret);
                Swal.fire({
                    position: 'top',
                    icon: 'success',
                    title: 'Data berhasil di generate',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        });
    });

</script>    
@endpush

@endsection
