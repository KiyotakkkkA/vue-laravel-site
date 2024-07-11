<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuDataController extends Controller
{
    public function index(){
        $data = Menu::all();

        return response()->json($data);
    }
}
