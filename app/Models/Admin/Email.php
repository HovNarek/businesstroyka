<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'user_id',
        'created_at',
        'updated_at'
    ];
}
