<?php

namespace App\Http\Controllers;

use App\Repositories\BuildingRepositoryInterface;
use App\Repositories\CityRepositoryInterface;
use App\Repositories\CountryRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $buildingRepository, $cityRepository, $countryRepository;

    public function __construct(BuildingRepositoryInterface $buildingRepository, CityRepositoryInterface $cityRepository, CountryRepositoryInterface $countryRepository)
    {
        $this->buildingRepository = $buildingRepository;
        $this->cityRepository = $cityRepository;
        $this->countryRepository = $countryRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $buildings = $this->buildingRepository->paginate(12);

        $cities = $this->cityRepository->all();
        $countries = $this->countryRepository->all();


        return view('front.home', compact('buildings', 'cities', 'countries'));
    }

    public function search(Request $request)
    {
        // dd($request);
        $cities = $this->cityRepository->all();
        $countries = $this->countryRepository->all();
        $buildings = $this->buildingRepository->where('type', $request->get('type'))->where('city_id', $request->get('city_id'))->where('country_id', $request->get('country_id'))->paginate(12);
        return view('front.search', compact('buildings','cities','countries'));
    }
}
