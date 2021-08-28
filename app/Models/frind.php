<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class frind extends Model
{

    protected $table = 'frinds';


    protected $fillable = ['frind_name_ar', 'frind_name_en', 'Full_name', 'Date', 'what_need_ar', 'what_need_en', 'photo'];
}
