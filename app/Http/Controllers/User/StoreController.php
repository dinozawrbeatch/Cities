<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $fio = trim($data['name'] . ' ' . $data['second_name'] . ' ' . $data['middle_name']);
        unset($data['name'], $data['second_name'], $data['middle_name']);
        $data['password'] = Hash::make($data['password']);
        $data['fio'] = $fio;
        $user = User::create($data);

        event(new Registered($user));

        return redirect()->route('verification.notice')->with('Проверьте вашу почту');
    }
}
