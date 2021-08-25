<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\frind;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class InsertDB extends Controller
{

    // public $name = 'Obeydddda';
    // public $sara = 'sarak';
    // public $quote = 'A river Cuts Through rock...';


    public function Insert(Request $request)
    {

        $rules = $this->getRules();
        $messages = $this->getMessages();
        // validate data before insert database
        $validation = Validator::make($request->all(), $rules, $messages);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput($request->all());
            // return $validation->errors();
        } else {


            // Insert date
            frind::create([
                'frind_name' => $request->name,
                'Full_name' => $request->full,
                'Date' => $request->date,
                'what_need' => $request->needed
            ]);

            return redirect()->back()->with(['success' => __('messages.success')]);
        }
    }


    public function getMessages()
    {
        return $messages = [
            'name.required' => __('messages.name requierd'),
            'full.required' => __('messages.full required'),
            // 'full.numeric' => 'name must by ...',
            'date.required' => __('messages.date required'),
            'needed.required' => __('messages.needed required')
        ];
    }

    public function getRules()
    {
        return $rules = [
            'name' => 'required|max:100|unique:frinds,frind_name',
            'full' => 'required',
            'date' => 'required',
            'needed' => 'required'
        ];
    }


    public function Show()
    {
        return view('frinds.frind');
    }
}
