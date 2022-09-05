@extends('layouts.admin')

@section('content')
    {{-- <div id="content" class="main-content"> --}}
    <div class="layout-px-spacing">

        <div class="page-header">
            <div class="page-title">
                <h3>Pending Requests</h3>

            </div>
        </div>

        <div class="row layout-top-spacing" id="cancel-row">

            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="table-responsive mb-4 mt-4">
                        <table id="html5-extension" class="table table-hover non-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>agent</th>
                                    <th>price</th>
                                    <th>sq</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($requests as $request)
                                    <tr>
                                        <td>{{ $request->name }}</td>
                                        <td>{{ $request->name }}</td>
                                        <td>{{ $request->agent->name }}</td>
                                        <td>{{ $request->price }}</td>
                                        <td>{{ $request->sq }}</td>
                                        <td><button class="btn btn-primary" data-toggle="modal"
                                                data-target="#slideupModal-{{ $request->id }}">View</button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>







    @foreach ($requests as $request)
        <div id="slideupModal-{{ $request->id }}" class="modal animated slideInUp custo-slideInUp" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $request->name }}</h5>
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
                        <h6>

                            {{ $request->name }} , beds: {{ $request->beds }} , baths: {{ $request->baths }} , price:
                            {{ $request->price }}
                            <br>

                        </h6>
                        <p class="modal-text">
                            {{ $request->description }}
                        </p>
                    </div>

                    <form action="{{route('building.updateStatus',$request->id)}}" method="post">
                        @csrf
                        <div class="form-group  ml-2" style="width: 90%">
                            <select class="selectpicker form-control" name="status" data-live-search="true">

                                <option class="text-warning" value="pending" {{ $request->status == 'pending' }}>Pending
                                </option>
                                <option class="text-danger" value="canceled" {{ $request->status == 'canceled' }}>Canceled
                                </option>
                                <option class="text-success" value="approved" {{ $request->status == 'approved' }}>Approved
                                </option>


                            </select>
                        </div>

                        <div class="modal-footer md-button">
                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach










    {{-- </div> --}}
@endsection

@section('js')
    {{-- <script src="{{ asset('assets/back/datatable/datatables.js') }}"></script> --}}
    <script src="{{ asset('assets/back/datatable/button-ext/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/back/datatable/button-ext/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/back/datatable/button-ext/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/back/datatable/button-ext/buttons.print.min.js') }}"></script>
    <script>
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
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7
        });
    </script>
@endsection
