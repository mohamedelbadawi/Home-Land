@extends('layouts.admin')
@section('css')
    <link href="{{ asset('assets/back/css/users/account-setting.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing mt-5">
        <form id="general-info" class="section general-info"
            action="{{ Auth::user()->hasRole('admin') ? route('agent.account.update') : route('admin.account.update') }}"
            method="post">
            @csrf
            <div class="info">
                <h6 class="">General Information</h6>
                <div class="row">
                    <div class="col-lg-11 mx-auto">
                        <div class="row">
                            <div class="col-xl-2 col-lg-12 col-md-4">
                                <div class="upload mt-4 pr-md-4">
                                    <img src="{{ asset('assets/images/avatar.jpg') }}" style="height: 90px; width:90px;"
                                        alt="">
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                <div class="form">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="fullName">Name</label>
                                                <input type="text" class="form-control mb-4" name="name"
                                                    id="fullName" placeholder="Full Name" value="{{ $user->name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="fullName">email</label>
                                                <input type="text" class="form-control mb-4" id="fullName"
                                                    placeholder="email" name="email" value="{{ $user->email }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="text" class="form-control mb-4" id="profession"
                                            placeholder="password" value="" name="password">
                                    </div>


                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
