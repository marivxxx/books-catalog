<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function updateUserData(Request $request)
    {
        $name = $request->nameSpan;
        $userId = auth()->user()->getAuthIdentifier();
        $user = \App\Models\User::where('id', $userId)->first();
        if (!empty($name)) {
            $user->name = $name;
        }
        $user->save();
        return json_encode(['result' => 'success']);
    }
    public function changeUserAvatar (Request $request)
    {
        $path = $request->file('userAvatar')->store('public/avatars');
        $path = str_replace('public', 'storage', $path);
        $userID = auth()->user()->getAuthIdentifier();
        $user = \App\Models\User::where('id', $userID)->first();
        $user->img = $path;
        $user->save();
        return redirect()->intended('/profile');
    }
    public function showProfile(){
        $user = auth()->user();
        $userId = auth()->user()->getAuthIdentifier();
        $books = Book::where('author_id', $userId)->get();
        return view('pages.profile', ['user'=>$user, 'books'=>$books]);
    }
}
