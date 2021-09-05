<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class hospital extends Model
{

    protected $table = 'hospitals';


    protected $fillable = ['id', 'name', 'address', 'countrie_id', 'created_id', 'updated_id'];

    protected $hidden = ['created_id', 'updated_id'];

    public function doctors()
    {
        return $this->hasMany('App\Models\doctor', 'hospital_id');
    }
}
