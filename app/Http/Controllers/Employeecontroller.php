<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;

class Employeecontroller extends Controller
{
    function employee_add(Request $request){
        $insert = [
            'employee_name' => $request->employee_name,
            'employee_email'=> $request->employee_email,
            'employee_phone' => $request->employee_phone,
            'employee_address' => $request->employee_address
        ];

        $add = Employee::create($insert);
        if($add){
            $response = [
                'status'=>'ok',
                'success'=>true,
                'message'=>'Record created succesfully!'
            ];
            return $response;
        }else{
            $response = [
                'status'=>'ok',
                'success'=>false,
                'message'=>'Record created failed!'
            ];
            return $response;
        }
    }

    function employee_view(Request $request){
        return Employee::find($request->id);
    }

    function employee_delete(Request $request){
        $delete =  Employee::destroy($request->id);
        if($delete){
            $response = [
                'status'=>'ok',
                'success'=>true,
                'message'=>'Record deleted succesfully!'
            ];
            return $response;
        }else{
            $response = [
                'status'=>'ok',
                'success'=>false,
                'message'=>'Record deleted failed!'
            ];
            return $response;
        }
    }

    function employee_edit(Request $request){
        $update = [
            'employee_name' => $request->employee_name,
            'employee_email'=> $request->employee_email,
            'employee_phone' => $request->employee_phone,
            'employee_address' => $request->employee_address,
        ];
        $edit = Employee::where('id', $request->id)->update($update);
        if($edit){
            $response = [
                'status'=>'ok',
                'success'=>true,
                'message'=>'Record updated succesfully!'
            ];
            return $response;
        }else{
            $response = [
                'status'=>'ok',
                'success'=>false,
                'message'=>'Record updated failed!'
            ];
            return $response;
        }
    }

    function employee_list(){
        return Employee::all();
    }
}
