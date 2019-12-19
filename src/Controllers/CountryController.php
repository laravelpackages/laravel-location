<?php

namespace LaravelPackages\Location\Controllers;

use LaravelPackages\Location\DataTables\CountryDataTable;
use LaravelPackages\Location\Requests\StoreCountryRequest;
use LaravelPackages\Location\Requests\UpdateCountryRequest;
use LaravelPackages\Location\Resources\CountryResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{

    public $data;

    public function __construct()
    {
        $this->data = [];
    }

    public function json(){
        return CountryResource::collection(resolve('CountryService')->all());
    }

    public function trashed()
    {
        $this->data['countries'] = resolve('CountryService')->trashed();
        return view('location::countries.index', $this->data);
    }

    public function index(CountryDataTable $countryDataTable)
    {
        $this->data['countries'] = resolve('CountryService')->all();
        return $countryDataTable->render('location::countries.index', $this->data);
    }

    public function create()
    {
        return view('location::countries.create');
    }

    public function store(StoreCountryRequest $request)
    {
        $input = $request->all();
        $country = resolve('CountryService')->create($input);
        return redirect()
            ->route('admin.locations.countries.edit', $country->id)
            ->with('status', __('location::countries.created.successfully'));
    }

    public function show($id)
    {
        //$data['country'] = resolve('CountryService')->find($id);
        abort('404');
    }

    public function edit($id)
    {
        $data['country'] = resolve('CountryService')->find($id);
        return view('location::countries.edit', $data);
    }

    public function update(UpdateCountryRequest $request, $id)
    {
        $input = $request->all();
        $country = resolve('CountryService')->update($input, $id);
        return redirect()
            ->route('admin.locations.countries.edit', $country->id)
            ->with('status', __('location::countries.update.successfully'));
    }

    public function destroy($id)
    {
        $country = resolve('CountryService')->destroy($id);
        return redirect()
            ->route('admin.locations.countries.index')
            ->with('status', __('location::countries.destroy.successfully'));
    }

}
