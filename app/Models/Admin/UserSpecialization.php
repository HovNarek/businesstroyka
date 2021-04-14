<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSpecialization extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'specialization_id',
        'created_at',
        'updated_at'
    ];

    protected $table = 'user_spacialization';

    public function otherSpecializations() {
        return $this->hasMany(Specialization::class);
    }
}
