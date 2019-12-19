<?PHP

namespace LaravelPackages\Location\Repositories;

use LaravelPackages\Location\Models\Street;
use LaravelPackages\Location\Contracts\StreetContract;
use LaravelPackages\Vendor\Traits\RepositoryTrait;

class StreetRepository implements StreetContract
{
    use RepositoryTrait;

    function __construct(Street $street)
    {
        $this->obj = $street;
    }

    public function where(array $data = [])
    {
        $this->obj = $this->obj
            ->when(isset($data['name']), function ($query) use ($data) {
                return $query->where('location_streets.name', 'like', '%' . $data['name'] . '%');
            });
        return $this;
    }
}
