<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Penumpang;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(Request $request) : JsonResponse
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'nama_penumpang'        => ['required', 'string', 'max:255'],
            'username'              => ['required', 'string', 'max:255', 'unique:penumpang'],
            'password'              => ['required', 'string', 'min:2'],
            'alamat_penumpang'      => ['string'],
            'tanggal_lahir'         => ['required', 'date'],
            'telefone'              => ['required', 'numeric'],
            'jenis_kelamin'         => ['in:L,P']
        ]);

        if ($validator->fails()) return response()->json($validator->errors());

        $data['password'] = bcrypt($data['password']);
        $data['api_token'] = Str::random(60);

        $penumpang = Penumpang::create($data);

        return response()->json($penumpang);
    }

    public function login(Request $request) : JsonResponse
    {        
        $isValid = Auth::attempt(['username' => $request->username, 'password' => $request->password]);

        if (!$isValid) return response()->json(["error" => "invalid login"], 401);

        return response()->json(["user" => auth()->user()]);
    }
}
