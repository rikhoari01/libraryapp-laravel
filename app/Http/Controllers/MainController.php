<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\User;
use App\Models\History;

class MainController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function signup()
    {
        return view('daftar');
    }

    public function login(Request $request)
    {
        $validateUser = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:8|max:16',
        ]);

        if(Auth::attempt($validateUser))
        {
            if(Auth::user()->is_Admin == 1)
            {
                $request->session()->regenerate();

                return redirect()->intended('/admin/dashboard');
            }
            elseif(Auth::user()->is_Admin == 0)
            {
                $request->session()->regenerate();

                return redirect()->intended('/dashboard');
            }
        }
        else
        {
            return back()->with('loginErr');
        }

    }

    public function userLogin()
    {
        return view('user.index');
    }

    public function adminLogin()
    {
        $today = date('Y-m-d');
        $NewUser = User::where('is_Admin', 0)->where('created_at', '>=', $today)->orderBy('created_at', 'desc')->get();
        $NewBook = Book::where('created_at', '>=', $today)->orderBy('created_at', 'desc')->get();
        $NewBorrow = History::where('status', 0)->where('created_at', '>=', $today)->orderBy('created_at', 'desc')->get();
        $NewReturn = History::where('status', 1)->where('updated_at', '>=', $today)->orderBy('updated_at', 'desc')->get();
        $sumNewUser = $NewUser->count();
        $sumNewBook = $NewBook->count();
        $sumNewBorrow = $NewBorrow->count();
        $sumNewReturn = $NewReturn->count();
        
        return view('admin.index', [
            'newUser' => $NewUser,
            'newBook' => $NewBook,
            'newBorrow' => $NewBorrow,
            'newReturn' => $NewReturn,
            'sumNewUser' => $sumNewUser,
            'sumNewBook' => $sumNewBook,
            'sumNewBorrow' => $sumNewBorrow,
            'sumNewReturn' => $sumNewReturn,
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function redirectUrl(Request $request)
    {
        if(Auth::user()->is_Admin == 1)
        {
            return redirect()->intended('/admin/dashboard');
        }
        elseif(Auth::user()->is_Admin == 0)
        {
            return redirect()->intended('/dashboard');
        }
        else
        {
            return redirect()->intended('/');
        }
    }

    public function tryUrl()
    {
        return redirect('/');
    }
}
