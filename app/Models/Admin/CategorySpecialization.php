<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorySpecialization extends Model
{
    use HasFactory;

    protected $table = 'category_specialization';

    protected $fillable = [
        'cat_id',
        'spec_id',
        'created_at',
        'updated_at'
    ];
}
