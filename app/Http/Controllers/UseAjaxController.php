<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\frind;

class UseAjaxController extends Controller
{
    public function create()
    // view form to add this in Ajax-frin.blade.php
    {
        return view('frinds.Ajax-frin');
    }

    public function store(Request $request)
    // save data into DB By ajax =>> meaning automatic
    {
        // $file_name = $this->getImages($request->photo, 'images/frinds');

        // Insert date
        frind::create([
            'frind_name_ar' => $request->name_ar,
            'frind_name_en' => $request->name_en,
            'Full_name' => $request->full,
            'Date' => $request->date,
            'what_need_ar' => $request->needed_ar,
            'what_need_en' => $request->needed_en,
            // 'photo' =>  $file_name,
        ]);
    }

    protected function getImages($photo, $folder_path)
    {

        $file_extension = $photo->getClientOriginalExtension();

        $file_name = random_int(700, 1500000000) . '.' . $file_extension;

        $path = $folder_path;

        $photo->move($path, $file_name);

        return $file_name;
    }
}
