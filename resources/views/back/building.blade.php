@extends('layouts.admin')

@section('content')
    {{-- <div id="content" class="main-content"> --}}
    <div class="layout-px-spacing">

        <div class="page-header">
            <div class="page-title">
                <h3>Approved buildings</h3>
            </div>
        </div>

        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="table-responsive mb-4 mt-4">
                        <div class="row mb-3 d-flex justify-content-end mr-5">
                            <button class="btn btn-success" data-toggle="modal" data-target="#create">Add building</button>
                        </div>
                        <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>agent</th>
                                    <th>price</th>
                                    <th>sq</th>
                                    <th>Actions</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($buildings as $building)
                                    <tr>
                                        <td>{{ $building->name }}</td>
                                        <td> <img src="{{ asset('assets/images/' . $building->images->first()->name) }}"
                                                alt="" style="width: 50px;height:50px;"></td>
                                        <td>{{ $building->agent->name }}</td>
                                        <td>{{ $building->price }}</td>
                                        <td>{{ $building->sq }}</td>
                                        <td><button class="btn btn-primary" data-toggle="modal"
                                                data-target="#slideupModal-{{ $building->id }}">View</button></td>
                                    </tr>
                                    @include('back.partials.viewBuildingModal')
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>





    <div id="create" class="modal animated slideInUp custo-slideInUp" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Building</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-x">
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
                            <input type="number" class="form-control" placeholder="beds" name="beds">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="baths" name="baths">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="sq price" name="price_sq"
                                value="{{ $building->price_sq }}">
                        </div>
                        <div class="form-group">
                            <input min="1900" max="2099" step="1" id="datepicker" class="form-control"
                                placeholder="built year" name="year_built" value="{{ $building->year_built }}">
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







    </div>
@endsection

@section('js')
    <script src="{{ asset('assets/back/datatable/button-ext/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/back/datatable/button-ext/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/back/datatable/button-ext/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/back/datatable/button-ext/buttons.print.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#html5-extension').DataTable({


                dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
                buttons: {
                    buttons: [{
                            extend: 'copy',
                            className: 'btn'
                        },
                        {
                            extend: 'csv',
                            className: 'btn'
                        },
                        {
                            extend: 'excel',
                            className: 'btn'
                        },
                        {
                            extend: 'print',
                            className: 'btn'
                        }
                    ]
                },
                "oLanguage": {
                    "oPaginate": {
                        "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                        "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                    },
                    "sInfo": "Showing page _PAGE_ of _PAGES_",
                    "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                    "sSearchPlaceholder": "Search...",
                    "sLengthMenu": "Results :  _MENU_",
                },
                "lengthMenu": [7, 10, 20, 50],
                "pageLength": 10,

            });
        });
    </script>
@endsection
