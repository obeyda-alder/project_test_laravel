<?php

namespace App\Http\Controllers;

use App\Events\EventVideo;
use App\Http\Controllers\Controller;
use App\Models\frind;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Models\event;

use function GuzzleHttp\Promise\all;

class InsertDB extends Controller
{

    // public $name = 'Obeydddda';
    // public $sara = 'sarak';
    // public $quote = 'A river Cuts Through rock...';

    public function ShowData()
    {
        $allData = frind::select(
            'id',
            'frind_name_' . LaravelLocalization::getCurrentLocale() . ' as frind_name',
            'Full_name',
            'Date',
            'what_need_' . LaravelLocalization::getCurrentLocale() . ' as what_need',
            'photo'
        )->get();
        return view('frinds.showData')->with('all', $allData);
    }


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



            $file_name = $this->getImages($request->photo, 'images/frinds');

            // Insert date
            frind::create([
                'frind_name_ar' => $request->name_ar,
                'frind_name_en' => $request->name_en,
                'Full_name' => $request->full,
                'Date' => $request->date,
                'what_need_ar' => $request->needed_ar,
                'what_need_en' => $request->needed_en,
                'photo' =>  $file_name,
            ]);

            return redirect()->back()->with(['success' => __('messages.success')]);
        }
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
            'name_en' => 'required|max:100|unique:frinds,frind_name_en',
            'full' => 'required',
            'date' => 'required',
            'needed_ar' => 'required',
            'needed_en' => 'required',
            'photo' => 'required',
        ];
    }


    public function Show()
    {
        return view('frinds.frind');
    }


    public function EditData($id)
    {
        $ider = frind::findOrfail($id);

        if (!$ider) {
            return redirect()->back();
        } else {

            return view('frinds.edit', compact('ider', 'id'));
        }
    }

    public function deleteData($id)
    {
        $ider = frind::findOrfail($id);

        if (!$ider) {
            return redirect()->back();
        } else {
            $ider->delete();
            return redirect()->back();
        }
    }

    public function UpdateData(Request $request, $id)
    {

        $rules = $this->getRules();
        $messages = $this->getMessages();
        // validate data before insert database
        $validation = Validator::make($request->all(), $rules, $messages);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput($request->all());
            // return $validation->errors();
        }

        // update date
        $student = frind::find($id);
        $student->frind_name_ar      = $request->input('name_ar');
        $student->frind_name_en      = $request->input('name_en');
        $student->Full_name          = $request->input('full');
        $student->Date               = $request->input('date');
        $student->what_need_ar       = $request->input('needed_ar');
        $student->what_need_en       = $request->input('needed_en');
        $student->update();
        return redirect()->back()->with(['success' => __('messages.success')]);;
    }

    protected function getImages($photo, $folder_path)
    {

        $file_extension = $photo->getClientOriginalExtension();

        $file_name = random_int(700, 1500000000) . '.' . $file_extension;

        $path = $folder_path;

        $photo->move($path, $file_name);

        return $file_name;
    }



    public function ShowVideo()
    {
        $event = event::first();
        event(new EventVideo($event));
        return view('frinds.ShowVideo')->with('event', $event);
    }


    //     public function Reset()
    //     {
    //         $event = event::first();
    //         $event->views = 1;
    //         $event->update();
    //     }
}
