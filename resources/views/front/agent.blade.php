@extends('layouts.admin')
@section('content')
    <div class="layout-px-spacing">
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary mt-2" data-toggle="modal" data-target="#create">Add building</button>
        </div>
        <div class="row layout-top-spacing">
            @foreach ($buildings as $building)
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                    <div class="widget widget-card-one">
                        <div class="widget-content">

                            <div class="media">
                                <div class="w-img">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-calendar-date" viewBox="0 0 16 16">
                                        <path
                                            d="M6.445 11.688V6.354h-.633A12.6 12.6 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61h.675zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82h-.684zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23z" />
                                        <path
                                            d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                    </svg>
                                </div>
                                <div class="media-body">
                                    <h6>{{ $building->created_at->diffForHumans() }}</h6>
                                </div>
                                <div class="">
                                    <p class="mt-2">
                                        <span class="" style="font-size: 14px">
                                            {{ $building->views }}
                                        </span>

                                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                                            fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                            <path
                                                d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                        </svg>


                                    </p>
                                </div>
                                <div class="">
                                    <button class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#edit-{{ $building->id }}"> Edit</button>
                                </div>
                                <div class="ml-1">
                                    <button class="btn btn-danger btn-sm" data-toggle="modal"
                                        data-target="#delete-{{ $building->id }}"> Delete</button>
                                </div>
                            </div>

                            <h3 class="text-center">
                                <div class="mb-4">

                                    <img src="{{ asset('assets/images/' . $building->images->first()->name) }}"
                                        alt="" width="90%" class="rounded">
                                </div>
                                <a href="{{ route('building.view', $building->id) }}">
                                    {{ $building->name }}
                                </a>


                            </h3>

                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>



    @foreach ($buildings as $building)
        {{-- edit modal --}}
        <div id="edit-{{ $building->id }}" class="modal animated slideInUp custo-slideInUp" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">edit Building {{ $building->name }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('building.update', $building->id) }}" method="post"
                            enctype="multipart/form-data">

                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="name" name="name"
                                    value="{{ $building->name }}">
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" placeholder="price" name="price"
                                    value="{{ $building->price }}">
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" placeholder="sq" name="sq"
                                    value="{{ $building->sq }}">
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" placeholder="beds" name="beds"
                                    value="{{ $building->beds }}">
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" placeholder="baths" name="baths"
                                    value="{{ $building->baths }}">
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" placeholder="sq price" name="price_sq"
                                    value="{{ $building->price_sq }}">
                            </div>
                            <div class="form-group">
                                <input min="1900" max="2099" step="1" id="datepicker"
                                    class="form-control" placeholder="built year" name="year_built"
                                    value="{{ $building->year_built }}">
                            </div>
                            <div class="form-group">

                                <select class="selectpicker" data-live-search="true" name="city_id">
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}"
                                            @if ($building->city_id == $city->id) selected @endif>{{ $city->name }}</option>
                                    @endforeach

                                </select>

                                <select class="selectpicker m-1" data-live-search="true" name="country_id">
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}"
                                            @if ($building->country_id == $country->id) selected @endif>{{ $country->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <select class="selectpicker form-control" name="type" data-live-search="true">
                                    <option value="rent" @if ($building->type == 'rent') selected @endif>rent</option>
                                    <option value="sell" @if ($building->type == 'sale') selected @endif>sell</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <textarea name="description" id="" cols="50" class="form-control" rows="5"
                                    placeholder="description">
                                {{ $building->description }}
                                </textarea>
                            </div>

                            <div class="form-group">
                                <label for="">Images</label>
                                <input id="input-id" class="form-control" multiple name="images[]" type="file"
                                    class="file" data-preview-file-type="text">
                            </div>


                            <div class="modal-footer md-button">
                                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                                    Discard</button>
                                <button type="submit" class="btn btn-primary">update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- end edit modal --}}

        {{-- delete Modal --}}

        <div class="modal fade" id="delete-{{ $building->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('building.delete', $building->id) }}" method="post">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{ $building->name }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this building?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        {{-- end delete modal --}}
    @endforeach

    {{-- add building modal --}}

    <div id="create" class="modal animated slideInUp custo-slideInUp" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Building</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('building.add') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="name" name="name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="address" name="address">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="price" name="price">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="sq" name="sq">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="sq price" name="price_sq">
                        </div>
                        <div class="form-group">
                            <input min="1900" max="2099" step="1" id="datepicker" class="form-control"
                                placeholder="built year" name="year_built">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="beds" name="beds">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="baths" name="baths">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="sq price" name="price_sq"
                              >
                        </div>
                        <div class="form-group">
                            <input min="1900" max="2099" step="1" id="datepicker" class="form-control"
                                placeholder="built year" name="year_built" >
                        </div>
                        <div class="form-group">

                            <select class="selectpicker" data-live-search="true" name="city_id">
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach

                            </select>

                            <select class="selectpicker m-1" data-live-search="true" name="country_id">
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <select class="selectpicker form-control" name="type" data-live-search="true">

                                <option value="rent">rent</option>
                                <option value="sell">sell</option>


                            </select>
                        </div>


                        <div class="form-group">

                            <textarea name="description" id="" cols="50" class="form-control" rows="5"
                                placeholder="description"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Images</label>
                            <input id="input-id" class="form-control" multiple name="images[]" type="file"
                                class="file" data-preview-file-type="text">
                        </div>


                        <div class="modal-footer md-button">
                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                                Discard</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- end add building --}}

    {!! $buildings->links('vendor.pagination.bootstrap-4') !!}
@endsection
