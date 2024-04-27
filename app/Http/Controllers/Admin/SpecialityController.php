<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Speciality\CreatedRequest;
use App\Http\Requests\Admin\Speciality\ItemsRequest;
use App\Models\Language;
use App\Models\Speciality;
use App\Models\Translations\SpecialityTranslation;
use Illuminate\Support\Str;

class SpecialityController extends Controller
{
    public function get(){

        $items = collect();

        $category = Speciality::orderBy('id', 'desc')->paginate(20);

        foreach ($category as $item){
            $items->add([
                'id' => $item->id,
                'name' => $item->name,
                'slug' => $item->slug,
                'active' => $item->is_active,
            ]);
        }

        return response()->json([
            'status' => 1,
            'items' => $items,
            'pagination' => [
                'total' => $category->total()
            ]
        ]);
    }

    public function created(
        CreatedRequest $request,
    ){
        $createdId = Speciality::create([
            'slug' => Str::slug($request->get('name')['uk']),
            'is_active' => $request->get('status'),
        ]);

        foreach (Language::where('active', 1)->get() as $item){
            SpecialityTranslation::create([
                'name' => $request->get('name')[$item->value],
                'speciality_id' => $createdId->id,
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
        Speciality::where('id', $request->get('id'))->update([
            'is_active' => $request->get('status')
        ]);

        return [
            'status' => 1,
        ];
    }
}
