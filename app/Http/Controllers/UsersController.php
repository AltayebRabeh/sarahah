<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class UsersController extends Controller
{
    public function uploadPhoto(Request $request, $id)
    {
        if ($image = $request->file('photo')) {
            if (auth()->user()->image != '') {
                if (File::exists('users/' . auth()->user()->image)) {
                    unlink('users/' . auth()->user()->image);
                }
            }

            $filename = Str::slug(auth()->user()->username) . '.' . $image->getClientOriginalExtension();
            $path = public_path('users/' . $filename);
            Image::make($image->getRealPath())->resize(300, 300, function($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);

            Auth::user()->image = $filename;
            Auth::user()->save();
        }

        return redirect()->route('messages');

    }
}
