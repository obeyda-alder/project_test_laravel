<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class doctor extends Model
{

    protected $table = 'doctors';


    protected $fillable = ['id', 'name', 'title', 'hospital_id', 'medical_id', 'created_id', 'updated_id'];

    protected $hidden = ['created_id', 'updated_id'];

    public function hospital()
    {
        return $this->belongsTo('App\Models\hospital', 'hospital_id');
    }

    public function Services()
    {
        return $this->belongsToMany('App\Models\services', 'doctor_services', 'doctor_id', 'service_id');
    }
}
