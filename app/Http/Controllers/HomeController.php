<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Marathon;

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
        // Obtém o próximo evento da maratona.
        // ATENÇÃO! O evento ficará visível até o fim do dia de sua data.
        $next = Marathon::where('date', '>=', Carbon::now()->format('Y-m-d'))
            ->orderBy('date')
            ->first();

        return view('home')->with('next', $next);
    }
}
