<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminIp extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'ip',
    ];
}
