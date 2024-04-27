<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Employees\CreatedRequest;
use App\Http\Requests\Admin\Employees\ItemsRequest;
use App\Models\Employees;
use App\Models\Language;
use App\Models\Translations\EmployeesTranslation;
use App\Services\Files\FileService;
use Illuminate\Support\Str;

class EmployeesController extends Controller
{
    public function get(){

        $items = collect();

        $employees = Employees::orderBy('id', 'desc')->paginate(20);

        foreach ($employees as $item){
            $items->add([
                'id' => $item->id,
                'last_name' => $item->last_name,
                'first_name' => $item->first_name,
                'surname' => $item->surname,
                'active' => $item->status,
                'speciality' => $item->speciality?->name
            ]);
        }

        return response()->json([
            'status' => 1,
            'items' => $items,
            'pagination' => [
                'total' => $employees->total()
            ]
        ]);
    }

    public function created(
        CreatedRequest $request,
        FileService $service
    ){

        $file = $request->hasFile('photo')
            ? $service->setParams($request, 'photo', 'employees')->storeFile()
            : null;

        $createdId = Employees::create([
            'photo_id' => $file->id ?? null,
            'status' => $request->get('status'),
            'speciality_id' => $request->get('speciality'),
        ]);

        foreach (Language::where('active', 1)->get() as $item){
            EmployeesTranslation::create([
                'last_name' => $request->get('last_name')[$item->value],
                'first_name' => $request->get('first_name')[$item->value],
                'surname' => $request->get('surname')[$item->value],
                'description' => $request->get('description')[$item->value],
                'employees_id' => $createdId->id,
                'language_id' => $item->id,
            ]);
        }
        return [
            'status' => 1
        ];
    }


    public function setStatus(
        ItemsRequest $request
    ){
        Employees::where('id', $request->get('id'))->update([
            'status' => $request->get('status')
        ]);

        return [
            'status' => 1,
        ];
    }
}
