<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patients extends Model
{

    protected $table = 'patients';


    protected $fillable = ['id', 'name', 'age'];


    public $timestamps = false;

    public function doctors()
    {
        return $this->hasOneThrough('App\Models\doctor', 'App\Models\medical_file', 'patient_id', 'medical_id');
    }
}
