<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
		$user = Auth::user();
		if($user->isSolicitante())
			return redirect()->route('solicitante');
		if($user->isAutorizador())
			return redirect()->route('autorizador');
		if($user->isAdmin())
			return redirect()->route('administrador');
		return view('home');
    }
}
