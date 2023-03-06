<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'company';
    protected $fillable = [
        'company_name',
        'address1',
        'address2',
        'state',
        'city',
        'pincode',
        'email1',
        'email2',
        'mobile1',
        'mobile2',
        'pan',
        'gst',
    ];
}
