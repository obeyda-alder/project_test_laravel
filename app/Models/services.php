<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class services extends Model
{

    protected $table = 'services';


    protected $fillable = ['id', 'name', 'created_id', 'updated_id'];

    protected $hidden = ['created_id', 'updated_id'];

    public function Doctors()
    {
        return $this->belongsToMany('App\Models\doctor', 'doctor_services', 'service_id', 'doctor_id');
    }
}
