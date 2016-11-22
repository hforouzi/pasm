<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Routing\Route;
use Illuminate\Routing\Router;
use Illuminate\Console\Command;
use Illuminate\Routing\Controller;
use Symfony\Component\Console\Input\InputOption;

class PublicController extends Controller
{
    function __construct()
    {
       // $this->middleware('auth');

    }

    public function index()
    {
        return view('home');
    }
}
