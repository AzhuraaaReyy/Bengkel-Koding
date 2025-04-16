<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class DokterController extends Controller
{
    public function index()
    {
        $dokters = User::where('role', 'dokter')->get();
        return view('layouts.list_dokter', compact('dokters'));
    }
}
