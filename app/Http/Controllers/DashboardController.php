<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        //
        $categories = Category::all()->count();
        $users = User::all()->count();
        //$proveedores = Proveedor::all()->count();
        $productos = Producto::all()->count();
        return view('dashboard.Dashboard', compact('categories','users','productos'));
    }

}
