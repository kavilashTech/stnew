<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Property;

class Amenities extends Model
{
    use HasFactory;
    protected $table    = 'amenities';



    public function property(){
        return $this->belongsToMany(Property::class,'property_amenities','property_id','amenity_id');
    }
}
