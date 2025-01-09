<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();




        // return response()->json($users);
        return view('welcome', compact('users'));
    }

    public function updateRole(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->role = $request->input('role');
        $user->save();

        return redirect()->back()->with('success', 'Jogosultság sikeresen frissítve.');
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


}
