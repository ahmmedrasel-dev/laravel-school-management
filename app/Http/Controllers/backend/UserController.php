<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function user_view()
  {
    return view('backend.users.users-view', [
      'users' => User::all(),
    ]);
  }

  public function user_create()
  {
    return view('backend.users.users-create');
  }

  public function user_post(Request $request)
  {
    $request->validate([
      'name' => ['required'],
      'email' => ['required', 'unique:users,email']
    ], [
      'email.required' => "Enter Your Valid Email"
    ]);

    $users = new User;
    $users->user_type = $request->role;
    $users->name = $request->name;
    $users->email = $request->email;
    $users->password = bcrypt($request->password);
    $users->save();

    $notication = array(
      'message' => 'User Created Succesfully',
      'alert-type' => 'success',
    );
    return back()->with($notication);
  }

  public function user_eidt($id)
  {
    $users = User::findOrFail($id);
    return view('backend.users.users-edit', [
      'users' => $users
    ]);
  }

  public function user_update(Request $request)
  {
    $request->validate([
      'name' => ['required'],
      'email' => ['required']
    ], [
      'email.required' => "Enter Your Valid Email"
    ]);

    $users = User::findOrFail($request->user_id);
    $users->user_type = $request->role;
    $users->name = $request->name;
    $users->email = $request->email;
    $users->password = bcrypt($request->password);
    $users->save();

    $notication = array(
      'message' => 'User Updated Succesfully',
      'alert-type' => 'success',
    );
    return back()->with($notication);
  }
}
