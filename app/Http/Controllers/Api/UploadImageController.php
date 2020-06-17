<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadImageController extends Controller
{
    public function update_avatar(Request $request)
    {
        $request->validate([
            'avatar' => 'max:999999',
        ]);
        $user = $request->user();
        $photo = $request->file('avatar')->getClientOriginalName();

        if($user)
        {
            $path = $request->file('avatar')->move(public_path("/avatar".'/'.$user->id), $photo);

            $user->avatar = 'avatar/'.$user->id.'/'.$photo;
            $user->save();
            return response()->json($user);
        }
    }
}
