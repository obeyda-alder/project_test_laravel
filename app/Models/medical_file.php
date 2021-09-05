<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medical_file extends Model
{

    protected $table = 'medical_file';


    protected $fillable = ['id', 'pdf', 'patient_id'];


    public $timestamps = false;
}
