<div class="site-section site-section-sm pb-0">
    <div class="container">
        <div class="">


            <div class="row">
                <form class="form-search col-md-12" style="margin-top: -100px;" method="get"
                    action="{{ route('search') }}">
                    <div class="row  align-items-end">

                        @csrf
                        <div class="col-md-3">
                            <label for="offer-types">Offer Type</label>
                            <div class="select-wrap">
                                <span class="icon icon-arrow_drop_down"></span>
                                <select id="offer-types" name="type" class="form-control d-block rounded-0">
                                    <option value="sell">Sale</option>
                                    <option value="rent">Rent</option>
                                </select>
                            </div>
                        </div>


                        <div class="col-md-3">
                            <label for="select-city">Select City</label>
                            <div class="select-wrap">
                                <span class="icon icon-arrow_drop_down"></span>
                                <select name="city_id" id="select-city" class="form-control d-block rounded-0">
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>


                        <div class="col-md-3">
                            <label for="list-types">Listing Types</label>
                            <div class="select-wrap">
                                <span class="icon icon-arrow_drop_down"></span>
                                <select name="country_id" id="list-types" class="form-control d-block rounded-0">
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-success text-white btn-block rounded-0">
                                search
                            </button>
                        </div>



                    </div>
                </form>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="view-options bg-white py-3 px-3 d-md-flex align-items-center">
                    <div class="mr-auto">
                        <a href="index.html" class="icon-view view-module active"><span
                                class="icon-view_module"></span></a>
                        <a href="view-list.html" class="icon-view view-list"><span class="icon-view_list"></span></a>

                    </div>
                    <div class="ml-auto d-flex align-items-center">
                        <div>
                            <a href="#" class="view-list px-3 border-right active">All</a>
                            <a href="#" class="view-list px-3 border-right">Rent</a>
                            <a href="#" class="view-list px-3">Sale</a>
                        </div>


                        <div class="select-wrap">
                            <span class="icon icon-arrow_drop_down"></span>
                            <select class="form-control form-control-sm d-block rounded-0">
                                <option value="">Sort by</option>
                                <option value="">Price Ascending</option>
                                <option value="">Price Descending</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
