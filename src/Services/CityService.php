<?PHP

namespace LaravelPackages\Location\Services;

use LaravelPackages\Location\Contracts\CityContract;
use LaravelPackages\Vendor\Traits\ServiceTrait;

class CityService
{
    use ServiceTrait;

    public function __construct(CityContract $city)
    {
        $this->obj = $city;
    }

}
