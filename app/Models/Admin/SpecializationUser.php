<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecializationUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'specialization_id',
        'created_at',
        'updated_at'
    ];

    protected $table = 'specialization_use';
}
