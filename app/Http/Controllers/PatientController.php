<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Bed;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    public function creatingPatient(){
        $availableBed= DB::table('beds')->where('status', '=', 'available')->get();

        return view('Patients.createPatient',[
            'availablebed'=>$availableBed,

        ]);

    }

    public function patientList(){
        $patients=Patient::get();
        $name=array();
        foreach ($patients as $patient){
            $bed_id=$patient->bed_id;
            $bed_name=DB::table('beds')->where('id','=',$bed_id)->get();
            $name[]=$bed_name[0]->name;
        }
        return view('Patients.patients',[
            'patients'=>$patients,
            'bedName'=>$name,
        ]);
    }

    public function savePatient(){
        $mobile=request('mobile_no');
        if (strlen($mobile)!=11 || $mobile[0]!=0 || $mobile[1]!=1 || $mobile[2]==1 || $mobile[2]==2 || $mobile[2]==5 ){
            return redirect('/admit')->with('msg','Invalid Mobile Number');
        }
        else{
            $patientInfo= new Patient();
            $patientInfo->name=request('name');
            $patientInfo->age=request('age');
            $patientInfo->mobile_no=$mobile;
            $bed_name=request('bed');
            $bed=DB::table('beds')->where('name','=',$bed_name)->get();
            $patientInfo->bed_id=$bed[0]->id;

            $patientInfo->save();

            $id=$bed[0]->id;
            $item= Bed:: findOrFail($id);
            $item->status='unavailable';
            $item->save();

            return redirect('/admit')->with('msg','The patient has admitted. Check in patient list');

        }

    }

    public function remove($id){
        $patient= Patient:: findOrFail($id);
        $bed_id=$patient->bed_id;
        $item=Bed::findorFail($bed_id);
        $item->status='available';
        $item->save();
        $patient->delete();



        return redirect('/');
    }
}
