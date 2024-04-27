<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Codes\CategoryRequest;
use App\Libs\Str;
use App\Models\Devices\DeviceCodesCategory;
use App\Models\Devices\DevicesCode;
use App\Models\User;
use App\Services\FileService;

class CanvasController extends Controller
{
    public function canvas(string $route = '/'){

        return view('admin', [
            'route' => $route
        ]);
    }

}
