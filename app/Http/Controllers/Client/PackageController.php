<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;

class PackagesController extends Controller
{
    public function index(){
        $packages = Package::all();
        return view('Client.packages', compact('packages'));
    }
}
