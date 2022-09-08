<?php

namespace App\Http\Controllers;

use App\Http\Requests\addBuildingRequest;
use App\Http\Requests\updateBuildingRequest;
use App\Models\Building;
use App\Models\Image;
use App\Repositories\BuildingRepositoryInterface;
use App\Repositories\CityRepositoryInterface;
use App\Repositories\CountryRepositoryInterface;
use App\Repositories\Eloquent\BuildingRepository;
use App\Repositories\Eloquent\CityRepository;
use App\traits\ImageHelper;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use DataTables;
use PharIo\Version\BuildMetaData;

class BuildingController extends Controller
{
    use ImageHelper;
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

    public function buildings()
    {
        $cities = $this->cityRepository->all();
        $countries = $this->countryRepository->all();
        $buildings = $this->buildingRepository->approvedBuildings();

        return view('back.building', compact('cities', 'countries', 'buildings'));
    }
    public function getApprovedBuildings(Request $request)
    {

        $buildings = $this->buildingRepository->approvedBuildings();
        return Datatables::of($buildings)->addIndexColumn()->make(true);
    }


    public function addBuilding(addBuildingRequest $request)
    {
        try {

            $atrr = $request->except('images');
            $atrr['user_id'] = Auth::id();
            $building = $this->buildingRepository->create($atrr);
            if ($request->has('images')) {
                foreach ($request->images as $image) {
                    $currImage = $this->uploadImage($image, 'assets/images/', 2000, $building->name);

                    Image::create(['name' => $currImage, 'imageable_id' => $building->id, 'imageable_type' => Building::class]);
                }
            }
            Alert::success('Congrats', 'Your request is submitted');
        } catch (Exception $e) {
            Alert::error('Error', $e->getMessage());
        }
        return redirect()->route('building.requests');
    }



    public function updateBuilding(updateBuildingRequest $request, $id)
    {

        try {
            $building = Building::findOrFail($id);

            $attr = $request->except('images');
            $attr['user_id'] = Auth::id();
            if ($request->has('images')) {
                foreach ($building->images as $image) {
                    $this->deleteImage($image->name);
                    $image->delete();
                }
                foreach ($request->images as $image) {
                    $currImage = $this->uploadImage($image, 'assets/images/', 2000, $building->name);

                    Image::create(['name' => $currImage, 'imageable_id' => $building->id, 'imageable_type' => Building::class]);
                }
            }

            $this->buildingRepository->update($attr, $building);
            Alert::success('Congrats', 'building updated successfully');
        } catch (\Throwable $th) {
            Alert::error('Error', $e->getMessage());
        }
        if (auth()->user()->hasRole('admin')) {

            return redirect()->route('building.approved');
        } else {
            return redirect()->route('agent.home');
        }
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
