<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'region_id',
        'city_name',
        'city_enabled',
        'city_main',
        'created_at',
        'updated_at'
    ];

    public function region() {
        return $this->belongsTo(Region::class);
    }

    public static function getCitiesByRegionID($region_id) {
        $cities = City::whereHas('region', function ($query) use ($region_id) {
            $query->where('regions.id', $region_id);
        })->get();
        return $cities;
    }
}
