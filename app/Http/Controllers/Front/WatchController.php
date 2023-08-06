<?php

namespace App\Http\Controllers\Front;

use App\Http\Requests\Front\WatchFormRequest;
use App\Models\Watch;
use Illuminate\Http\Request;
use Guysolamour\Administrable\Http\Controllers\BaseController;

class WatchController extends BaseController
{
    public function create()
    {

        $page = get_meta_page('createwatch');

        return view('front.watch.create', compact('page'));
    }

    public function store(WatchFormRequest $request)

    {
        $watch =  new Watch($request->validated());

        // dd($request->validated());
        // traiter la previsualisation
        // dd($watch);


        $watch->save();

        return  to_route('dashboard');
    }

}
