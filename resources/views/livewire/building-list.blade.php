<div class="site-section site-section-sm bg-light">
    <div class="container">


        <div class="row mb-5">
            @foreach ($buildings as $building)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="property-entry h-100">
                        <a href="property-details.html" class="property-thumbnail">
                            <div class="offer-type-wrap">
                                <span
                                    class="offer-type @if ($building->type == 'rent') bg-danger @else bg-success @endif">{{ $building->type }}</span>

                            </div>
                            <img src="{{ asset('assets/images/' . $building->images->first()->name) }}" alt="Image"
                                class="img-fluid">
                        </a>
                        <div class="p-4 property-body">

                            <h2 class="property-title"><a href="property-details.html">{{ $building->name }}</a></h2>
                            <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span>
                                {{ $building->description }}</span>
                            <strong class="property-price text-primary mb-3 d-block text-success">{{ $building->price }}
                                $</strong>
                            <ul class="property-specs-wrap mb-3 mb-lg-0">
                                <li>
                                    <span class="property-specs">Beds</span>
                                    <span class="property-specs-number">{{ $building->beds }}</span>

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
            @endforeach


        </div>

        {!! $buildings->links('vendor.pagination.bootstrap-4') !!}

    </div>

</div>
