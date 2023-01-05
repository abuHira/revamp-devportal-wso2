<h4 class="p-2">Production OAuth2 Keys</h4>
<div class="p-3">
    <form class="row g-3 mb-3" action="{{route ('generateappkey')}}"
        id="generatekey" method="POST">
        @csrf
        <input type="hidden" name="keyType" value="PRODUCTION">
        {{-- <div class="col-md-6">
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
        </div> --}}
        <div class="col-md-12">
            <p>Key and Secret <br>
                <mark class="text-danger"> Production Key and Secret is not
                    generated for this application</mark></p>
        </div>
        <div class="col-md-6">
            <label for="tokenendpoint" class="form-label">Token Endpoint</label>
            <input type="text" class="form-control" name="tokenendpoint"
                value="https://194.233.88.81:9443/oauth2/token" placeholder="N/A"
                readonly />
        </div>
        <div class="col-md-6">
            <label for="revokeendpoint" class="form-label">Revoke Endpoint</label>
            <input type="text" class="form-control" name="revokeendpoint"
                value="https://194.233.88.81:9443/oauth2/revoke" placeholder="N/A"
                readonly />
        </div>
        <div class="col-md-12">
            <label for="GrantTypes" class="form-label">Grant Types :</label>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox"
                            role="switch">
                        <label class="form-check-label"
                            for="flexSwitchCheckDefault">JWT</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox"
                            role="switch">
                        <label class="form-check-label"
                            for="flexSwitchCheckDefault">Code</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox"
                            role="switch">
                        <label class="form-check-label"
                            for="flexSwitchCheckDefault">SAML2</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox"
                            name="granttype['password']" role="switch"
                         checked>
                        <label class="form-check-label"
                            for="flexSwitchCheckDefault">Password</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox"
                            role="switch">
                        <label class="form-check-label"
                            for="flexSwitchCheckDefault">Refresh Token</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox"
                            name="granttype['client_credentials']" role="switch"
                         checked>
                        <label class="form-check-label"
                            for="flexSwitchCheckDefault">Client Credentials</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox"
                            role="switch">
                        <label class="form-check-label"
                            for="flexSwitchCheckDefault">urn:ietf:params:oauth:grant-type:token-exchange</label>
                    </div>
                </div>
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
                            name="am_application_scope" role="switch"
                         checked>
                        <label class="form-check-label"
                            for="flexSwitchCheckDefault">am_application_scope</label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox"
                            name="default" role="switch"
                            checked>
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
            <div id="emailHelp" class="form-text">Callback URL is a redirection URI
                in the client application which is used by the authorization server
                to send the client's user-agent (usually web browser) back after
                granting access.</div>
        </div>
        <div class="col-md-12">
            <label for="consumerkey" class="form-label">User Access Token Expiry
                Time</label>
            <input type="text" class="form-control" name="consumerkey" value=""
                placeholder="N/A" autofocus />
            <div id="emailHelp" class="form-text">Type User Access Token Expiry
                Time.</div>
        </div>
        <div class="col-md-12">
            <label for="consumerkey" class="form-label">Refresh Token Expiry
                Time</label>
            <input type="text" class="form-control" name="consumerkey" value=""
                placeholder="N/A" autofocus />
            <div id="emailHelp" class="form-text">Type Refresh Token Expiry Time.
            </div>
        </div>

    </form>
</div>