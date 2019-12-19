<?php

namespace LaravelPackages\Location\Traits;

trait LocationTrait
{

    public function addresses()
    {
        return $this->morphMany('App\Address', 'addressable');
    }

}
