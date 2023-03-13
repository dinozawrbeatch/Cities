<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Models\User;
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
        User::create($data);
        return redirect()->route('welcome');
    }
}
