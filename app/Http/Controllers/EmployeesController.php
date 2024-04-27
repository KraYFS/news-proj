<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function main(){

        $employees = Employees::query()->with([
            'speciality',
            'creator'
        ])->where('status', 1)->get();

        return view('employees.main', [
            'employees' => $employees
        ]);
    }

    public function info(
        int $id
    ){
        $employees = Employees::query()->with([
            'speciality',
            'creator'
        ])->where('status', 1)->where('id', $id)->firstOrFail();

        return view('employees.info', [
            'employees' => $employees
        ]);
    }
}
