<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use App\Comment;
use App\Message;
use App\User;
use Auth;
use Hash;
use Toastr;

class UserController extends Controller
{
    public function index()
    {   
         $users = User::all();

        return view('admin.users.index',compact('users'));
    }

    public function edit($id)
    {
        $users = User::find($id);

        return view('admin.users.edit', compact('users'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'role'      => 'required',
            'cost'      => 'required',
            'cuota'      => 'required',
            'views'      => 'required'
        ]);

        $user = User::find($id);

        $user->role_id = $request->role;
        $user->cost = $request->cost;
        $user->cuota = $request->cuota;
        $user->views = $request->views;
        $user->cerca_fin = $request->cerca_fin;
        $user->fin_cuota = $request->fin_cuota;
        $user->fin_plan = $request->fin_plan;

        $user->save();

        Toastr::success('message', 'Usuario modificado exitosamente.');
        return redirect()->route('admin.users.index');
    }



    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        Toastr::success('message', 'Usuario eliminado exitosamente.');
        return redirect()->route('admin.users.index');
    }

}