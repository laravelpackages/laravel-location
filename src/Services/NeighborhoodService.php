<?PHP

namespace LaravelPackages\Location\Services;

use LaravelPackages\Location\Contracts\NeighborhoodContract;
use LaravelPackages\Vendor\Traits\ServiceTrait;

class NeighborhoodService
{
    use ServiceTrait;

    public function __construct(NeighborhoodContract $neighborhood)
    {
        $this->obj = $neighborhood;
    }

}
