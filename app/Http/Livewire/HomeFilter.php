<?php

namespace App\Http\Livewire;

use App\Models\Building;
use App\Repositories\BuildingRepositoryInterface;
use App\Repositories\CityRepositoryInterface;
use App\Repositories\CountryRepositoryInterface;
use Livewire\Component;
use Livewire\WithPagination;

class HomeFilter extends Component
{
    private $buildingRepository;
    protected $numberPerPage = 12;
    use WithPagination;

    public $city_id = "48", $country_id = "1", $type = "rent";

    public $buildings = [];

    protected $listeners = ['refresh' => 'render'];

    public function mount(BuildingRepositoryInterface $buildingRepository)
    {
        $this->buildingRepository = $buildingRepository;
        $this->buildings = Building::with(['agent', 'images'])->take($this->numberPerPage);
        dd($this->buildings);
    }

    public function search(BuildingRepositoryInterface $buildingRepository)
    {
        dd($this->buildings);
        $this->buildings = Building::where('type', $this->type)->take(12);
    }
    public function render(CityRepositoryInterface $cityRepository, CountryRepositoryInterface $countryRepository)
    {

        $cities = $cityRepository->all();
        $countries = $countryRepository->all();


        return view('livewire.home-filter', ['buildings' => $this->buildings, 'cities' => $cities, 'countries' => $countries]);
    }
}
