<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\User;


class DashboardController extends Controller
{
    //
    public function index()
    {
        //
        
        return view('dashboard.Dashboard');
    }

}
