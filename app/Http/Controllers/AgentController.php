<?php

namespace App\Http\Controllers;

use App\Repositories\BuildingRepositoryInterface;
use App\Repositories\CityRepositoryInterface;
use App\Repositories\CountryRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgentController extends Controller
{

    private $buildingRepository, $cityRepository, $countryRepository;
    public function __construct(BuildingRepositoryInterface $buildingRepository, CityRepositoryInterface $cityRepository, CountryRepositoryInterface $countryRepository)
    {
        $this->buildingRepository = $buildingRepository;
        $this->countryRepository = $countryRepository;
        $this->cityRepository = $cityRepository;
    }
    public function index()
    {
        $auth = Auth::user();
        $buildings = $this->buildingRepository->agentBuildings($auth);
        $cities = $this->cityRepository->all();
        $countries = $this->countryRepository->all();
        return view('front.agent', compact('buildings','cities','countries'));
    }

    
}
