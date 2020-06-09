<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadImageController extends Controller
{
    public function update_avatar(Request $request)
    {
        $user = $request->user();
        if($user)
        {
            $fileName = ('avatar.jpg');
            $path = $request->file('avatar')->move(public_path("/avatar".'/'.$user->id), $fileName);

            $user->avatar = 'avatar/'.$user->id.'/'.$fileName;
            $user->save();
            return response()->json($user);
        }
    }
}
