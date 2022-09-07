@extends('layouts.app')

@section('content')
@include('front.header')
@include('front.search-form')
    <div class="site-section site-section-sm bg-light">
        <div class="container">
            @foreach ($buildings as $building)
                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="property-entry horizontal d-lg-flex">

                            <a href="#" class="property-thumbnail h-100">
                                <div class="offer-type-wrap">
                                    @if ($building->type == 'sell')
                                        <span class="offer-type bg-danger">Sale</span>
                                    @else
                                        <span class="offer-type bg-success">Rent</span>
                                    @endif
                                </div>
                                <img src="{{asset('assets/images/'.$building->images->first()->name)}}" alt="Image" class="img-fluid">
                            </a>

                            <div class="p-4 property-body">
                                <h2 class="property-title"><a href="#">{{ $building->name }}</a></h2>
                                <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span>
                                    {{ $building->address }}</span>
                                <strong
                                    class="property-price text-primary mb-3 d-block text-success">${{ $building->price }}</strong>
                                <p>{{ $building->description }}</p>
                                <ul class="property-specs-wrap mb-3 mb-lg-0">
                                    <li>
                                        <span class="property-specs">Beds</span>
                                        <span class="property-specs-number">{{ $building->beds }} <sup>+</sup></span>

                                    </li>
                                    <li>
                                        <span class="property-specs">Baths</span>
                                        <span class="property-specs-number">{{ $building->baths }}</span>

                                    </li>
                                    <li>
                                        <span class="property-specs">SQ FT</span>
                                        <span class="property-specs-number">{{ $building->sq }}</span>

                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {!! $buildings->links('vendor.pagination.bootstrap-4') !!}
    </div>
@endsection
