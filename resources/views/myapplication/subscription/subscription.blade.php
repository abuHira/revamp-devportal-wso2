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

        <h4><i class="bi bi-gear"></i> Subscription Management</h4>
        <hr>
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="col-12 mb-3">
                    <a class="btn btn-primary" href="{{route ('listapp')}}"><i class='bx bx-chevrons-left'></i>
                        List Application
                    </a>
                </div>
                <div class="card border-primary border-opacity-25">
                    <div class="card-body">
                        <div class="text-center mb-1">
                            <small class="fw-bold">Applicaiton detail</small>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <p class="fw-bold">Application Name :</p>
                                {{$data->name}}
                            </li>
                            <li class="list-group-item">
                                <p class="fw-bold">Owner :</p>
                                {{$data->owner}}
                            </li>
                            <li class="list-group-item">
                                <p class="fw-bold">Description :</p>
                                {{$data->description}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-8">
                <div class="col-12 d-flex justify-content-end">
                    {{-- <a type="button" class="btn btn-success rounded fw-bold" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">
                        <i class='bx bx-add-to-queue text-light'></i>
                        Add Subscribe APIs
                    </a> --}}
                    <a href="{{route ('addsubscription',$data->applicationId)}}"
                    class="btn btn-success rounded fw-bold">
                    <i class='bx bx-add-to-queue text-light'></i> Subscribe APIs</a>
                </div>
                <div class="col-12">
                    @if ($subs->list == null)
                    <div class="col-md-12 p-5">
                        <div class="col-md-12 row bd-callout bd-callout-warning rounded-2 my-2 p-4">
                            <div class="col-1">
                                <h1><i class='bx bx-info-circle bx-flashing text-dark'></i></h1>
                            </div>
                            <div class="col-11 text-dark">
                                <p class="fw-bold fs-3">No Subscriptions Available</p>
                                <p class="">No subscriptions are available for this Application</p>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="table-responsive mt-3">
                        <table class="table table-striped table-hover ">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">API</th>
                                    <th scope="col">Lifecycle State</th>
                                    <th scope="col">Business Plan</th>
                                    <th scope="col">Subscription Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subs->list as $items)
                                <tr>
                                    <td>{{$items->apiInfo->name}} - {{$items->apiInfo->version}} </td>
                                    <td>{{$items->apiInfo->lifeCycleStatus}}</td>
                                    <td>{{$items->throttlingPolicy}}</td>
                                    <td>{{$items->status}} </td>
                                    <td>
                                        <a class="btn btn-warning" href="#" disabled>
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a class="btn btn-danger"
                                            href="{{route ('deletesubs',$items->subscriptionId)}}">
                                            <i class="bi bi-trash3"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Modal -->
{{-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">
                    <i class="bi bi-node-plus-fill"></i>
                    Add Subscription
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-dark" type="submit">Search</button>
                        </form>
                    </div>
                    <div class="col-12">
                        <div class="table-responsive mt-3">
                            <table class="table table-striped table-hover text-center">
                                <thead class="table-primary">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">API Name</th>
                                        <th scope="col">Version</th>
                                        <th scope="col">Subscription Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-check d-flex justify-content-center">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckDefault">
                                            </div>
                                        </td>
                                        <td>Json</td>
                                        <td>1.0</td>
                                        <td>
                                            <select class="form-select" aria-label="Choice Subscription Status"
                                                name="#">
                                                <option value="" selected>-- Select --</option>
                                                <option value="">Unlimited</option>
                                                <option value="">Gold5Hit</option>
                                            </select>
                                        </td>
                                        <td>
                                            <a class="btn btn-outline-success fw-bold" href="#" disabled>
                                                <i class="bi bi-plus-circle"></i> Subscribe
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                  <li class="page-item disabled">
                                    <a class="page-link">Previous</a>
                                  </li>
                                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                                  <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                  </li>
                                </ul>
                              </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger fw-bold text-white" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success fw-bold"><i class='bx bx-add-to-queue text-light'></i> Collective Subscribe</button>
            </div>
        </div>
    </div>
</div> --}}
<!-- Modal -->


@endsection
