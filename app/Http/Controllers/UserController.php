<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();




        // return response()->json($users);
        return view('admin', compact('users'));
    }



    public function store(Request $request): void
    {
        $record = new User();
        $record->fill($request->all());
        $record->save();
    }


    public function show(string $id): null
    {
        return User::find($id);
    }

    public function update(Request $request, string $id)
    {
        $record = User::find($id);
        $record->fill($request->all());
        $record->save();
    }

    public function profileView(): ?\Illuminate\Contracts\Auth\Authenticatable
    {
        $user = Auth::user();

        return $user;
    }




}
