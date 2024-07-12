<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Http\Controllers\Controller;

class CheckAuthController extends Controller
{
    public function index(Request $request){
        $data = Admin::all();

        if ($data[0]->login==$request->login && Hash::check($request->pass, $data[0]->hash)) {
            return [
                'status' => true,
                'message' => "Successfully logged in"
            ];
        }

        return [
            'status' => false,
            'message' => "Invalid credentials"
        ];
    }
}
