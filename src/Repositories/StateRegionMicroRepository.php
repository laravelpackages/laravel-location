<?PHP

namespace LaravelPackages\Location\Repositories;

use LaravelPackages\Location\Contracts\StateContract;
use LaravelPackages\Location\Models\State;
use LaravelPackages\Vendor\Traits\RepositoryTrait;
use Illuminate\Support\Facades\DB;

class StateRegionMicroRepository implements StateContract
{
    use RepositoryTrait;

    function __construct(State $state)
    {
        $this->obj = $state;
    }

    public function where(array $data = [], $take = null)
    {
        $this->obj = $this->obj
            ->when(isset($data['country']), function ($query) use ($data) {
                return $query
                    ->addSelect(DB::raw('states.*'))
                    ->leftJoin('countries AS whereCountries', 'states.country_id', '=', 'whereCountries.id')
                    ->where('whereCountries.name', $data['country']);
            })
            ->when(isset($data['country_id']), function ($query) use ($data) {
                return $query->where('country_id', $data['country_id']);
            });

        return $this;
    }

}
