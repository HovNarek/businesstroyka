<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'role_name',
        'banners_create',
        'banners_edit',
        'banners_view',
        'invoices_view',
        'invoices_management',
        'applications_view',
        'applications_management',
        'applications_deleting',
        'users_profile',
        'users_view',
        'users_management',
        'roles_show',
        'roles_management',
        'feedbacks_management',
        'general_settings',
        'counters',
        'moderation_new_cities',
        'regions_view',
        'sitemap_view',
        'sitemap_management',
        'pages_view',
        'pages_management',
        'created_at',
        'updated_at'
    ];
}
