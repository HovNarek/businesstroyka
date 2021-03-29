<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'spec_title',
        'spec_keyword',
        'spec_enabled',
        'spec_mtitle',
        'spec_mkeywords',
        'spec_mdescription',
        'created_at',
        'updated_at'
    ];

    public function categories() {
        return $this->belongsToMany(Category::class, 'category_specialization', 'spec_id', 'cat_id');
    }

    public static function getAllSpecs() {
        $specs = Specialization::with('categories')->get();
        return $specs;
    }
    public static function getSpecsByCategoryId($cat_id) {
        $cat = Category::find($cat_id);
        if ($cat === null) return null;

        $specs = Specialization::with('categories')->get();
        $data = [];
//        dd($specs);

        foreach ($specs as $key => $spec) {
            foreach ($spec->categories as $category) {
                if ($category->id == $cat_id) {
                    $data[$key] = $spec;
                    break;
                }
            }
        }
//                dd($data);
        return $data;
    }

}