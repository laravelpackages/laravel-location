<?PHP

namespace LaravelPackages\Location\Repositories;

use LaravelPackages\Location\Models\Neighborhood;
use LaravelPackages\Location\Contracts\NeighborhoodContract;
use LaravelPackages\Vendor\Traits\RepositoryTrait;

class NeighborhoodRepository implements NeighborhoodContract
{
    use RepositoryTrait;

    function __construct(Neighborhood $neighborhood)
    {
        $this->obj = $neighborhood;
    }

    public function where(array $data = [], $take = null)
    {
        $this->obj = $this->obj
            ->when(isset($data['name']), function ($query) use ($data) {
                return $query->where('location_neighborhoods.name', 'like', '%' . $data['name'] . '%');
            });

        return $this;
    }

}
