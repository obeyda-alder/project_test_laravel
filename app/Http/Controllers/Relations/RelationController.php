<?php

namespace App\Http\Controllers\Relations;

use App\Http\Controllers\Controller;
use App\Models\countrie;
use App\Models\doctor;
use Illuminate\Http\Request;
use App\Models\frind;
use App\Models\hospital;
use App\Models\services;
use App\Models\patients;

class RelationController extends Controller
{

    ############ one to one relationship
    public function GetAge()
    {
        $Age = frind::with(['GetAge' => function ($query) {
            $query->select('age', 'user_id');
        }])->find(117);
        return response()->json($Age);
    }

    ############## one to many relationship

    public function gethospital()
    {
        $retr =  hospital::with('doctors')->find(1);

        $doctorNames = $retr->doctors;
        foreach ($doctorNames as $doc) {
            echo  $doc->name . '<br/>';
        }

        // return $answr;
        echo doctor::where('id', 2)->select('title')->get();
    }

    public function HospitalsPage()
    {
        $Hospitals = hospital::select('id', 'name', 'address')->get();
        return view('RelationShip.Hospital', compact('Hospitals'));
    }

    public function DoctorsPage($id)
    {
        $Doctors_in_Hospital = hospital::find($id);
        // $getHDoctors = hospital::where('hospital_id', $id)->get();
        $Doctors =  $Doctors_in_Hospital->doctors;
        // return $Doctors;
        return view('RelationShip.Doctor', compact('Doctors'));
    }
    public function DeleteHospital($id)
    {
        $dele = hospital::find($id);
        if (!$dele) {
            return redirect()->back();
        } else {

            $deleteDoctors = $dele->doctors()->delete();
            $deleteHospital = $dele->delete();

            return redirect()->back();
        }
    }

    public function DoctorServer()
    {
        $doctor = doctor::with('Services')->find(1);

        return $doctor;
    }

    public function ServerDoctor()
    {
        $serves = services::with(['Doctors' => function ($q) {
            $q->select('service_id', 'name');
        }])->find(1);

        return $serves;
    }

    public function Servives($id)
    {
        $servic = doctor::find($id);

        $serves = $servic->Services;

        $services = services::select('id', 'name')->get();

        return view('RelationShip.Services', compact('serves', 'services', 'id'));
    }



    public function AddServives(Request $request)
    {
        $doctor = doctor::find($request->id);

        if (!$doctor) {

            return abort(404);
        } else {

            // $doctor->Services()->attach($request->select_box);
            $doctor->Services()->syncWithoutDetaching($request->select_box);
            return redirect()->back()->with(['message' => 'Successfully']);
        }
    }

    public function HasRelationThrough()
    {
        $doctor = patients::find(2);

        return $doctor->doctors;
    }

    public function HasRelationManyThrough()
    {
        $doctor = countrie::find(2);

        return $doctor->doctor;
    }
}
