<?PHP

namespace LaravelPackages\Location\Services;

use LaravelPackages\Location\Contracts\StreetContract;
use LaravelPackages\Vendor\Traits\ServiceTrait;

class StreetService
{
    use ServiceTrait;

    public function __construct(StreetContract $street)
    {
        $this->obj = $street;
    }
}
