@extends('layouts.app')

@section('content')
    <div class="site-blocks-cover inner-page-cover overlay"
        style="background-image: url({{ asset('assets/images/' . $building->images->first()->name) }});" data-aos="fade"
        data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10">
                    <span class="d-inline-block text-white px-3 mb-3 property-offer-type rounded">Property Details of</span>
                    <h1 class="mb-2">{{ $building->name }}</h1>
                    <p class="mb-5"><strong class="h2 text-success font-weight-bold">${{ $building->price }}</strong></p>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section site-section-sm">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div>
                        <div class="slide-one-item home-slider owl-carousel">
                            @foreach ($building->images->random(3) as $image)
                                <div><img src="{{ asset('assets/images/' . $image->name) }}" alt="Image"
                                        class="img-fluid"></div>
                            @endforeach

                        </div>
                    </div>
                    <div class="bg-white property-body border-bottom border-left border-right">
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <strong class="text-success h1 mb-3"> ${{ $building->price }}</strong>
                            </div>
                            <div class="col-md-6">
                                <ul class="property-specs-wrap mb-3 mb-lg-0  float-lg-right">
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
                        <div class="row mb-5 ">

                            <div class="col-md-6 col-lg-6 text-center border-bottom border-top py-3">
                                <span class="d-inline-block text-black mb-0 caption-text">Year Built</span>
                                <strong class="d-block">{{ $building->year_built }}</strong>
                            </div>
                            <div class="col-md-6 col-lg-6 text-center border-bottom border-top py-3">
                                <span class="d-inline-block text-black mb-0 caption-text">Price/Sqft</span>
                                <strong class="d-block">${{$building->price_sq}}</strong>
                            </div>
                        </div>
                        <h2 class="h4 text-black">More Info</h2>
                        <p>{{ $building->description }}</p>

                        <div class="row no-gutters mt-5">
                            <div class="col-12">
                                <h2 class="h4 text-black mb-3">Gallery</h2>
                            </div>
                            @foreach ($building->images as $image)
                                <div class="col-sm-6 col-md-4 col-lg-3">
                                    <a href="{{ asset('assets/images/' . $image->name) }}"
                                        class="image-popup gal-item"><img
                                            src="{{ asset('assets/images/' . $image->name) }}" alt="Image"
                                            class="img-fluid"></a>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">

                    <div class="bg-white widget border rounded">

                        <h3 class="h4 text-black widget-title mb-3">Contact Agent</h3>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <h4>{{ $building->agent->name }}</h4>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <h4>
                                {{ $building->agent->email }}
                            </h4>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <h4>
                                {{ $building->agent->phone }}
                            </h4>
                        </div>

                    </div>

                    <div class="bg-white widget border rounded">
                        <h3 class="h4 text-black widget-title mb-3">Paragraph</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit qui explicabo, libero nam, saepe
                            eligendi. Molestias maiores illum error rerum. Exercitationem ullam saepe, minus, reiciendis
                            ducimus quis. Illo, quisquam, veritatis.</p>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
