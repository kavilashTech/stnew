<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;




class Category extends Model
{


    protected $table = 'property_category';
    protected $fillable = [
        'categoryname',
        'sortorder',
        'status',

    ];

    public function property() {
        return $this->hasMany('Models\Property','category_id');
    }
}
