<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Amenitielists extends Model
{
    use HasFactory;
    protected $table         = 'amenities_list';
    protected $fillable = ['name','amenity_id','value','icon'];

    public $timestamps = false;


}
