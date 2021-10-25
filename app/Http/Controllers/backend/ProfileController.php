<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
