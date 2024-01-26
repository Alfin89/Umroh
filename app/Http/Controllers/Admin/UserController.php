<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $userData = User::select('name', 'email', 'role_as','id')->latest()->paginate(5);

        return view('admin.user.index', compact('userData'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'role_as' => 'required|numeric',
        ]);

        $user = User::find($id);
    
        // Update data nama dan email
        $user->name = $request->name;
        $user->email = $request->email;
    
        // Update role_as
        $user->role_as = $request->role_as;
    
        $user->save();
    
        return redirect()->route('user.index')->with('success', 'Data user berhasil diupdate.');
    }
    

    public function delete($id)
    {
        User::find($id)->delete();
  
        return response()->json(['success'=>'User Deleted Successfully!']);
    }

}
