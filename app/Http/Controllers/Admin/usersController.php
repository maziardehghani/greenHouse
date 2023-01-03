<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class usersController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(20);
        return view('admin.users.index' , compact('users'));
    }


    public function edit(User $user)
    {

        return view('admin.users.edit' , compact('user'));
    }



    public function update(Request $request , User $user)
    {
        $request->validate([
            'cellphone' => 'required',
            'level' => 'required',
        ]);
        $user->update([
            'cellphone' => $request->cellphone,
            'level' => $request->level ,
        ]);
        $massage = '<div class="alert alert-success alert-dismissible fade show" role="alert"><i class="zmdi zmdi-info"></i> کاربر شما ویرایش شد<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        return redirect()->back()->with('msg' , $massage);
    }
}
