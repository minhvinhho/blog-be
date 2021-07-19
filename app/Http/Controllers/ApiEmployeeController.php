<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\ApiEmployeeRequest;

class ApiEmployeeController extends Controller
{
    public function getEmployee() {
        return response()->json(Employee::all(), 200);
    }


    public function getEmployeeById($id) {
        $employee = Employee::find($id);
        if(is_null($employee)) {
            return response()->json(['message' => 'Employee Not Found'], 404);
        }
        return response()->json($employee::find($id), 200);
    }

    public function addEmployee(ApiEmployeeRequest $request) {
        $employee = Employee::create($request->all());
        return response($employee, 201);
    }

    public function updateEmployee(ApiEmployeeRequest $request, $id) {
        $employee = Employee::find($id);
        if(is_null($employee)) {
            return response()->json(['message' => 'Employee Not Found'], 404);
        }
        $employee->update($request->all());
        return response($employee, 200);
    }

    public function deleteEmployee(Request $request, $id) {
        $employee = Employee::find($id);
        if(is_null($employee)) {
            return response()->json(['message' => 'Employee Not Found'], 404);
        }
        $employee->delete();
        return response()->json(null, 204);
    }
}
