<?php

namespace App\Http\Controllers;

use App\Repositories\BuildingRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $buildingRepository;

    public function __construct(BuildingRepositoryInterface $buildingRepository)
    {
        $this->buildingRepository = $buildingRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $buildings = $this->buildingRepository->paginate(12);
        return view('front.home', compact('buildings'));
    }
}
