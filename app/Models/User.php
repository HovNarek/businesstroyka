<?php

namespace App\Models;

use App\Models\Admin\City;
use App\Models\Admin\Role;
use App\Models\Admin\Specialization;
use App\Models\Admin\Status;
use App\Models\Admin\Ip;
use App\Models\Admin\Phone;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'provider_id',
        'avatar',
        'user_type',
        'email',
        'login',
        'password',
        'gender',
        'name',
        'city_id',
        'email_verified_at',
        'balance',
        'balance_spent',
        'rating',
        'blocked',
        'block_reason',
        'surname',
        'midname',
        'street',
        'birthday',
        'specialization_id',
        'status_id',
        'status_desc',
        'icq',
        'skype',
        'site',
        'show_info',
        'about',
        'new_messages',
        'new_orders_offers',
        'last_activity',
        'is_logout',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles() {
        return $this->belongsToMany(Role::class);
    }

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function specialization() {
        return $this->belongsTo(Specialization::class);
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function phones() {
        return $this->hasMany(Phone::class);
    }

    public function ips() {
        return $this->hasMany(Ip::class);
    }

    public function isOnline() {
        return Cache::has('user-is-online-' . $this->id);
    }

    public static function getAllUsers() {
        $users = User::paginate(20);
        return $users;
    }

    public static function resizeAvatar($avatar)
    {
        $folder = date('Y-m-d');
        $w_small = 200;
        $h_small = 200;
        $ratio_small = $w_small / $h_small;

        list($w_orig, $h_orig) = getimagesize($avatar);
        $ratio = $w_orig / $h_orig;
        $ext = $avatar->extension();
        $image_name_without_extansion = time();
        $small_file_without_extansion = "avatar/{$folder}/{$image_name_without_extansion}";
        $small_file = $small_file_without_extansion .'.webp';
        Storage::makeDirectory("uploads/avatar/{$folder}");

        if ($ratio_small > $ratio) {
            $w_small = $h_small * $ratio;
        } else {
            $h_small = $w_small / $ratio;
        }

        $img = "";
        switch ($ext) {
            case ("png"):
                $img = imagecreatefrompng($avatar);
                break;
            default:
                $img = imagecreatefromjpeg($avatar);
        }
        $newImgSmall = imagecreatetruecolor($w_small, $h_small);
        if ($ext == "png") {
            imagesavealpha($newImgSmall, true);
            $transPngSmall = imagecolorallocatealpha($newImgSmall, 0, 0, 0, 127);
            imagefill($newImgSmall, 0, 0, $transPngSmall);
        }
        $newImgSmall = imagescale($img, $w_small, $h_small);
        imagewebp($newImgSmall, public_path('uploads/' . $small_file));

        imagedestroy($newImgSmall);
//dd($small_file);
        return $small_file;
    }
}
