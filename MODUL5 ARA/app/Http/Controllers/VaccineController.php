<?php

namespace App\Http\Controllers;

use App\Models\vaccine;
use Illuminate\Http\Request;

class VaccineController extends Controller
{
    public function index()
    {
        $vaccines = vaccine::get();
        return view('vaccine', compact('vaccines'));
    }

}
