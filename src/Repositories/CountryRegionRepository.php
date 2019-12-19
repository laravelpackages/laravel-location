<?PHP

namespace LaravelPackages\Location\Repositories;

use LaravelPackages\Location\Contracts\CountryRegionContract;
use LaravelPackages\Location\Models\CountryRegion;
use LaravelPackages\Vendor\Traits\RepositoryTrait;

class CountryRegionRepository implements CountryRegionContract
{
    use RepositoryTrait;

    function __construct(CountryRegion $region)
    {
        $this->obj = $region;
    }

}
