<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class frind extends Model
{

    // protected $table = 'frinds';
    protected $fillable = ['frind_name', 'Full_name', 'Date', 'what_need'];
}
