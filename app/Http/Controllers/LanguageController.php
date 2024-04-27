<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class LanguageController extends Controller
{

    public function set($language)
    {
        Language::where('active', 1)->where('value', $language)->firstOrFail();

        Cookie::queue('language', $language, 5000);

        return redirect()->back();
    }
}
