<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index',[
            'users' => DB::table('users')->orderBy('name')->paginate('5')
        ]);
    }

    public function edit($id)
    {
        return view('users.edit',[
            'user'=> User::FindOrFail($id)
        ]);
    }

    public function update(Request $id)
    {
        return 'update';
    }
}
