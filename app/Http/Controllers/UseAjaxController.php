<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\frind;
use Illuminate\Support\Facades\Validator;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;



class UseAjaxController extends Controller
{
    public function create()
    // view form to add this in Ajax-frin.blade.php
    {
        return view('frinds.Ajax-frin');
    }

    public function getMessages()
    {
        return $messages = [
            'name_ar.required' => __('messages.name requierd'),
            'name_en.required' => __('messages.name requierd'),
            'full.required' => __('messages.full required'),
            // 'full.numeric' => 'name must by ...',
            'date.required' => __('messages.date required'),
            'needed_ar.required' => __('messages.needed required'),
            'needed_en.required' => __('messages.needed required'),
            'photo.required' => __('messages.photo'),
        ];
    }

    public function getRules()
    {
        return $rules = [
            'name_ar' => 'required|max:100|unique:frinds,frind_name_ar',
            'name_en' => 'required|max:100',
            'full' => 'required',
            'date' => 'required',
            'needed_ar' => 'required',
            'needed_en' => 'required',
            'photo' => 'required',
        ];
    }

    public function store(Request $request)
    // save data into DB By ajax =>> meaning automatic
    {
        $rules = $this->getRules();
        $messages = $this->getMessages();

        // validate data before insert database
        $validation = Validator::make($request->all(), $rules, $messages);


        if ($validation->fails()) {
            return response()->json([
                'status' =>  false,
                'msg' => 'Not successfully',
                'errors' => $validation->errors(),
            ]);
        } else {

            $file_name = $this->getImages($request->photo, 'images/frinds');



            //  Insert date
            $frinds = frind::create([
                'frind_name_ar' => $request->name_ar,
                'frind_name_en' => $request->name_en,
                'Full_name' => $request->full,
                'Date' => $request->date,
                'what_need_ar' => $request->needed_ar,
                'what_need_en' => $request->needed_en,
                'photo' =>  $file_name,
            ]);

            if ($frinds) {

                return response()->json([
                    'status' => true,
                    'msg' => 'successfully'
                ]);
            }
        }
    }

    protected function getImages($photo, $folder_path)
    {

        $file_extension = $photo->getClientOriginalExtension();

        $file_name = random_int(700, 1500000000) . '.' . $file_extension;

        $path = $folder_path;

        $photo->move($path, $file_name);

        return $file_name;
    }

    public function all()
    {
        $allData = frind::select(
            'id',
            'frind_name_' . LaravelLocalization::getCurrentLocale() . ' as frind_name',
            'Full_name',
            'Date',
            'what_need_' . LaravelLocalization::getCurrentLocale() . ' as what_need',
            'photo'
        )->Limit(10)->get();

        return view('frinds.ShowWithAjax')->with('all', $allData);
    }

    public function delete(Request $request)
    {
        $AjaxDele = frind::findOrfail($request->id);

        if ($AjaxDele) {

            $AjaxDele->delete();

            return response()->json([
                'status' => true,
                'id' => $request->id,
            ]);
        } else {

            return response()->json([
                'status' => false,

            ]);
        }
    }

    public function Edit($id)
    {
        $idintI = frind::find($id);

        if ($idintI) {
            $data = frind::select('id', 'frind_name_ar', 'frind_name_en', 'Full_name', 'Date', 'what_need_ar', 'what_need_en', 'photo')->find($id);
            return view('frinds.EditWithAjax', compact('data'));
        }
    }


    public function Update(Request $request)
    {
        $rules = $this->getRules();
        $messages = $this->getMessages();
        // validate data before insert database
        $validation = Validator::make($request->all(), $rules, $messages);

        if ($validation->fails()) {
            return response()->json([
                'status' => false,
            ]);
            // return $validation->errors();
        } else {
            $file_name = $this->getImages($request->photo, 'images/frinds');

            // update date
            $frinds = frind::find($request->id);
            $frinds->frind_name_ar      = $request->input('name_ar');
            $frinds->frind_name_en      = $request->input('name_en');
            $frinds->Full_name          = $request->input('full');
            $frinds->Date               = $request->input('date');
            $frinds->what_need_ar       = $request->input('needed_ar');
            $frinds->what_need_en       = $request->input('needed_en');
            $frinds->photo              =  $file_name;


            $frinds->update();
            return response()->json([
                'status' => true,
            ]);
        }
    }
}
