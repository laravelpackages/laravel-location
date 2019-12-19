<?PHP

namespace LaravelPackages\Location\Services;

use LaravelPackages\Location\Contracts\StateContract;
use LaravelPackages\Vendor\Traits\RepositoryTrait;

class StateRegionMicroService
{
    use RepositoryTrait;

    public function __construct(StateContract $state)
    {
        $this->obj = $state;
    }

}
