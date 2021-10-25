<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use GrahamCampbell\ResultType\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
  public function user_profile_view()
  {
    $logninUserId = Auth::id();
    $user = User::findOrFail($logninUserId);
    return view('backend.users.profile-view', [
      'user' => $user,
    ]);
  }

  public function user_profile_eidt($id)
  {
    $user = User::findOrFail($id);
    return view('backend.users.profile-edit', [
      'users' => $user,
    ]);
  }

  public function user_profile_update(Request $request)
  {
    $authid = Auth::user()->id;
    $authUser = User::findOrFail($authid);

    $authUser->name = $request->name;
    $authUser->email = $request->email;
    $authUser->mobile = $request->mobile;
    $authUser->address = $request->address;
    $authUser->gender = $request->gender;
    $oldImage = $authUser->images;

    // Profile Photo Updated.
    if ($request->file('images')) {
      $image = $request->file('images');
      $imgNamGen = date('dmy') . '-' . Str::random(3) . '.' . $image->getClientOriginalExtension();

      if ($oldImage != null) {
        unlink($oldImage);
      }
      Image::make($image)->save('backend/assets/uploaded_img/' . $imgNamGen);
      $imgLocation = 'backend/assets/uploaded_img/' . $imgNamGen;
      $authUser->images = $imgLocation;
      $authUser->save();
    }

    $notication = array(
      'message' => 'User Profile Updated Succesfully',
      'alert-type' => 'success',
    );
    return back()->with($notication);
  }

  public function password_change()
  {
    return view('backend.users.user-password');
  }

  public function password_update(Request $request)
  {
    $request->validate([
      'current_password' => 'required',
      'password' => 'required|confirmed',
    ]);

    $hashPassword = Auth::user()->password;
    if (Hash::check($request->current_password, $hashPassword)) {
      $user = User::findOrFail(Auth::id());
      $user->password = Hash::make($request->password);
      $user->save();
      Auth::logout();
      return redirect()->route('login');
    } else {
      return back();
    }
  }
}
