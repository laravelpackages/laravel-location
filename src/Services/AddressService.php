<?PHP

namespace LaravelPackages\Location\Services;

use LaravelPackages\Location\Contracts\AddressContract;
use LaravelPackages\Location\Contracts\StreetContract;
use LaravelPackages\Location\Contracts\CityContract;
use LaravelPackages\Location\Contracts\CountryContract;
use LaravelPackages\Location\Contracts\NeighborhoodContract;
use LaravelPackages\Location\Contracts\StateContract;
use LaravelPackages\Vendor\Traits\ServiceTrait;

class AddressService
{
    use ServiceTrait;

    protected $country;
    protected $state;
    protected $city;
    protected $street;
    protected $data;

    public function __construct(
        CountryContract $country,
        StateContract $state,
        CityContract $city,
        NeighborhoodContract $neighborhood,
        StreetContract $street,
        AddressContract $address
    )
    {
        $this->obj = $address;
        $this->country = $country;
        $this->state = $state;
        $this->city = $city;
        $this->neighborhood = $neighborhood;
        $this->street = $street;
        $this->data = [];
    }

    public function prepareData(array $data)
    {
        /*
        if (!isset($data['country_id']) && isset($data['country'])) {
            $country = $this->country->findBy('name', $data['country']);
            $data['country_id'] = isset($country) ? $country->id : config('erp.address.default.country');
        }

        if (!isset($data['state_id']) && isset($data['state_code'])) {
            $state = $this->state->findBy('code', $data['state_code']);
            $data['state_id'] = isset($state) ? $state->id : config('erp.address.default.state');
        }

        if (!isset($data['state_id']) && isset($data['state'])) {
            $state = $this->state->findBy('name', $data['state']);
            $data['state_id'] = isset($state) ? $state->id : config('erp.address.default.state');
        }

        if (!isset($data['city_id']) && isset($data['city'])) {
            $city = $this->city->findBy('name', $data['city']);
            if (!$city && isset($data['city'])) {
                $city = resolve('CityService')->create([
                    'state_id' => $data['state_id'],
                    'name' => $data['city']
                ]);
            }
            $data['city_id'] = isset($city) ? $city->id : config('erp.address.default.city');
        }

        if (!isset($data['neighborhood_id']) && isset($data['neighborhood'])) {
            $neighborhood = $this->neighborhood->findBy('name', $data['neighborhood']);
            if (!$neighborhood && isset($data['neighborhood'])) {
                $neighborhood = resolve('NeighborhoodService')->create([
                    'name' => $data['neighborhood']
                ]);
            }
            $data['neighborhood_id'] = isset($neighborhood) ? $neighborhood->id : config('erp.address.default.neighborhood');
        }

        if (!isset($data['street_id']) && isset($data['street'])) {
            $street = $this->street->findBy('name', $data['street']);
            if (!$street && isset($data['street'])) {
                $street = resolve('AddressStreetService')->create([
                    'name' => $data['street']
                ]);
            }
            $data['street_id'] = isset($street) ? $street->id : config('erp.address.default.street');
        }

        $data['country_id'] = isset($data['country_id']) ? $data['country_id'] : config('erp.address.default.country');
        $data['state_id'] = isset($data['state_id']) ? $data['state_id'] : config('erp.address.default.state');
        $data['city_id'] = isset($data['city_id']) ? $data['city_id'] : config('erp.address.default.city');
        $data['street_id'] = isset($data['street_id']) ? $data['street_id'] : config('erp.address.default.street');

        $data['number'] = isset($data['number']) ? $data['number'] : NULL;
        $data['complement'] = collect(explode(',', isset($data['complement']) ? $data['complement'] : NULL));
        $data['postal_code'] = isset($data['postal_code']) ? $data['postal_code'] : NULL;
        */
        return $data;

    }
}
