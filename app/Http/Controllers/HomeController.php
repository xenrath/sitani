<?php

namespace App\Http\Controllers;

use App\Models\HargaPangan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $hargapangans = HargaPangan::paginate(10);
        if (auth()->check() && auth()->user()->isAdmin())
        {
            return redirect('dashboard');
        }
        return view('home', compact('hargapangans'));
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
