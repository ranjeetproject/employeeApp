<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index(Request $request){

        $employees = Employee::orderBy('id', 'DESC')->paginate(10);
        return view("employee.index",compact('employees'));
    }

    public function create(Request $request){
        return view("employee.create");
    }

    public function store(Request $request){
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:employees',
            'phone' => 'required',
            'gender' => 'required',
        ]);
        $input = $request->all();
        $row = Employee::create($input);
        if($row){
            return redirect()->route("employee.index")->with('success', 'Create Employee Successfully');
        }else{
            return redirect()->back();
        }
    }

    public function edit($id){
        $employee = Employee::find($id);
        return view("employee.edit",compact("employee"));
    }

    public function update(Request $request,$id){
        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'gender' => 'required',
        ]);
        $input = $request->all();
        $row = Employee::find($id);
        if($row){
            $row->update($input);
            return redirect()->route("employee.index")->with('success', 'Update Employee Successfully');;
        }else{
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $checkEmployee = Employee::find($id);
        if($checkEmployee){
            $checkEmployee->delete();
            return redirect()->route("employee.index");
        }else{
            return redirect()->back();
        }
    }

    
   
     
}