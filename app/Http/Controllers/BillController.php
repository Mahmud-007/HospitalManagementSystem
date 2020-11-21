<?php

namespace App\Http\Controllers;


use App\Patient;
use Illuminate\Http\Request;
use App\Bill;
use Illuminate\Support\Facades\DB;

class BillController extends Controller
{
    public function bill($id){
        $bills=DB::table('bills')->where('patient_id','=',$id)->get();
        $patint_name=Patient::findOrFail($id);
        return view('Bills.bill',[
            'bills'=>$bills,
            'patient'=>$patint_name->name,
            'id'=>$id

        ]);
    }

    public function createBill($id){
        $bill= new Bill();
        $bill->bill_name=request('bill_name');
        $bill->charge=request('charge');
        $bill->bill_state=request('bill_state');
        $bill->patient_id=$id;
        $bill->save();
        return redirect()->back()->with('msg','The bed has added to the list. Check in Bed list');
    }

    public function payment($id){
        $patient=Patient::findorfail($id);
        $due_bill=DB::table('bills')->where('patient_id','=',$id)->where('bill_state','=','Due')->get();
        $due=0;
        foreach ($due_bill as $i){
            $due+=$i->charge;
        }
        return view('Bills.payment',[
            'patient'=>$patient,
            'due'=>$due,
            'id'=>$id,
            'due_bill'=>$due_bill
        ]);
    }

    public function payDues($id){
        $bill=Bill::findOrFail($id);
        $bill->bill_state='Paid';
        $bill->save();
        return redirect()->back()->with('msg','{{$bill->charge}}Tk. just paid for {{$bill->name}}');
    }
}
