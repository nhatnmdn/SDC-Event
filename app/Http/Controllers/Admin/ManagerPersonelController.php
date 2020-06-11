<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ManagerPersonelController extends Controller
{
    public function index()
    {
        return view('admin.personel.index');
    }

    public function create()
    {
        return view('admin.personel.create');
    }

    public function edit()
    {
        return view('admin.personel.edit');
    }
}
