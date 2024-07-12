<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuDataController extends Controller
{
    public function index(){
        $data = Menu::all();

        return response()->json($data);
    }
}

