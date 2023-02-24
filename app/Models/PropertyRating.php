<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyRating extends Model
{
    use HasFactory;
    protected $table = 'property_review';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 	
        'id',
        'property_id',
        'user_id',
        'rating',
        'reviewcomments',
        'status',
    ];

    public function property(){
        return $this->belongsTo(Property::class);
    }
}
