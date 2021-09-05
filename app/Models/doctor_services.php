<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctor_services extends Model
{

    protected $table = 'doctor_services';


    protected $fillable = ['id', 'doctor_id', 'service_id'];
}
