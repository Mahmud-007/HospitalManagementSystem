<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bed;

class BedController extends Controller
{
    public function createBed(){
        return view('Beds.createBed');
    }

    public function bedList(){
        $beds= Bed::all();

        return view('Beds.beds',[
            'beds'=>$beds
        ]);
    }

    public function saveBed(){
        $bed= new Bed();

        $bed->name=request('name');
        $bed->status=request('status');

        //error_log(request('name'));

        $bed->save();
        return redirect('/createBed')->with('msg','The bed has added to the list. Check in Bed list');
    }

    public function remove($id){
        $bed= Bed:: findOrFail($id);

        if ($bed->status=='unavailable'){
            return redirect('/beds')->with('msg','This bed can not be removed. There is a patient in this bed');
        }
        else{
            $bed->delete();
            return redirect('/')->with('msg','One bed has just removed');
        }


    }


}
