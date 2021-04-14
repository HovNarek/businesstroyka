<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone',
        'user_id',
        'created_at',
        'updated_at'
    ];
}
