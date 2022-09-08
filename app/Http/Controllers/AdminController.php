<?php

namespace App\Http\Controllers;

use App\Http\Requests\updateProfileSettingsRequest;
use App\Repositories\BuildingRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    private $buildingRepository, $userRepository;

    public function __construct(BuildingRepositoryInterface $buildingRepository, UserRepositoryInterface $userRepository)
    {
        $this->buildingRepository = $buildingRepository;
        $this->userRepository = $userRepository;
    }
    public function index()
    {
        $approvedBuildings = $this->buildingRepository->approvedCount();
        $canceledBuildings = $this->buildingRepository->canceledCount();
        $pendingBuildings = $this->buildingRepository->pendingCount();
        $adminCount = $this->userRepository->adminCount();
        $agentCount = $this->userRepository->agentCount();

        return view('back.home', compact('approvedBuildings', 'canceledBuildings', 'pendingBuildings', 'agentCount', 'adminCount'));
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
