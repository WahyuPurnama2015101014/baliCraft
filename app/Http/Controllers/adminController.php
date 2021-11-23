<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modelBarang;
use App\Models\modelPengrajin;

class adminController extends Controller
{
    public function index()
    {
        $title = "Selamat Datang di Halaman Admin";
        $jB = modelBarang::all()->count();
        $jP = modelPengrajin::all()->count();
        return view('admin.admin-home', compact('title', 'jB', 'jP',));
    }
}
