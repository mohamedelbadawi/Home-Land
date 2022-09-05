<?php

namespace App\Http\Controllers;

use App\Repositories\BuildingRepositoryInterface;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;

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
}
