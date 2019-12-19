<?PHP

namespace LaravelPackages\Location\Services;

use LaravelPackages\Location\Contracts\CityRegionContract;
use LaravelPackages\Vendor\Traits\ServiceTrait;

class CityRegionService
{
    use ServiceTrait;

    public function __construct(CityRegionContract $region)
    {
        $this->obj = $region;
    }

}
