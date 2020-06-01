<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManagerPersonnelController extends Controller
{
    public function index(){
        return view('admin.personnel.index');
    }

    public function create(){

        return view('admin.personnel.create');
    }

    public function edit(){

        return view('admin.personnel.edit');
    }
}
