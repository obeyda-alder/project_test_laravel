<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class admin extends Authenticatable
{

    protected $table = 'admin';


    protected $fillable = ['name', 'email', 'password'];

    public $timestamps = false;
    protected $guard = 'admin';
}
