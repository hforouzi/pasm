<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ContractorController extends Controller
{
    public function index()
    {
        return view('contractor.add_contractor');
    }
}
