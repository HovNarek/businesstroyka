<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $fillable = [
        'region_name',
        'region_enabled',
        'region_main',
        'created_at',
        'updated_at'
    ];

    public function cities() {
        return $this->hasMany(City::class);
    }

    public static function getAllRegions() {
        $regions_collection = Region::orderBy('region_name')->pluck('region_name', 'id');
        $regions = $regions_collection->toArray();
        return $regions;
    }
}
