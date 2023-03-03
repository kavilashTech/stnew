<?php
namespace App\Models;

use App\BaseModel;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{


    protected $table = 'room_vacancy';
    protected $fillable = [
        'room_id',
        'total_bed_count',
        'start_date',
        'vacant_bed_count',
        'booked',
        'create_user',
        'update_user'

    ];



}
