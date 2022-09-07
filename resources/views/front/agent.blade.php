@extends('layouts.admin')
@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            @foreach ($buildings as $building)
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                    <div class="widget widget-card-one">
                        <div class="widget-content">

                            <div class="media">
                                <div class="w-img">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                        class="bi bi-people-fill text-success" viewBox="0 0 16 16">
                                        <path
                                            d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                        <path fill-rule="evenodd"
                                            d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                                        <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
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
                                    <button class="btn btn-primary" data-toggle="modal"
                                        data-target="#edit-{{ $building->id }}"> Edit</button>
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
    @endforeach


    {!! $buildings->links('vendor.pagination.bootstrap-4') !!}
@endsection
@section('js')
    <script>
        $(function() {
            $("#datepicker").datepicker({
                dateFormat: 'yy'
            });
        });​
    </script>
@endsection
