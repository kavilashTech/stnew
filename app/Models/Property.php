<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Amenities;
use App\Models\Exclusive;
use App\Models\PropertyRating;


class Property extends Model
{
    protected $table = 'properties';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'content',
        'status',
        'faqs',
        'policy',
        'mobile_number',
        'alternative_number',
        'reason'
    ];

    public  $timestamps = false;
    public function amenities(){
        return $this->belongsToMany(Amenities::class,'property_amenities','property_id','amenity_id');
    }
    
    public function exclusivity(){
        return $this->belongsTo(Exclusive::class);
    }

    public function rating(){
        return $this->hasMany(PropertyRating::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
