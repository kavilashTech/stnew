<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exclusive extends Model
{
    use HasFactory;

    protected $table = "exclusivity";
    
    public function property(){
        return $this->hasone(Property::class);
    }

}
