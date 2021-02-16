<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Penumpang;
use App\Petugas;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(Request $request): JsonResponse
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'nama_penumpang'        => ['required', 'string', 'max:255'],
            'username'              => ['required', 'string', 'max:255', 'unique:penumpang'],
            'password'              => ['required', 'string', 'min:2'],
            'alamat_penumpang'      => ['string', 'nullable'],
            'tanggal_lahir'         => ['date', 'nullable'],
            'telefone'              => ['numeric', 'nullable'],
            'jenis_kelamin'         => ['in:L,P', 'nullable']
        ]);

        if ($validator->fails()) return response()->json($validator->errors(), 401);

        $data['password'] = bcrypt($data['password']);
        $data['api_token'] = Str::random(60);

        $penumpang = Penumpang::create($data);

        return response()->json(["_token" => $penumpang->api_token]);
    }

    public function login(Request $request): JsonResponse
    {
        $isValid = Auth::guard('penumpang-session')->attempt(['username' => $request->username, 'password' => $request->password]);

        if (!$isValid) return response()->json(["error" => "invalid login"], 401);

        return response()->json(["_token" => auth()->user()->api_token]);
    }

    public function adminLogin(Request $request): JsonResponse
    {
        $isValid = Auth::guard('petugas-session')->attempt(['username' => $request->username, 'password' => $request->password]);

        if (!$isValid) return response()->json(["error" => "invalid login"], 401);

        $petugas = Petugas::where('username', $request->username)->firstOrFail();

        $petugas['role'] = $petugas->level->nama_level;

        return response()->json(["_token" => $petugas->api_token]);
    }

    public function logout()
    {
        return Auth::logout();
    }

    public function getUser(Request $request)
    {
        return $request->user('penumpang');
    }

    public function getAdmin(Request $request)
    {
        $user =  $request->user('petugas');
        $user['role'] = $user->level->nama_level;

        return $user;
    }
}
