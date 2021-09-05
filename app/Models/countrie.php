<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class countrie extends Model
{

    protected $table = 'countries';

    protected $fillable = ['name'];

    public $timestamps = false;

    public function doctor()
    {
        return $this->hasManyThrough('App\Models\doctor', 'App\Models\hospital', 'countrie_id', 'hospital_id');
    }
}
