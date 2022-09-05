<?php

namespace App\Http\Controllers;

use App\Http\Requests\addBuildingRequest;
use App\Models\Building;
use App\Repositories\BuildingRepositoryInterface;
use App\Repositories\CityRepositoryInterface;
use App\Repositories\CountryRepositoryInterface;
use App\Repositories\Eloquent\BuildingRepository;
use App\Repositories\Eloquent\CityRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

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
        try {

            $atrr = $request->except('image');
            $atrr['user_id'] = Auth::id();
            $this->buildingRepository->create($atrr);
            Alert::success('Congrats', 'Your request is submitted');
        } catch (Exception $e) {
            Alert::error('Error', $e->getMessage());
        }
        return redirect()->route('building.requests');
    }


    public function updateBuildingStatus(Request $request, Building $building)
    {
        try {
            $this->buildingRepository->update(['status' => $request->status], $building);
            Alert::success('Congrats', 'building status updated successfully');
        } catch (Exception $e) {
            Alert::error('Error', $e->getMessage());
        }
        return redirect()->route('building.requests');
    }
}
