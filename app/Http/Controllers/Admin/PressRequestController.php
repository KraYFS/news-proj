<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Settings\SaveRequest;
use App\Http\Requests\Admin\StatusRequestPressRequest;
use App\Models\ConfigSystem;
use App\Models\Language;
use App\Models\PressRequest;
use App\Services\ConfigService;
use Illuminate\Http\Request;

class PressRequestController extends Controller
{
    public function get(){

        $items = collect();

        $pressRequest = PressRequest::orderBy('id', 'desc')->paginate(20);

        foreach ($pressRequest as $item){
            $items->add([
                'id' => $item->id,
                'last_name' => $item->last_name,
                'first_name' => $item->first_name,
                'surname' => $item->surname,
                'email' => $item->email,
                'phone' => $item->phone,
                'photo' => $item->photo,
                'status' => $item->status,
                'region' => $item->region,
                'city' => $item->city,
                'speciality' => $item->special?->name
            ]);
        }

        return response()->json([
            'status' => 1,
            'items' => $items,
            'pagination' => [
                'total' => $pressRequest->total()
            ]
        ]);
    }

    public function setStatus(
        StatusRequestPressRequest $request
    ){
        PressRequest::where('id', $request->get('id'))->update([
            'status' => $request->get('status')
        ]);

        return [
            'status' => 1,
        ];
    }
}
