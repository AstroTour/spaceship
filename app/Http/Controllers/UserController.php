<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(): \Illuminate\Database\Eloquent\Collection
    {
        return User::all();
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
