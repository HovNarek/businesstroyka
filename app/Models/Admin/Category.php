<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'cat_title',
        'cat_keyword',
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

}
