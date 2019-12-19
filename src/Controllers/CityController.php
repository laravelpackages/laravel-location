<?php

namespace LaravelPackages\Location\Controllers;

use LaravelPackages\Location\DataTables\CityDataTable;
use LaravelPackages\Location\Requests\StoreCityRequest;
use LaravelPackages\Location\Requests\UpdateCityRequest;
use LaravelPackages\Location\Resources\CityResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CityController extends Controller
{

    public $data;

    public function __construct()
    {
        $this->data = [];
    }

    public function json(Request $request)
    {
        $where['name'] = isset($request->term) ? $request->term : NULL;
        $where['state_id'] = isset($request->state_id) ? $request->state_id : NULL;
        return CityResource::collection(resolve('CityService')->where($where)->get());
    }

    public function trashed()
    {
        $this->data['cities'] = resolve('CityService')->trashed();
        return view('location::cities.index', $this->data);
    }

    public function index(CityDataTable $cityDataTable)
    {
        $this->data['cities'] = resolve('CityService')->all();
        return $cityDataTable->render('location::cities.index', $this->data);
    }

    public function create()
    {
        return view('location::cities.create', $this->data);
    }

    public function store(StoreCityRequest $request)
    {
        $input = $request->all();
        $city = resolve('CityService')->create($input);
        return redirect()
            ->route('admin.locations.cities.edit', $city->id)
            ->with('status', __('location::cities.created.successfully'));
    }

    public function show($id)
    {
        abort('404');
    }

    public function edit($id)
    {
        $data['city'] = resolve('CityService')->find($id);
        return view('location::cities.edit', $data);
    }

    public function update(UpdateCityRequest $request, $id)
    {
        $city = resolve('CityService')->update($request->all(), $id);
        return redirect()
            ->route('admin.locations.cities.edit', $city->id)
            ->with('status', __('location::cities.update.successfully'));
    }

    public function destroy($id)
    {
        $city = resolve('CityService')->destroy($id);
        return redirect()
            ->route('admin.locations.cities.index')
            ->with('status', __('location::cities.destroy.successfully'));
    }

}
