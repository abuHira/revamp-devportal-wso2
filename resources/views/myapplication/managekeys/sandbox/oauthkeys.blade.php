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
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-4 bg-light rounded" data-aos="fade-up-right">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <p class="fw-bold">
                                        Application Name:
                                    </p>
                                    {{$app->name}}
                                </li>
                                <li class="list-group-item">
                                    <p class="fw-bold">
                                        Business Plan:
                                    </p>
                                    {{$app->throttlingPolicy}}
                                </li>
                                <li class="list-group-item text-break text-capitalize">
                                    <p class="fw-bold">
                                        Description:
                                    </p>
                                    {{$app->description}}
                                </li>
                            </ul>
                            <div class="d-grid gap-2 my-3">

                                <button class="btn btn-outline-primary generate" type="submit" form="generatekey"><i
                                        class='bx bxs-key'></i>
                                    Generate Key</button>
                                {{-- <button class="btn btn-outline-primary" type="button"><i class='bx bx-key' ></i> Generate Access Token</button>
                                <button class="btn btn-outline-primary" type="button"><i class='bx bx-key' ></i> CURL to Generate Access Token</button> --}}
                            </div>
                        </div>
                        <div class="col-12 col-lg-8 mt-1" data-aos="fade-up-left">
                            <h4 class="p-2">Sandbox OAuth2 Keys</h4>
                            <div class="p-3">
                                <form class="row g-3 mb-3" action="{{ route ('oauthgenerate') }}"
                                    id="generatekey" method="POST">
                                    @csrf
                                    <input type="hidden" name="type" value="SANDBOX">
                                    <input type="hidden" name="id" value="{{$app->applicationId}}">

                                    <div class="row consumer" style="display: none;">
                                        <div class="col-md-6">
                                            <label for="consumerkey" class="form-label">Consumer Key</label>
                                            <input type="text" class="form-control" name="consumerkey" value=""
                                                placeholder="N/A" readonly/>
                                            <div id="emailHelp" class="form-text">Consumer Key of the application.</div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="secretkey" class="form-label">Secret Key</label>
                                            <input type="text" class="form-control" name="secretkey" value=""
                                                placeholder="N/A" readonly/>
                                                <div id="emailHelp" class="form-text">Consumer Secret of the application.</div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 infoconsumer">
                                        <p>Key and Secret <br>
                                            <mark class="text-danger"> Production Key and Secret is not
                                                generated for this application</mark></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="tokenendpoint" class="form-label">Token Endpoint</label>
                                        <input type="text" class="form-control" name="tokenendpoint"
                                            value="{{ $url }}/oauth2/token" placeholder="N/A"
                                            readonly />
                                    </div>
                                    <div class="col-md-6">
                                        <label for="revokeendpoint" class="form-label">Revoke Endpoint</label>
                                        <input type="text" class="form-control" name="revokeendpoint"
                                            value="{{ $url }}/oauth2/revoke" placeholder="N/A"
                                            readonly />
                                    </div>
                                    <div class="col-md-12">
                                        <label for="GrantTypes" class="form-label">Grant Types :</label>
                                        <div class="row">

                                            @foreach ($grant->grantTypes as $item)
                                                @if ($item == 'implicit')
                                                    @continue
                                                @endif
                                            <div class="col-md-4">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="granttype[{{ $item }}]" role="switch" {{ ( $item == 'password' || $item == 'client_credentials') ? 'checked':''}}>
                                                    <label class="form-check-label">
                                                        @foreach ($granttype as $key=>$label)
                                                            @if ($key == $item)
                                                                {{ $label }}
                                                            @endif
                                                        @endforeach
                                                    </label>
                                                </div>
                                            </div>
                                            @endforeach
                                            <div class="col-md-12">
                                                <small>
                                                    <mark class="fw-light text-danger">
                                                        (The application can use the following grant types to
                                                        generate Access Tokens. Based on the application
                                                        requirement,you can enable or disable grant types for
                                                        this application.)
                                                    </mark>
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="GrantTypes" class="form-label">Scope :</label>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="scopetype[am_application_scope]" role="switch"
                                                    checked>
                                                    <label class="form-check-label"
                                                        for="amapplication">am_application_scope</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox"
                                                        name="scopetype[default]" role="switch"
                                                        checked>
                                                    <label class="form-check-label"
                                                        for="default">Default</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="consumerkey" class="form-label">CallBack URL</label>
                                        <input type="text" class="form-control" name="callback"
                                            placeholder="N/A"/>
                                        <div id="emailHelp" class="form-text">Callback URL is a redirection URI
                                            in the client application which is used by the authorization server
                                            to send the client's user-agent (usually web browser) back after
                                            granting access.</div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="consumerkey" class="form-label">User Access Token Expiry
                                            Time</label>
                                        <input type="text" class="form-control" name="#"
                                            placeholder="N/A"/>
                                        <div id="emailHelp" class="form-text">Type User Access Token Expiry
                                            Time.</div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="consumerkey" class="form-label">Refresh Token Expiry
                                            Time</label>
                                        <input type="text" class="form-control" name="consumerkey"
                                            placeholder="N/A"/>
                                        <div id="emailHelp" class="form-text">Type Refresh Token Expiry Time.
                                        </div>
                                    </div>

                                </form>
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
