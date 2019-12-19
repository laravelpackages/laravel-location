<?PHP

namespace LaravelPackages\Location\Repositories;

use LaravelPackages\Location\Contracts\CountryContract;
use LaravelPackages\Location\Models\Country;
use LaravelPackages\Vendor\Traits\RepositoryTrait;

class CountryRepository implements CountryContract
{
    use RepositoryTrait;

    function __construct(Country $country)
    {
        $this->obj = $country;
    }

    public function syncs($obj, array $data)
    {
        if(isset($data['regions'])) {
            $obj->regions()->delete();
            $obj->regions()->createMany($data['regions']);
        }
    }

}
