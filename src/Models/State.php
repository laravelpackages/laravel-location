<?php

namespace LaravelPackages\Location\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{
    use SoftDeletes;

    protected $table = 'location_states';

    protected $fillable = [
        'country_id',
        'country_region_id',
        'code',
        'name'
    ];

    public function scopeCode($query, $code)
    {
        if (is_numeric($code)) {
            $qry = $query->where('id', $code);
        } elseif (is_string($code)) {
            $qry = $query->where('code', $code);
        }
        return $qry;
    }

    public function scopeByCountry($query, $country)
    {
        return $query->where('country_id', $country);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function mesoRegions()
    {
        return $this->hasMany(StateMesoRegion::class);
    }

    public function addresses()
    {
        return $this->hasManyThrough(Location::class, City::class);
    }

    public function countryRegion()
    {
        return $this->belongsTo(CountryRegion::class);
    }

}
