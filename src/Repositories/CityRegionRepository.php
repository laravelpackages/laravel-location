<?PHP

namespace LaravelPackages\Location\Repositories;

use LaravelPackages\Location\Contracts\CityRegionContract;
use LaravelPackages\Location\Models\CityRegion;
use LaravelPackages\Vendor\Traits\RepositoryTrait;
use Illuminate\Support\Facades\DB;

class CityRegionRepository implements CityRegionContract
{
    use RepositoryTrait;

    function __construct(CityRegion $city)
    {
        $this->obj = $city;
    }

    public function where(array $data = [], $take = null)
    {
        $this->obj = $this->obj
            ->when(isset($data['city_id']), function ($query) use ($data) {
                return $query->where('city_regions.city_id', $data['city_id']);
            })
            ->when(isset($data['name']), function ($query) use ($data) {
                return $query->where('city_regions.name', 'like', '%' . $data['name'] . '%');
            });

        return $this;
    }

}
