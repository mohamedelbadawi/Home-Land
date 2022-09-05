@extends('layouts.admin')

@section('content')
    <div class="layout-px-spacing">

        <div class="page-header">
            <div class="page-title">
                <h3>Categories</h3>
            </div>
        </div>

        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">

                <div class="d-flex justify-content-end m-2">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Create
                        Category
                    </button>
                </div>
                <div class="widget-content widget-content-area br-6">
                    <div class="table-responsive mb-4 mt-4">

                        <table id="datatable" class="display table " style="width:100%">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>image</th>
                                    <th>name</th>
                                    <th>user</th>
                                    <th></th>

                                    <th></th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($requests as $request)
                                    <tr>
                                        <td>

                                        </td>
                                        <td>
                                            <img src="/images/" alt="" style="width: 75px;">
                                        </td>
                                        <td>

                                        </td>
                                        <td class="text-center">
                                            <div class="dropdown custom-dropdown">
                                                <a class="dropdown-toggle" href="#" role="button"
                                                    id="dropdownMenuLink6" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="true">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-more-horizontal">
                                                        <circle cx="12" cy="12" r="1"></circle>
                                                        <circle cx="19" cy="12" r="1"></circle>
                                                        <circle cx="5" cy="12" r="1"></circle>
                                                    </svg>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink6">

                                                    <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal"
                                                        data-target="#editModal-">Edit</a>
                                                    <a class="dropdown-item" href="javascript:void(0);"
                                                        data-target="#deleteModal-" data-toggle="modal">Delete</a>
                                                </div>
                                            </div>

                                        </td>

                                    </tr>
                                @endforeach


                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>id</th>
                                    <th>image</th>
                                    <th>name</th>

                                    <th class="text-center">Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>
@endsection
