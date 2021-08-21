<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ObeydaDire extends Controller
{
    public function makes()
    {
        return view('obeyda');
    }

    public function obeyda($id)

    {
        $int = intval($id);

        if ($int  === 1) {

            return   $int;
        } else {
            return  ++$int;
        }
    }
}
