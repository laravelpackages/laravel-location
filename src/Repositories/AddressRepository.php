<?PHP

namespace LaravelPackages\Location\Repositories;

use LaravelPackages\Location\Contracts\AddressContract;
use LaravelPackages\Location\Models\Address;
use LaravelPackages\Vendor\Traits\RepositoryTrait;
use Illuminate\Support\Facades\Log;

class AddressRepository implements AddressContract
{
    use RepositoryTrait;

    function __construct(Address $address)
    {
        $this->obj = $address;
    }

    public function orderBy($obj, $order, $by = 'ASC')
    {
        if ($order == 'street') {
            $this->obj = $obj->leftJoin('location_streets', 'addresses.street_id', '=', 'location_streets.id')
                ->orderBy('name', $by);
        }
        return $this;
    }



}
