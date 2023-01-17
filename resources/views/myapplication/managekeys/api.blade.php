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
                <a class="btn btn-primary" href="{{route('listapp')}}"><i class='bx bx-chevrons-left'></i>
                    List Application
                </a>
            </div>
            <div class="col-12 mt-5" data-aos="zoom-in-left">
                <div class="mb-3">
                    <div class="mb-4">
                        <h2 class="mb-2">Manage an application key</h2>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-4 bg-light rounded">
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
                                <button class="btn btn-outline-primary" type="button"><i class='bx bx-key' ></i> Generate Access Token</button>
                                <button class="btn btn-outline-primary" type="button"><i class='bx bx-key' ></i> CURL to Generate Access Token</button>
                            </div>
                            <div>
                                <a class="btn btn-primary" href="#APIKeys"><i class='bx bx-chevrons-right'></i> API Keys</a>
                            </div>
                        </div>
                        <div class="col-12 col-lg-8 mt-1">
                            <ul class="nav nav-pills mb-3 gap-5" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="sandbox-tab" data-bs-toggle="pill"
                                        data-bs-target="#sandbox" type="button" role="tab" aria-controls="sandbox"
                                        aria-selected="true">SandBox</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="production-tab" data-bs-toggle="pill"
                                        data-bs-target="#production" type="button" role="tab"
                                        aria-controls="production" aria-selected="false">Production</button>
                                </li>
                            </ul>
                            <hr>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="sandbox" role="tabpanel"
                                    aria-labelledby="sandbox-tab" tabindex="0">
                                    <h4 class="p-2">OAuth2 Keys</h4>
                                    <div class="p-3">
                                        <form class="row g-3 mb-3" action="#">
                                            <div class="col-md-6">
                                                <label for="consumerkey" class="form-label">Consumer Key</label>
                                                <input type="text" class="form-control" name="consumerkey" value=""
                                                    placeholder="N/A" autofocus />
                                                <div id="emailHelp" class="form-text">Consumer Key of the application.</div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="secretkey" class="form-label">Secret Key</label>
                                                <input type="text" class="form-control" name="secretkey" value=""
                                                    placeholder="N/A" autofocus />
                                                    <div id="emailHelp" class="form-text">Consumer Secret of the application.</div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="tokenendpoint" class="form-label">Token Endpoint</label>
                                                <input type="text" class="form-control" name="tokenendpoint" value=""
                                                    placeholder="N/A" autofocus />
                                            </div>
                                            <div class="col-md-6">
                                                <label for="revokeendpoint" class="form-label">Revoke Endpoint</label>
                                                <input type="text" class="form-control" name="revokeendpoint" value=""
                                                    placeholder="N/A" autofocus />
                                            </div>
                                            <div class="col-md-12">
                                                <label for="GrantTypes" class="form-label">Grant Types :</label>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox"
                                                                role="switch" id="flexSwitchCheckDefault">
                                                            <label class="form-check-label"
                                                                for="flexSwitchCheckDefault">JWT</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox"
                                                                role="switch" id="flexSwitchCheckDefault">
                                                            <label class="form-check-label"
                                                                for="flexSwitchCheckDefault">Code</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox"
                                                                role="switch" id="flexSwitchCheckDefault">
                                                            <label class="form-check-label"
                                                                for="flexSwitchCheckDefault">SAML2</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox"
                                                                role="switch" id="flexSwitchCheckDefault">
                                                            <label class="form-check-label"
                                                                for="flexSwitchCheckDefault">Password</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox"
                                                                role="switch" id="flexSwitchCheckDefault">
                                                            <label class="form-check-label"
                                                                for="flexSwitchCheckDefault">Refresh Token</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox"
                                                                role="switch" id="flexSwitchCheckDefault">
                                                            <label class="form-check-label"
                                                                for="flexSwitchCheckDefault">Client Credentials</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox"
                                                                role="switch" id="flexSwitchCheckDefault">
                                                            <label class="form-check-label"
                                                                for="flexSwitchCheckDefault">urn:ietf:params:oauth:grant-type:token-exchange</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="GrantTypes" class="form-label">Scope :</label>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox"
                                                                role="switch" id="flexSwitchCheckDefault">
                                                            <label class="form-check-label"
                                                                for="flexSwitchCheckDefault">am_application_scope</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox"
                                                                role="switch" id="flexSwitchCheckDefault">
                                                            <label class="form-check-label"
                                                                for="flexSwitchCheckDefault">Default</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="consumerkey" class="form-label">CallBack URL</label>
                                                <input type="text" class="form-control" name="consumerkey" value=""
                                                    placeholder="N/A" autofocus />
                                                <div id="emailHelp" class="form-text">Callback URL is a redirection URI in the client application which is used by the authorization server to send the client's user-agent (usually web browser) back after granting access.</div>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="consumerkey" class="form-label">User Access Token Expiry Time</label>
                                                <input type="text" class="form-control" name="consumerkey" value=""
                                                    placeholder="N/A" autofocus />
                                                <div id="emailHelp" class="form-text">Type User Access Token Expiry Time.</div>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="consumerkey" class="form-label">Refresh Token Expiry Time</label>
                                                <input type="text" class="form-control" name="consumerkey" value=""
                                                    placeholder="N/A" autofocus />
                                                <div id="emailHelp" class="form-text">Type Refresh Token Expiry Time.</div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="production" role="tabpanel"
                                    aria-labelledby="production-tab" tabindex="0">
                                    <div class="p-3">
                                        <form class="row g-3 mb-3" action="#">
                                            <div class="col-md-6">
                                                <label for="consumerkey" class="form-label">Consumer Key</label>
                                                <input type="text" class="form-control" name="consumerkey" value=""
                                                    placeholder="N/A" autofocus />
                                                <div id="emailHelp" class="form-text">Consumer Key of the application.</div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="secretkey" class="form-label">Secret Key</label>
                                                <input type="text" class="form-control" name="secretkey" value=""
                                                    placeholder="N/A" autofocus />
                                                    <div id="emailHelp" class="form-text">Consumer Secret of the application.</div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="tokenendpoint" class="form-label">Token Endpoint</label>
                                                <input type="text" class="form-control" name="tokenendpoint" value=""
                                                    placeholder="N/A" autofocus />
                                            </div>
                                            <div class="col-md-6">
                                                <label for="revokeendpoint" class="form-label">Revoke Endpoint</label>
                                                <input type="text" class="form-control" name="revokeendpoint" value=""
                                                    placeholder="N/A" autofocus />
                                            </div>
                                            <div class="col-md-12">
                                                <label for="GrantTypes" class="form-label">Grant Types :</label>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox"
                                                                role="switch" id="flexSwitchCheckDefault">
                                                            <label class="form-check-label"
                                                                for="flexSwitchCheckDefault">JWT</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox"
                                                                role="switch" id="flexSwitchCheckDefault">
                                                            <label class="form-check-label"
                                                                for="flexSwitchCheckDefault">Code</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox"
                                                                role="switch" id="flexSwitchCheckDefault">
                                                            <label class="form-check-label"
                                                                for="flexSwitchCheckDefault">SAML2</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox"
                                                                role="switch" id="flexSwitchCheckDefault">
                                                            <label class="form-check-label"
                                                                for="flexSwitchCheckDefault">Password</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox"
                                                                role="switch" id="flexSwitchCheckDefault">
                                                            <label class="form-check-label"
                                                                for="flexSwitchCheckDefault">Refresh Token</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox"
                                                                role="switch" id="flexSwitchCheckDefault">
                                                            <label class="form-check-label"
                                                                for="flexSwitchCheckDefault">Client Credentials</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox"
                                                                role="switch" id="flexSwitchCheckDefault">
                                                            <label class="form-check-label"
                                                                for="flexSwitchCheckDefault">urn:ietf:params:oauth:grant-type:token-exchange</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="GrantTypes" class="form-label">Scope :</label>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox"
                                                                role="switch" id="flexSwitchCheckDefault">
                                                            <label class="form-check-label"
                                                                for="flexSwitchCheckDefault">am_application_scope</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox"
                                                                role="switch" id="flexSwitchCheckDefault">
                                                            <label class="form-check-label"
                                                                for="flexSwitchCheckDefault">Default</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="consumerkey" class="form-label">CallBack URL</label>
                                                <input type="text" class="form-control" name="consumerkey" value=""
                                                    placeholder="N/A" autofocus />
                                                <div id="emailHelp" class="form-text">Callback URL is a redirection URI in the client application which is used by the authorization server to send the client's user-agent (usually web browser) back after granting access.</div>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="consumerkey" class="form-label">User Access Token Expiry Time</label>
                                                <input type="text" class="form-control" name="consumerkey" value=""
                                                    placeholder="N/A" autofocus />
                                                <div id="emailHelp" class="form-text">Type User Access Token Expiry Time.</div>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="consumerkey" class="form-label">Refresh Token Expiry Time</label>
                                                <input type="text" class="form-control" name="consumerkey" value=""
                                                    placeholder="N/A" autofocus />
                                                <div id="emailHelp" class="form-text">Type Refresh Token Expiry Time.</div>
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
</section>

<script>

</script>
@include('component.footer')
