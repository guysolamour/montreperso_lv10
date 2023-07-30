<?php

namespace App\Http\Controllers\Front\Dashboard;

use Guysolamour\Administrable\Http\Controllers\BaseController;

class DashboardController extends BaseController
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
        return front_view('dashboard.index');
    }
}

