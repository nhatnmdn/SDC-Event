<?php

namespace App\Http\Controllers;

use Session;

class LanguageController extends Controller
{
    public function index($language)
    {
        if ($language) {
            Session::put('language', $language);
        }

        return redirect()->back();
    }
}
