<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\FormatCPF;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $input['cpf'] = FormatCPF::removeCPFMask($input['cpf']);

        $user = User::create($input);

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
