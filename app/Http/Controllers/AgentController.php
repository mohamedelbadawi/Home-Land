<?php

namespace App\Http\Controllers;

use App\Http\Requests\updateBuildingRequest;
use App\Http\Requests\updateProfileSettingsRequest;
use App\Repositories\BuildingRepositoryInterface;
use App\Repositories\CityRepositoryInterface;
use App\Repositories\CountryRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AgentController extends Controller
{

    private $buildingRepository, $cityRepository, $countryRepository, $userRepository;
    public function __construct(UserRepositoryInterface $userRepository, BuildingRepositoryInterface $buildingRepository, CityRepositoryInterface $cityRepository, CountryRepositoryInterface $countryRepository)
    {
        $this->buildingRepository = $buildingRepository;
        $this->countryRepository = $countryRepository;
        $this->cityRepository = $cityRepository;
        $this->userRepository = $userRepository;
    }
    public function index()
    {
        $auth = Auth::user();
        $buildings = $this->buildingRepository->agentBuildings($auth);
        $cities = $this->cityRepository->all();
        $countries = $this->countryRepository->all();
        return view('front.agent', compact('buildings', 'cities', 'countries'));
    }

    public function accountSettings()
    {
        $user = Auth::user();
        return view('back.account-settings', compact('user'));
    }


    public function updateAccount(updateProfileSettingsRequest $request)
    {
        try {
            $user = Auth::user();
            if ($request['password']) {

                $this->userRepository->update($request->toArray(), $user);
            } else {
                $this->userRepository->update($request->except('password'), $user);
            }
            Alert::success('Congrats', 'profile updated successfully');
        } catch (Exception $e) {
            Alert::error('Error', $e->getMessage());
        }
        return redirect()->route('agent.home');
    }
}
