<?PHP

namespace LaravelPackages\Location\Services;

use LaravelPackages\Location\Contracts\StateContract;
use LaravelPackages\Vendor\Traits\RepositoryTrait;

class StateRegionMesoService
{
    use RepositoryTrait;

    public function __construct(StateContract $state)
    {
        $this->obj = $state;
    }

}
