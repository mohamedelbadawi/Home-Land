<?php

namespace App\Http\Controllers;

use App\Http\Requests\addBuildingRequest;
use App\Repositories\BuildingRepositoryInterface;
use App\Repositories\CityRepositoryInterface;
use App\Repositories\CountryRepositoryInterface;
use App\Repositories\Eloquent\BuildingRepository;
use App\Repositories\Eloquent\CityRepository;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    private $buildingRepository, $cityRepository, $countryRepository;
    public function __construct(BuildingRepositoryInterface $buildingRepository, CityRepositoryInterface $cityRepository, CountryRepositoryInterface $countryRepository)
    {
        $this->buildingRepository = $buildingRepository;
        $this->cityRepository = $cityRepository;
        $this->countryRepository = $countryRepository;
    }

    public function getRequests()
    {
        $requests = $this->buildingRepository->pendingBuildings();
        return view('back.request', compact('requests'));
    }
    public function getApprovedBuildings()
    {
        $buildings = $this->buildingRepository->approvedBuildings();
        $cities = $this->cityRepository->all();
        $countries = $this->countryRepository->all();
        return view('back.building', compact('buildings', 'cities', 'countries'));
    }


    public function addBuilding(addBuildingRequest $request)
    {
        dd($request);
    }
}
