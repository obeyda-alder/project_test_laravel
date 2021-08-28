<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{

    // protected $table = 'frinds';


    protected $fillable = ['id', 'name', 'views'];
    public $timestamps = false;
}
