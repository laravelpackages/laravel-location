<?PHP

namespace LaravelPackages\Location\Services;

use LaravelPackages\Location\Contracts\CountryRegionContract;
use LaravelPackages\Vendor\Traits\ServiceTrait;

class CountryRegionService
{
    use ServiceTrait;

    public function __construct(CountryRegionContract $region)
    {
        $this->obj = $region;
    }

}
