<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSpecialization extends Model
{
    use HasFactory;

    protected $table = 'user_spacialization';

    public function otherSpecializations() {
        return $this->hasMany(Specialization::class);
    }
}
