<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'type',
        'visibility',
        'reception_number',
        'application_number',
        'national_code',
        'id_number',
        'car_name',
        'owner_fullname',
    ];
}
