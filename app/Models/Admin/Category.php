<?php

namespace App\Models\Admin;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'id',
        'cat_title',
        'cat_slug',
        'cat_enabled',
        'cat_mtitle',
        'cat_mkeywords',
        'cat_mdescription',
        'cat_pay',
        'cat_price',
        'created_at',
        'updated_at'
    ];

    public function specializations() {
        return $this->belongsToMany(Specialization::class, 'category_specialization', 'cat_id', 'spec_id');
    }

    public function sluggable(): array
    {
        return [
            'cat_slug' => [
                'source' => 'cat_title'
            ]
        ];
    }
}
