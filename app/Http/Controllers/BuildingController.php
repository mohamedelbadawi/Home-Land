<?php

namespace App\Http\Controllers;

use App\Repositories\Eloquent\BuildingRepository;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    private $buildingRepository;
    public function __construct(BuildingRepository $buildingRepository)
    {
        $this->buildingRepository = $buildingRepository;
    }

    public function homePage()
    {
        $buildings = $this->buildingRepository->all();
    }
}
