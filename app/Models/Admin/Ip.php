<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ip extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ip',
        'created_at',
        'updated_at'
    ];

    public static function getIpsByUserId($id) {
        $ips = Ip::where('user_id', $id)->orderBy('updated_at')->get();
        return $ips;
    }
}
