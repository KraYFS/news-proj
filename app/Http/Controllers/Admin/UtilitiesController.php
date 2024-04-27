<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employees;
use App\Models\Language;
use App\Models\Speciality;
use Illuminate\Http\Request;

class UtilitiesController extends Controller
{
    public function getData(){
        $employees = collect();

        foreach (Employees::where('status', 1 )->get() as $item){
            $employees->add([
                'id' => $item->id,
                'last_name' => $item->last_name,
                'first_name' => $item->first_name,
                'photo' => $item->photo,
                'special' => $item->speciality->name,
            ]);
        }

        return response()->json([
            'status' => 1,
            'result' => [
                'language' => Language::where('active', 1)->get(),
                'speciality' => Speciality::where('is_active', 1 )->get(),
                'employees' => $employees,
            ]
        ]);
    }
}
